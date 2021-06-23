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
    $cpasswordErr = $npasswordErr = $rpasswordErr ="";
    $cpassword = $npassword = $rpassword ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["cpassword"])) {
            $cpasswordErr = "Current Password is required";
   }
     else {
        $cpassword = test_input($_POST["cpassword"]);
        if (strcmp($cpassword,"abc@1234")) {
            $cpasswordErr = "Incorrent Password";
        }
    }
    if (empty($_POST["npassword"])) {
        $npasswordErr = "New Password is required";
    }
    else {
        $npassword = test_input($_POST["npassword"]);
        if (!strcmp($npassword,"abc@1234")) {
            $npasswordErr = "Current and New Password can not be same.";
        }
    }
    if (empty($_POST["rpassword"])) {
        $rpasswordErr = "Retype New Password is required";
    }
    else {
        $rpassword = test_input($_POST["rpassword"]);
        if (strcmp($npassword,$rpassword)) {
            $rpasswordErr = "Retype password and New Password need to be same.";
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

     <form method="post" action="<?php echo htmlspecialchars($_SERVER[ "PHP_SELF" ]);?>">
        <fieldset style="width:40%">
            <legend>CHANGE PASSWORD</legend>
            <label>Current Paasword: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="cpassword" value="<?php echo $cpassword;?>">
            <span class="error">* <?php echo $cpasswordErr;?></span>
            <br><br>
            <label style="color:#61B33B">New Password: &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</label>
            <input type="text" name="npassword" value="<?php echo $npassword;?>">
            <span class="error">* <?php echo $npasswordErr;?></span>
            <br><br>
            <label style="color:red">Retype New Password: </label>
            <input type="text" name="rpassword" value="<?php echo $rpassword;?>">
            <span class="error">* <?php echo $rpasswordErr;?></span>
            <hr style="width:95%;text-align:left;margin-left:0">
            <br>
            <input type="submit" name="submit" value="Submit"> 
        </fieldset>
    </form>
</body>
</html>