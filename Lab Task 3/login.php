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
    $unameErr = $passwordErr = "";
    $uname = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset style="width:40%">
            <legend>LOGIN</legend>
            <label>User Name: </label>
            <input type="text" name="uname" value="<?php echo $uname;?>">
            <span class="error">* <?php echo $unameErr;?></span>
            <br><br>
            <label>&nbsp; &nbsp;Password: </label>
            <input type="text" name="password" value="<?php echo $password;?>">
            <span class="error">* <?php echo $passwordErr;?></span>
            <hr style="width:95%;text-align:left;margin-left:0">
            <input type="checkbox" name="Remember" value="Remember">
            <label for="Remember">Remember Me </label>
            <br><br>
            <input type="submit" name="submit" value="Submit"> 
            <span style="color:blue"><u>Forget Password?</u></span>
        </fieldset>
    </form>
</body>
</html>