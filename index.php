<?php
    $config_json = file_get_contents("config.json");
    $config_json = utf8_encode($config_json);
    $jsonArray = json_decode($config_json, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Slideshow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
    $(function() { // load the function on page ready
        loadCarousel();
    });
    
    var nextSlideInterval = setInterval(function(){ loadCarousel() }, <?php echo $jsonArray['interval_ms'];?> ); // load the carousel every interval and update the slide
 
    function loadCarousel() { // the function will load the contents of the php files to the relevant div's
        $('#carousel-indicators').load('indicators.php');
        $('#carousel-inner').load('carousel-images.php');
    }
    </script>
</head>
<body>

    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="0">

        <!-- Indicators -->
        <ol class="carousel-indicators" id="carousel-indicators">

        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" id="carousel-inner" role="listbox">
        
        </div>

    </div>
</body>
</html>

