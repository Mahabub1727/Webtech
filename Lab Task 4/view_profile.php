<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Profile</title>
</head>
<body>
<form>




<fieldset>
<p align="right">Logged in as <?php





echo $_COOKIE["userName"]







?>
<a href="logout.php">| Logout</a> </p>







<img width="200" height="50" src="logo.png">
</fieldset>
<td >




<fieldset style="width: 22%;height: 38%; position: absolute;">
<hi> Account </hi>
<hr style="border: 0.2px solid;">
<p>
<ul><br><tr>
<td><a href="dashboard.php"><li>Dashboard</a></li></td>
</tr>
<tr>
<td><a href="view_profile.php"><li>View Profile</li></a></td>
</tr>
<tr>
<td><a href="edit_profile.php"><li>Edit Profile</li></a></td>
</tr>
<tr>
<td><a href="changeprofilepicture.php"><li>Chanage Profile Picture</li></a></td>
</tr>
<tr>
<td><a href="change_password.php"><li>Change Password</li></a></td>
</tr>
<tr>
<td><a href="logout.php"><li>Logout</li></a></td>
</tr></ul></p>
<br><br>
</fieldset>
<br>
<center>
<fieldset style="width: 47%">
<legend><b>PROFILE</b></legend>
<table>
<tr>
<td>Name: </td>



<td> <?php echo $_COOKIE["name"];?> </td>



</tr>
<tr><td colspan="2"><hr/></td></tr>
<td>Email: </td>
<td> <?php echo $_COOKIE["email"];?> </td>
<p align="right">




</td></p>
</tr>
<tr><td colspan="2"><hr/></td></tr>
<tr>
<img align="right" width="100" height="120" src="user.png">
</td>
<td>Gender: </td>
<td> <?php echo $_COOKIE["gender"];
?> </td>
</tr>
<tr><td colspan="2"><hr/></td></tr>
<tr>
<td>Date of Birth: </td>
<td><?php echo $_COOKIE["day"];?>/
<?php echo $_COOKIE["month"];?>/
<?php echo $_COOKIE["year"];?></td>



</tr>
<tr><td colspan="2"><hr/></td></tr>



<td><a href="edit_profile.php">Edit Profile</a></td>
</table>
</fieldset>



</td>
</tr>



</center>





<fieldset><footer><p align=center>Copyright <span>&#169;</span>2021</footer></p>
</fieldset>





</form>
</body>
</html>