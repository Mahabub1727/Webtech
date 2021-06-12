<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $DateofBirthErr = $degreeErr = $BLOODGROUPErr = "";
$name = $email = $gender = $dob = $degree = $BLOODGROUP = "";
$Deg1 = $Deg2 = $Deg3 = $Deg4 = "";
$i=1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
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
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email = "";
    }
  }
    
  if (empty($_POST["dob"])) {
    $DateofBirthErr = "";
  } else {
    $dob = test_input($_POST["dob"]);
    // if (!preg_match("/(\d{2})\/(\d{2})\/(\d{4})$/",$dob)) {
    //   $DateofBirthErr = "Invalid Date of Birth";
    //   $dob = "";
    // }
    $d = date("dd-mm-yyyy");
    if($d<1953 && $d>1998){
      $DateofBirthErr = "Input Year between 1952 to 1998";
      $DateofBirthErr = "";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

  if (empty($_POST["SSC"]) && empty($_POST["HSC"]) && empty($_POST["BSc"]) && empty($_POST["MSc"])){
    $degreeErr = "Degree is required";
  } else{
    if(!empty($_POST["SSC"]))
  {
    $i=$i+1;
    $Deg1=test_input($_POST["SSC"]);
  }

  if(!empty($_POST["HSC"]))
  {
    $i=$i+1;
      $Deg2=test_input($_POST["HSC"]);
  }

  if(!empty($_POST["BSc"]))
  {
    $i=$i+1;
    $Deg3=test_input($_POST["BSc"]);
  }

  if(!empty($_POST["MSc"]))
  {
    $i=$i+1;
    $Deg4=test_input($_POST["MSc"]);
  }

  if($i<3)
  {
    $degreeErr="At least 2 must be selected";
    $Deg1 = "";
    $Deg2 = "";
    $Deg3 = "";
    $Deg4 = "";
  }
}
  
  if(empty($_POST["BLOODGROUP"]))
  {
    $BLOODGROUPErr="Blood group is required";
  }
  else {
    $BLOODGROUP= test_input($_POST["BLOODGROUP"]);
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  


  <fieldset style="width:20%">
     <legend>1.NAME </legend><input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <hr style="width:95%;text-align:left;margin-left:0">
  <br><br> 
  </fieldset>
  
  <fieldset style="width:20%">
      <legend>2.EMAIL </legend><input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <hr style="width:95%;text-align:left;margin-left:0">
  <br><br>
  </fieldset>
  
  <fieldset style="width:20%">
      <legend>3.DATE OF BIRTH </legend><input type="date" name="dob" value="<?php echo $dob;?>">
  <span class="error"><?php echo $DateofBirthErr;?></span>
  <hr style="width:95%;text-align:left;margin-left:0">
  <br><br>
  </fieldset>
  
  <fieldset style="width:20%">
      <legend>4.GENDER</legend> <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <hr style="width:95%;text-align:left;margin-left:0">
  <br><br>
  </fieldset>

  <fieldset style="width:20%">
      <legend>5.DEGREE</legend>
      <input type="checkbox" id = "degree" name="SSC" value="SSC">
  <label for="SSC">SSC</label>
  <input type="checkbox" name="HSC" value="HSC">
  <label for="HSC">HSC</label>
  <input type="checkbox" name="BSc" value="BSc">
  <label for="BSc">BSc</label>
  <input type="checkbox" name="MSc" value="MSc">
  <label for="MSc">MSc</label>
  <span class="error">* <?php echo $degreeErr;?></span>
  <hr style="width:95%;text-align:left;margin-left:0">
  <br><br>
  </fieldset>

  <fieldset style="width:20%">
      <legend>6.BLOOD GROUP </legend><select id="BLOODGROUP" name="BLOODGROUP">
  <option value="O+">O+</option>
  <option value="A+">A+</option>
  <option value="O-">O-</option>
  <option value="AB+">AB+</option>
  <option value="B+">B+</option>
  <option value="A-">A-</option>
  <option value="B-">B-</option>
  <option value="AB-">AB-</option>
</select> 
  <span class="error">* <?php echo $BLOODGROUPErr;?></span>
  <hr style="width:95%;text-align:left;margin-left:0">
  
  </fieldset>
   <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
echo $Deg1;
echo " ";
echo $Deg2;
echo " ";
echo $Deg3;
echo " ";
echo $Deg4;
echo "<br>";
echo $BLOODGROUP;
echo "<br>";
?>

</body>
</html>