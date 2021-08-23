<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>backend-project</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
      <section>
      	<div class="col-sm 12">
      		<div class="col-sm-4"></div>
      		<div class="col-sm-4">
      			<div class="groups">
      				<div class="buttons">
      					<div class="col-sm-6">
      						<button type="submit" id="login" onclick="showlogin();">Login</button>
      					</div>
      					<div class="col-sm-6">
      						<button type="submit" id="signup" onclick="showsignup();">Signup</button>
      					</div>
      				</div>
      				<div class="form-groups">
      					<form id="loginform">
      						<div class="formprt">
      							<label>Username</label>
      							<input type="text" name="username" id="username" placeholder="Enter email" required="email">
      						</div>
      						<div class="formprt">
      							<label>Password</label>
      							<input type="Password" name="password" id="password" placeholder="Enter Password" required="Password">
      						</div>
      						<div class="submission">
      							<input type="submit" name="login" id="submit" onclick="sendlogin();">
      						</div>
      					</form>
      					<form id="signupform" class="hidden">
      						<div class="formprt">
      							<label>Name</label>
      							<input type="text" name="name" id="name" placeholder="Enter your name" required="name">
      						</div>
      						<div class="formprt">
      							<label>Username</label>
      							<input type="text" name="username" id="username1" placeholder="Enter email" required="email">
      						</div>
      						<div class="formprt">
      							<label>Phonenumber</label>
      							<input type="phonenumber" name="phonenumber" id="phonenumber" placeholder="Enter your number">
      						</div>
      						<div class="formprt">
      							<label for="gender">Gender</label>
                                                <select name="gender" id="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                                </select>
      						</div>
      						<div class="formprt">
      							<label>Password</label>
      							<input type="Password" name="password" id="password1" placeholder="Enter password" required="Password">
      						</div>
      						<div class="formprt">
      							<label>Confirm Password</label>
      							<input type="Password" name="cpassword" id="cpassword" placeholder="Re-enter password" required="Password">
      						</div>
      						<div class="submission">
      							<button type="submit" id="submit1" onclick="sendsignup();">Submit</button>
      						</div>
      					</form>
      				</div>
      			</div>
      		</div>
      		<div class="col-sm-4"></div>
      	</div>
      </section>
      <script type="text/javascript">
      	function showlogin(){
      		document.getElementById("loginform").classList.add("show");
      		document.getElementById("loginform").classList.remove("hidden");
      		document.getElementById("signupform").classList.add("hidden")
      	};
      	function showsignup(){	
      		document.getElementById("signupform").classList.remove("hidden");
      		document.getElementById("signupform").classList.add("show");
      		document.getElementById("loginform").classList.add("hidden");
      	}
      	function sendlogin()
      	{
      		var username = document.getElementById('username').value;
      		var password = document.getElementById('password').value;
      		var token = "<?php echo password_hash("logintoken",PASSWORD_DEFAULT);?>"
      		if (username != "" & password != "") 
      			{
      				$.ajax(
				{
					type:'Post',
					url:"ajax/login.php",
					data:{username:username,password:password,token:token},
					success:function(data)
					{
						if(data==0)  {
                            alert('login successfull');
                            window.location="dashboard.php";
                        }
                        else{
                            alert(data)
                        }      
					}
				});
      			} else 
      			{
      				alert("Please fill all the fields")
      			}
      	}
      	function sendsignup()
      	{     
      		var name = document.getElementById('name').value;
      		var username = document.getElementById('username1').value;
      		var phonenumber = document.getElementById('phonenumber').value;
      		var gender = document.getElementById('gender').value;
      		var password = document.getElementById('password1').value;
      		var cpassword = document.getElementById('cpassword').value;
      		var token = "<?php echo password_hash("signuptoken",PASSWORD_DEFAULT);?>"
      		if(username != "" && password != "" && cpassword != "")
      		{
      			if(password == cpassword)
      		      {
      			  $.ajax(
				  {
					type:'post',
					url:"ajax/signup.php",
					data:{name:name,username:username,password:password,cpassword:cpassword,phonenumber:phonenumber,gender:gender,token:token},
					success:function(data)
					{
						alert(data);
					}
				  });
      		      }
      		      else
      		      {
      			  alert('password and confirm password are not same');
      		      }
      		}
      		else
      		{
      			alert('Please fill all the fields');
      		}
      	}
      </script>
      <script type="text/javascript">
            $('form').submit(function(e) {
            e.preventDefault();
            });
      </script>
</body>
</html>