<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/login.css" />
	</head>
	<body>
		<div class="row">
			<span>
				<h1 style="font-size: 9em">MeetUp</h1><br>
				<h1 style="font-size: 6em">login</h1>
			</span>
		</div>
		<form>
		<div class="row">
  		<span>
   		 <input class="basic-slide" id="username" type="text" placeholder="UWID" /><label class="move" for="username">Username</label>
 		 </span>
 		 <span>
 		   <input class="basic-slide" id="password" type="password" placeholder="UW Password" /><label class="move" for="password">Password</label>
 		 </span>
		 <span>
   		 <input id="remember" type="checkbox" value="remember" />Remember me
		 <input class="submit" id="sign_in" type="submit" value="Sign in" />
 		 </span>
		  <span>
		 <a href="register.php">Creat account</a>
		  </span>
		</div>
		</form>
		<footer>
			<span>&copy; 2017.01.7-<?php echo date("Y.m.d");?></span>
		</footer>
	</body>
</html>