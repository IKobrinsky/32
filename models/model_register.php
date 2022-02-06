<?php
class model_register extends Model
{
    public function register()
    {
        $errors=array();
        if ( strlen($_POST['name']==0))
        {
            $errors[]='Не указан логин';
            
        }
        if ($_POST['password']!==$_POST['repeatpassword'])
        {
            $errors[]='Пароли не совпадают';
        }
        if(empty($errors))
        {
            $dbConn = dbConnect();
            $sql = "select * from users where usrLogin='".$_POST["name"]."'";
            $result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
            $row = mysqli_fetch_assoc($result);
            if ($row)
            {
                $errors[]='Пользователь с таким логином уже существует';
            }
            else
            {
                $sql="call AddUser('".$_POST["name"]."','".crypt($_POST["password"], SALT)."','".getGuid()."')";
                $result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
            }
        }
    }
}
?>