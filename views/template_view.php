<?php

?>
<!DOCTYPE html> 
<html lang="ru"> 
<head> 
<meta charset="utf-8"> 
<title>Главная</title> 
</head> 

<body>
    <div>
        
        <?php if (!($_SESSION['userId'])): ?>
            <a href="index.php?url=login">Вход</a>
            <a href="index.php?url=register">Регистрация</a>
        <?php endif; ?>
        <?php if (($_SESSION['userId'])): ?>
            <?php if ($_SESSION['userId']->CanViewSecretPage): ?>
                <a href="index.php?url=forlogged">Для зарегистрированных</a>
            <?php endif; ?>
            <a href="index.php?url=unlogin">Выход</a>
        <?php endif; ?>
    </div>
    <?php include $content_view; ?></body> 
</html>