<?php
$a = Array( Array(1,2),Array(4,5));
$b = Array( Array(7,5), Array(3,2));

//$sumArray = array();

$c = array();

for($i=0;$i<2;$i++)
{
    for($j=0;$j<2;$j++)
    {
        $c[$i][$j]=0;
        for($k=0;$k<2;$k++)
        {

            $c[$i][$j]=$c[$i][$j]+($a[$i][$k]*$b[$k][$j]);
        }
    }
}


echo "<pre/>";
print_r($c);
?>