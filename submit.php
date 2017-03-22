<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Slideshow</title>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="3; url=carousel.php" />
</head>
<body>
<?php

$time = $_POST["time"];

$stop = $_POST["stop"];

$myfile = fopen("config.json", "w");
if ($stop) {
    $json = "{ \"interval_ms\": 0 }"; 
    echo '<p>The slideshow is now stopped. To start it again, please input an interval time.</p>';
}
else {
    $json = "{ \"interval_ms\": $time }";
    echo "<p>The interval between slides is now set to " . $time . " ms</p>";
}
echo 'You are being returned to the slideshow now. Click <a href="carousel.php">here</a> if you are not redirected.';
fwrite($myfile, $json);
fclose($myfile);



?>
</body>
</html>
