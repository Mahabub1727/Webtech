<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <fieldset style="width:40%">
            <legend>PROFILE PICTURE</legend>
            <img src="uploads/no.png" alt="" width="250" height="250">
            <br>Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><br>
            <hr style="width:95%;text-align:left;margin-left:0">
            <input type="submit" value="Upload Image" name="submit">
          </fieldset>
        </form>
</body>
</html>