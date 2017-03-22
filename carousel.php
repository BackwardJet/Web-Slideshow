<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 70%;
        margin: auto;
    }
    /* 
    #myCarousel {
      position: absolute; top: 0; left: 0; height: 100%; width: 100%;
    }
    */
    </style>
</head>
<body>
    <?php
    $config_json = file_get_contents("config.json");
    $config_json = utf8_encode($config_json);
    $json_array = json_decode($config_json, true);
    ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="<?php echo $json_array['interval_ms'];?>">
        <!-- Indicators -->
        <ol class="carousel-indicators">

            <?php
                
            $dir = "images/";

            $files = array_filter(scandir($dir), function($item) {
                global $dir;
                return !is_dir($dir . $item);
            });
            
            $files = array_values($files);

            $num_files = count($files);
            for($i = 0; $i < $num_files; $i++)
            {
                if ($i == 0) {
                    echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>' . "\n";
                }
                else {
                    echo "<li data-target=\"#myCarousel\" data-slide-to=\"$i\"></li>\n";
                }
            }
                echo '
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">' . "\n";
            for($i = 0; $i < $num_files; $i++)
            {
                $file = $files[$i];
                if ($i == 0) {
                    echo '<div class="item active">' . "\n";
                }
                else {
                    echo '<div class="item">' . "\n";
                }
                echo "<img src=\"$dir$file\" alt=\"slide$i\" width=100% height=100%>\n";
                echo '</div>' . "\n";
            } 
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</body>
</html>

