<?php
$file=fopen($_GET["file"], "r");
if ($file)
    while (!feof($file)){
    $s=fgets($file);
    echo "<p>".htmlspecialchars($s)."</p>";
    }
fclose($file)
?>
