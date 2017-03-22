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
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
                
            $dir = "images/";

            $files = scandir($dir); 
            $num_files = count($files);
            $first = true;
            for($i = 0; $i < $num_files; $i++)
            {
                $file = $files[$i];
                if(is_file($dir.$file)) {
                    if ($first) {
                        ?>
                        <div class="item active">
                        <?php
                        $first = false;
                    }
                    else {
                        ?>
                        <div class="item">
                        <?php
                    }
                        ?>
                    <img src="<?php echo "$dir$file";?>" alt="slide<?php echo "$i";?>" width=100% height=100%>
                    </div>
                <?php
                }
            } ?>
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

