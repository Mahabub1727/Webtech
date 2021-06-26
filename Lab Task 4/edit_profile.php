<?php

 

    session_start();

 


?>

 


<fieldset>
<p align="right">Logged in as <?php

 

 

echo $_COOKIE["userName"]

 


?>
<a href="logout.php">| Logout</a> </p>

 


<img width="200" height="50" src="logo.png">
</fieldset>
<fieldset style="width: 20%;height: 39.16%; position: absolute;">
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

 

</table>
<center>

 

<fieldset style="width: 40%">

 

<legend><b>EDIT PROFILE</b></legend>
    <form action="edit_profileCheck.php" method="POST">
        <br/>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><input name="name" type="text" value="<php echo $_COOKIE["name"];?></td>
                <td></td>
            </tr>        
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input name="email" type="text" value="<php echo $_COOKIE["email"];?>
                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                </td>
                <td></td>
            </tr>                
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>   
                    <input name="gender" type="radio" checked="checked" value="male">Male
                    <input name="gender" type="radio" value="female">Female
                    <input name="gender" type="radio" value="other">Other
                </td>
                <td></td>
            </tr>        
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td valign="top">Date of Birth"</td>
                <td valign="top">:</td>
                <td><input name="dob" type="text">
					 
					</br>
                    <font size="2"><i>(dd/mm/yyyy)</i></font>
                </td>
                <td></td>
            </tr>
        </table>
        <hr/>
        <input type="submit" value="Submit" name="submit">        
    </form>
</fieldset>
</center>
</form>

 

</body>
<br><br><fieldset><footer><p align=center>Copyright <span>&#169;</span>2021</footer></p></fieldset>
</html>