<?php
require_once getcwd().'/config/config.php';
$errors = [];
$model = new model_login();

if (!empty($_POST))
{
    $errors = $model->login();

}

// Параметры приложения
$clientId     = '8066152'; // ID приложения
$clientSecret = 'l28TuprpVgcY75l7BOAE'; // Защищённый ключ
$redirectUri  = 'http://vionzawd.beget.tech/index.php?url=vkauth'; // Адрес, на который будет переадресован пользователь после прохождения авторизации
 
// Формируем ссылку для авторизации
$params = array(
	'client_id'     => $clientId,
	'redirect_uri'  => $redirectUri,
	'response_type' => 'code',
	'v'             => '5.126', // (обязательный параметр) версиb API https://vk.com/dev/versions
 
	// Права доступа приложения https://vk.com/dev/permissions
	// Если указать "offline", полученный access_token будет "вечным" (токен умрёт, если пользователь сменит свой пароль или удалит приложение).
	// Если не указать "offline", то полученный токен будет жить 12 часов.
	'scope'         => 'photos,offline',
);
 
// Выводим на экран ссылку для открытия окна диалога авторизации
// echo '<a href="http://oauth.vk.com/authorize?' . http_build_query( $params ) . '">Авторизация через ВКонтакте</a>';

?>
 <?php if (!empty($_POST) && empty($errors)): ?>
 <?php echo 'wtf'?>
 <meta http-equiv="refresh" content="0;url=index.php">
 <?php endif; ?>
 <?php if (empty($_POST) || !empty($errors)): ?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4">
                    <form id="registration" action="/index.php?url=login" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Логин</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Введите логин">
                            <div class="form-control-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                            <input type="hidden" name="token" value="<?=$_SESSION["CSRF"]?>"> <br/>
                            <div class="form-control-feedback"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Войти</button>
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </form>
                    <?php echo '<a href="http://oauth.vk.com/authorize?' . http_build_query( $params ) . '">Авторизация через ВКонтакте</a>'; ?>
                </div>
            </div>
            
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/js/form.js"></script>
    </body>
</html>
<?php endif; ?>