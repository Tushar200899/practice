<?php 
include ('connectiom.php');
session_start();
if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $db ->prepare('SELECT * FROM users WHERE Name=?');
    $data = array($username);
    $execute = $query->execute($data);
    if($query->rowcount()>0)
    {

        while($datarow=$query->fetch())
        {
            if(password_verify($password,$datarow['password']))
            {
                $_SESSION['id'] = $datarow['uid'];
                $_SESSION['name'] = $datarow['Name'];
                echo 0;
            }
            else{
                echo"enter correct password";
            }
        }
    }
    else{
        echo"something went wrong!";
    }
}
else
{
    echo"server error";
}


?>