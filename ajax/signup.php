<?php 
    include('connection.php');
    if(isset($_POST['token']) && password_verify("signuptoken", $_POST['token']))
    {
        $name = $_POST['name'];
	    $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
	    $password = $_POST['password'];
	    $cpassword = $_POST['cpassword'];

	  if($username != "" && $password != "" && $name != "" && $phonenumber != "" && $gender != "")
	  {
        $query = $db->prepare('INSERT INTO users(name,username,phonenumber,gender,password) VALUES (?,?,?,?,?)');
        $data = array($name,$username,$phonenumber,$gender,password_hash($password, PASSWORD_DEFAULT));
        $execute = $query->execute($data);
        if($execute)
        {
      	  echo"data inserted Successfully";
        }
        else
        {
      	  echo"  something went wrong";
        }
	  }
    }
    else
    {
	   echo"server error";
    }
?>