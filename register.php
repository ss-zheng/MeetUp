<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/register.css" />
        <style>
        .error {
            color: red;
            font-size: 0.7em;
        }

        </style>
	</head>
	<body>
        <?php
        // define variables and set to empty values
        $firstnameErr = $lastnameErr = $uwidErr = $emailErr = $genderErr = $passwordErr = $cpasswordErr = "";
        $firstname = $lastname = $uwid = $email = $gender = $password = $password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstname"])) {
                $firstnameErr = "First name is required";
            } else {
                  $firstname = test_input($_POST["firstname"]);
                  // check if name only contains letters and whitespace
                  if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
                        $firstnameErr = "Only letters allowed"; 
                 }
            }

            if (empty($_POST["lastname"])) {
                $lastnameErr = "Last name is required";
            } else {
                  $lastname = test_input($_POST["lastname"]);
                  // check if name only contains letters and whitespace
                  if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
                        $lastnameErr = "Only letters allowed"; 
                 }
            }

            if (empty($_POST["username"])) {
                $uwidErr = "User name is required";
            } else {
                  $uwid = test_input($_POST["username"]);
                  // check if name only contains letters and whitespace
                  if (!preg_match("/^[a-zA-Z0-9 ]*$/",$lastname)) {
                        $uwidErr = "Incorrect ID"; 
                 }
            }

             if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
                    $password = test_input($_POST["password"]);
                    $cpassword = test_input($_POST["cpassword"]);
                    if (strlen($_POST["password"]) <= '8') {
                        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
                    }
                    elseif(!preg_match("#[A-Z]+#",$password)) {
                        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
                    }
                    elseif(!preg_match("#[a-z]+#",$password)) {
                        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                    } else {
                        //$cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
                    }
                }

            if ($_POST["password"] != $_POST["cpassword"]) $cpasswordErr = "not same password";
            if (empty($_POST["password"]))  $passwordErr = "Password if required";
            if (empty($_POST["cpassword"]))  $cpasswordErr = "Confirm your password";

            
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
                }
            }

            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
            } else {
                $gender = test_input($_POST["gender"]);
            }
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        ?>
		<div class="row">
            <span>
				<h1>Create your meetup account</h1>
            </span>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  		<span>
   		  <p style="margin: 0px 200px 0px 0px;">Name</p><br>
             
             <input class="inputs" name="firstname" type="text" placeholder="First" style="width: 110px;"/>
             <label class="error"><?php if (!($firstnameErr == "")) echo "*"?></label>
             <input class="inputs" name="lastname" type="text" placeholder="Last"  style="margin-left: 18px; width: 110px;"/>
             <label class="error">
                 <?php
                 if (!($firstnameErr == "") && !($lastnameErr == "")) {
                     echo "* <br>" . $firstnameErr . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $lastnameErr;
                 } else {
                     if (!($lastnameErr == "")) {
                         echo "* <br>" . $lastnameErr;
                    }
                    if (!($firstnameErr == "")) {
                         echo "* <br>" . $firstnameErr;
                     }
                 }?></label>
 		 </span>
 		 <span>
 		   <p style="margin: 0px 143px 0px 0px;">UW Username</p><br>
            <input class="inputs" name="username" type="text" placeholder="UWID" />
            <label class="error"><?php if (!($uwidErr == "")) echo "* <br>" . $uwidErr;?></label>
 		 </span>
          <span>
 		   <p style="margin: 0px 209px 0px 0px;">Email</p><br>
            <input class="inputs" name="email" type="email" placeholder="example@uwaterloo.ca" />
            <label class="error"><?php if (!($emailErr == "")) echo "* <br>" . $emailErr;?></label>
 		 </span>
          <span>
 		   <p style="margin: 0px 177px 0px 0px;">Password</p><br>
            <input class="inputs" name="password" type="password" placeholder="" />
            <label class="error"><?php if (!($passwordErr == "")) echo "* <br>" . $passwordErr;?></label>
 		 </span>
          <span>
 		   <p style="margin: 0px 100px 0px 0px;">Reenter your password</p><br>
            <input class="inputs" name="cpassword" type="password" placeholder="" />
            <label class="error"><?php if (!($cpasswordErr == "")) echo "* <br>" . $cpasswordErr;?></label>
 		 </span>
		 <span>
             Gender
             <input type="radio" name="gender" value="female" style="margin-left: 30px;"/>Female
             <input type="radio" name="gender" value="male" style="margin-left: 30px;" />male
             <label class="error"><?php if (!($genderErr == "")) echo "* <br>" . $genderErr;?></label>
 		 </span>
		  <span>
		    <input class="submit" id="sign_in" type="submit" value="Submit" />
		  </span>
          </form>
		</div>
        
		<footer>
			<span>&copy; 2017.01.7-<?php echo date("Y.m.d");?></span>
		</footer>

        <div style="position: absolute; right: 10%; top: 40%; bottom: 60%; z-index:100;">
        <?php
        echo "<h2>Your Inputs:</h2>";
        echo $firstname;
        echo $lastname;
        echo "<br>";
        echo $uwid;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $password;
        echo "<br>";
        echo $cpassword;
        echo "<br>";
        echo $gender;
        ?>
        </div>
	</body>
</html>