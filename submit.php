<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Slideshow</title>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="3; url=carousel.php" />
</head>
<body>
<?php

if ($_POST) {
    $time = $_POST["time"];

    $stop = $_POST["stop"];

    $jsonString = file_get_contents('config.json');
    $jsonArray = json_decode($jsonString, true);
    
    if ($stop) {
        $jsonArray['interval_ms'] = 0;
        echo '<p>The slideshow is now stopped. To start it again, please input an interval time.</p>';
    }
    else {
        $jsonArray['interval_ms'] = $time;
        echo "<p>The interval between slides is now set to " . $time . " ms</p>";
    }
    $newJsonString = json_encode($jsonArray);
    print_r($jsonArray);
    file_put_contents('config.json', $newJsonString); 
}

else {
    echo 'Please update the slideshow <a href="update.html">here</a> if you wish to use this page.</br>';
}

echo 'You are being returned to the slideshow now. Click <a href="carousel.php">here</a> if you are not redirected.';
?>
</body>
</html>
