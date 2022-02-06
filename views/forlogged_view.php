<html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>For logged</title>
    </head>
    <body>
        <h1>Добро пожаловать в Японию</h1>
        <?php if ($_SESSION['userId']->CanViewPicture): ?>
        <img src="https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                alt="Фудзияма">
        <?php endif; ?>
    </body>
</html>