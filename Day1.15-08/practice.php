<?php
//array reverse 1
$array = array(1, 2, 3, 4);
$size = sizeof($array);
echo $size;
echo "<br>";
for($i=$size-1; $i>=0; $i--){
    echo $array[$i];
}
echo "<br>";

//array reverse 2
$array = array(1, 2, 3, 4);
$size = sizeof($array);
$a2 = array();
for($i=$size-1; $i>=0; $i--){
    echo $array[$i];
    for($j =0; $j<$size;$j++){
        $a2[$j] = $array[$i];
    }
}
echo "<br>";

//array reverse 3
$array = array(1, 2, 3, 4);
$size = sizeof($array);
print_r (array_reverse($array));
echo "<br>";

//Alternate of preg_match
$string1 = "My Name is Muhammad Haris";
$r = strpos($string1,"i");
echo "index : ".$r;
echo "<br>";
if($r!=NULL)
{
    echo 1;
}

$i="/i/";
echo (preg_match_all ($i,$string1));
echo"<br>";
echo (preg_replace ($i,"o",$string1));
?>