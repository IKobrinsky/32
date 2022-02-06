<?php
if (empty($_POST))
{
    $token = hash('gost-crypto', random_int(0,999999));
    $_SESSION["CSRF"] = $token;
}

class model_login extends Model
{
    public function login()
    {
       
        
        $errors=array();
        if($_POST["token"] !== $_SESSION["CSRF"])
        {

            $errors[]='Некорректная сессия';
        }
        if ( strlen($_POST['name']==0))
        {
            $errors[]='Не указан логин';
            
        }
        
        if (empty($errors))
        {
            
            $dbConn = dbConnect();
            $sql = "call CheckUser('".$_POST["name"]."','".crypt($_POST["password"], SALT)."')";
            $result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
            $row = mysqli_fetch_assoc($result);
            if (!$row)
            {
                $errors[]='Пользователь не найден или неправильный пароль';
            }
            else
            {
                $_SESSION['userId'] =new SimpleUser($row['usrID']);

            }

        }
        else
        {
            foreach($errors as $error)
            {
               Logger::error($error);
            }
        }
        
        return $errors;
    }
}
?>