<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Slideshow</title>
    <meta charset="utf-8">
</head>
<body>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet">

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <span class="glyphicon glyphicon-cloud-upload"></span>
            <h2>Image Uploader</h2>
            
<?php
if ($_POST) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".</br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image.</br>";
            $uploadOk = 0;
        }
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 10485760) {
        echo "Your file is too large.</br>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.</br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. Please try again.</br>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Your file has been successfully uploaded!</br>";
            echo "File name: \"" . $_FILES["fileToUpload"]["name"] . "\"</br>";
            echo "File size: " . $_FILES["fileToUpload"]["size"] . " bytes</br>";
            echo "File type: " . $_FILES["fileToUpload"]["type"] . "</br>";
        }
        else {
            echo "Sorry, there was an error uploading your file.</br>";
        }
    }
}
else {
    echo 'Please upload an image <a href="upload.html">here</a> if you wish to use this page.';
}

?>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
