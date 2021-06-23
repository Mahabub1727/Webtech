<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
    <?php
    $nameErr = $emailErr = $unameErr = $passwordErr = $cpasswordErr = $genderErr = $DateofBirthErr = "";
    $name = $email = $uname = $password = $cpassword = $gender = $dob = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
            }
            else{
                if(str_word_count($name)<2){
                    $nameErr = "Name must contain at least two words.";
                    $name="";
                }
                else{
                    $name = test_input($_POST["name"]);
                }
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $email = "";
            }
        }

        if (empty($_POST["uname"])) {
            $unameErr = "User Name is required";
        }
        else{
            $uname = test_input($_POST["uname"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) {
                $unameErr = "Only letters and white space allowed";
            }
            else{
                if(str_word_count($uname)<2){
                    $unameErr = "User Name must contains at least two words.";
                    $uname="";
                }
                else{
                    $uname = test_input($_POST["uname"]);
                }
            }        
        }

        if(empty($_POST["password"]))
        {
            $passwordErr = "Password is required";
        }
        else {
            $password=test_input($_POST["password"]);
            if(strlen($password)<8)
            {
                $passwordErr="Password can't be less than 8 characters";
            }
            else {
                if(substr_count($password,"@")<1 || substr_count($password,"#")<1 || substr_count($password,"%")<1 ||
                    substr_count($password,"$")<1)
                {
                    $passwordErr="Password must contain at least one of the special characters (@, #, $,%)";
                }
            }
        }

        if(!empty($_POST["password"])){
            $cpassword = test_input($_POST["cpassword"]);
            if (empty($_POST["cpassword"])) 
            {
                 $cpasswordErr = "Please Confirm Your Password!";
            }
            else if(($_POST["password"] != $_POST["cpassword"])){
                $cpasswordErr = "Password didn't match.";
            }
        }


        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["dob"])) {
            $DateofBirthErr = "";
        } else {
            $dob = test_input($_POST["dob"]);
            $d = date("dd-mm-yyyy");
            if($d<1953 && $d>1998){
                $DateofBirthErr = "Input Year between 1952 to 1998";
                $DateofBirthErr = "";
            }
        }
    }

    if(isset($_POST["submit"]))  
    {  
      if(empty($_POST["name"]))  
      {  
           $error = "<h1 class='text-danger'>Enter Name</h1>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["uname"]))  
      {  
           $error = "<label class='text-danger'>Enter a username</label>";  
      }  
      else if(empty($_POST["password"]))  
      {  
           $error = "<label class='text-danger'>Enter a password</label>";  
      }
      else if(empty($_POST["cpassword"]))  
      {  
           $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Gender cannot be empty</label>";  
      } 
      else if(empty($_POST["dob"]))  
      {  
           $error = "<label class='text-danger'>Dob cannot be empty</label>";  
      }
       
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["uname"],  
                     'password'   =>    $_POST["password"],
                     'cpassword' =>    $_POST["cpassword"],
                     'gender'  =>     $_POST["gender"],  
                     'dob'   =>     $_POST["dob"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
    }



    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Storing files in data.json</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset style="width:20%">
            <legend>REGISTRATION</legend>

            <label>Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="name" value="<?php echo $name;?>">            
            <span class="error">* <?php echo $nameErr;?></span>
            <hr style="width:95%;text-align:left;margin-left:0">
            <br>

            <label>Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="email" value="<?php echo $email;?>"> 
            <span class="error">* <?php echo $emailErr;?></span>
            <hr style="width:95%;text-align:left;margin-left:0">
            <br>

            <label>User Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="uname" value="<?php echo $uname;?>">
            <span class="error">* <?php echo $unameErr;?></span>
            <hr style="width:95%;text-align:left;margin-left:0">
            <br>

            <label>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="password" value="<?php echo $password;?>">
            <span class="error">* <?php echo $passwordErr;?></span>
            <hr style="width:95%;text-align:left;margin-left:0">
            <br>

            <label>Confirm Password: </label>
            <input type="text" name="cpassword" value="<?php echo $cpassword;?>">
            <span class="error">* <?php echo $cpasswordErr;?></span>
            <hr style="width:95%;text-align:left;margin-left:0">
            <br>

            <fieldset style="width:85%">
            <legend>Gender</legend> <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other">Other  
            </fieldset>
            <hr style="width:95%;text-align:left;margin-left:0">

            <fieldset style="width:85%">
                <legend>Date Of Birth </legend><input type="date" name="dob" value="<?php echo $dob;?>">
                <span class="error"><?php echo $DateofBirthErr;?></span>
            </fieldset>
            <hr style="width:95%;text-align:left;margin-left:0">
            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset">
        </fieldset>
    </form>
</body>
</html>