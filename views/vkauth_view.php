<?php
if (isset($_GET['code']))
{
 $model = new model_vkauth();   
 $loginResult = $model->login();
}
?>
<meta http-equiv="refresh" content="0;url=index.php">
