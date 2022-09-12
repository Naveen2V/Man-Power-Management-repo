<?php
$txt_file = fopen('temp.txt','r');
$a = 1;
while ($line = fgets($txt_file)) {
 print_r($line."<br>");
}
fclose($txt_file);
?>