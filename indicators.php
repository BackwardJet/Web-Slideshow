<?php
    
$dir = "uploads/";

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
//     echo '</ol>';
/*
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
// echo "</div>\n";
*/
?>
