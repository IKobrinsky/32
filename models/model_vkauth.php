<?php
class model_vkauth extends Model
{
    public function login()
    {
       if (isset($_GET['code'])) 
       {
           $clientId     = '8066152'; // ID приложения
            $clientSecret = 'l28TuprpVgcY75l7BOAE'; // Защищённый ключ
            $redirectUri  = 'http://vionzawd.beget.tech/index.php?url=vkauth'; // Адрес, на который будет переадресован пользователь после прохождения авторизации
             
           
            $result = true;
            $params = [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'code' => $_GET['code'],
                'redirect_uri' => $redirectUri
            ];
    
            $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
        
            if (isset($token['access_token'])) {
                $params = [
                    'uids' => $token['user_id'],
                    'fields' => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
                    'access_token' => $token['access_token'],
                    'v' => '5.101'];
        
                $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['response'][0]['id'])) {
                    $userInfo = $userInfo['response'][0];
                    $result = true;
                }
            }
        
            if ($result) {
                $_SESSION['userId'] =new VKUser($userInfo['response'][0]['id']);
                return 1;

            }
            return 0;
        }
        return 0;
    }
}
?>