<html>
<head>
<meta http_equiv='refresh' content='30'>
</head>

<body>
<center>
<form method="POST">
Enter your quary
<br></br>
Quary:<input type="text" name="n1" required>*
<br>
<input type="submit" name="n2" value='search'>
</form>
</center>
<?php
$x=0;
$A=0;
$B=0;
$C=0;
$D=0;
$E=0;
$alphabet=array("A","B","C","D","E");
$arr=array("D1.txt","D2.txt","D3.txt","D4.txt","D5.txt");
foreach($arr as $Key)
{
//open document
if($f=fopen($Key,"r")){
$r=fread($f,filesize($Key));
$s=filesize("$Key");
fclose($f);
//echo $r."<br>";
//echo $s."<br>";		
}
//count the alphabet in the string
$aa=str_split($r);
$arr=array();
$letter=array();
for($i=0;$i<$s;$i++){
if(!isset($arr[$aa[$i]])){
	$arr[$aa[$i]]=1;
	$letter[]=$aa[$i];
}	
else{
	$arr[$aa[$i]]=$arr[$aa[$i]]+1;
}	
}
ksort($arr);
sort($letter);
//print_r($arr);
$max=max($arr);
//echo $max."<br>";
$weight=array();
$tf=array();
//calculate tf
foreach($arr as $Key){
	$tf[]=$Key/$max;	
}
//print_r($tf);
//echo"<br>";
//check if the letter exist in the document or not to count the number of the document
if(in_array("A",$letter))
	$A++;
if(in_array("B",$letter))
	$B++;
if(in_array("C",$letter))
	$C++;
if(in_array("D",$letter))
	$D++;
if(in_array("E",$letter))
	$E++;
//save tf for each and every document
if($x==0)
{
	$tf1=$tf;
	$letter1=$letter;
	//print_r($tf1);
	//echo "<br>";
	//print_r($letter1);
	//echo "<br>";
}
elseif($x==1)
{
	$tf2=$tf;
	$letter2=$letter;
}
elseif($x==2)
{
	$tf3=$tf;
	$letter3=$letter;
}
elseif($x==3)
{
	$tf4=$tf;
	$letter4=$letter;
}
else
{
	$tf5=$tf;
	$letter5=$letter;
}
$x++;

	}
	//Quary
if(isset($_POST["n2"])){
$x=$_POST["n1"];
$Q=str_split($x);
$lq=array();
for($i=0;$i<count($Q);$i++){
if(!isset($repet[$Q[$i]])){
	$repet[$Q[$i]]=1;
	$lq[]=$Q[$i];
}	
else{
	$repet[$Q[$i]]=$repet[$Q[$i]]+1;
}	
}
ksort($repet);
sort($lq);
//print_r($lq);
//print_r($repet);
$Mq=max($repet);
$tfq=array();
//calculate tf
foreach($repet as $Key){
	$tfq[]=$Key/$Mq;	
}
//print_r($tfq);
if(in_array("A",$lq))
	$A++;
if(in_array("B",$lq))
	$B++;
if(in_array("C",$lq))
	$C++;
if(in_array("D",$lq))
	$D++;
if(in_array("E",$lq))
	$E++;

}
	//echo $A."<br>".$B."<br>".$C."<br>".$D."<br>".$E."<br>";
	$df=array($A,$B,$C,$D,$E);
//print_r($df);
$idf=array();
for($i=0;$i<count($df);$i++){
	if($df[$i]!=0){
		$idf[]=log((6/$df[$i]),2);
	}
}
//print_r($idf);
//echo "<br>";
//calculate the final weight
$Dw1=array();
$Dw2=array();
$Dw3=array();
$Dw4=array();
$Dw5=array();
$Qw=array();
for($i=0;$i<count($alphabet);$i++){
	for($j=0;$j<count($letter1);$j++){
		if($alphabet[$i]==$letter1[$j])
		$Dw1[]=($idf[$i]*$tf1[$j]);	
	}	
}
for($i=0;$i<count($alphabet);$i++){
	for($j=0;$j<count($letter2);$j++){
		if($alphabet[$i]==$letter2[$j])
		$Dw2[]=($idf[$i]*$tf2[$j]);	
	}	
}
for($i=0;$i<count($alphabet);$i++){
	for($j=0;$j<count($letter3);$j++){
		if($alphabet[$i]==$letter3[$j])
		$Dw3[]=($idf[$i]*$tf3[$j]);	
	}	
}
for($i=0;$i<count($alphabet);$i++){
	for($j=0;$j<count($letter4);$j++){
		if($alphabet[$i]==$letter4[$j])
		$Dw4[]=($idf[$i]*$tf4[$j]);	
	}	
}
for($i=0;$i<count($alphabet);$i++){
	for($j=0;$j<count($letter5);$j++){
		if($alphabet[$i]==$letter5[$j])
		$Dw5[]=($idf[$i]*$tf5[$j]);	
	}	
}
for($i=0;$i<count($alphabet);$i++){
	for($j=0;$j<count($lq);$j++){
		if($alphabet[$i]==$lq[$j])
		$Qw[]=($idf[$i]*$tfq[$j]);	
	}	
}
/*print_r($Dw1);
echo "<br>";
print_r($Dw2);
echo "<br>";
print_r($Dw3);
echo "<br>";
print_r($Dw4);
echo "<br>";
print_r($Dw5);
echo "<br>";
print_r($Qw);
echo "<br>";*/
//calculate semintary
$sem1=0;
$sem2=0;
$sem3=0;
$sem4=0;
$sem5=0;
$f1=0;$f2=0;$f3=0;$f4=0;$f5=0;$f6=0;
//calculate inner product
for($i=0;$i<count($lq);$i++){
	for($j=0;$j<count($letter1);$j++){
		if($lq[$i]==$letter1[$j])
		$sem1=$sem1+($Qw[$i]*$Dw1[$j]);
	}	
}
for($i=0;$i<count($lq);$i++){
	for($j=0;$j<count($letter2);$j++){
		if($lq[$i]==$letter2[$j])
		$sem2=$sem2+($Qw[$i]*$Dw2[$j]);
	}	
}
for($i=0;$i<count($lq);$i++){
	for($j=0;$j<count($letter3);$j++){
		if($lq[$i]==$letter3[$j])
		$sem3=$sem3+($Qw[$i]*$Dw3[$j]);
	}	
}
for($i=0;$i<count($lq);$i++){
	for($j=0;$j<count($letter4);$j++){
		if($lq[$i]==$letter4[$j])
		$sem4=$sem4+($Qw[$i]*$Dw4[$j]);
	}	
}
for($i=0;$i<count($lq);$i++){
	for($j=0;$j<count($letter5);$j++){
		if($lq[$i]==$letter5[$j])
		$sem5=$sem5+($Qw[$i]*$Dw5[$j]);
	}	
}
//calculate f for every document
for($i=0;$i<count($Dw1);$i++){
	$f1=$f1+pow($Dw1[$i],2);
}
for($i=0;$i<count($Dw2);$i++){
	$f2=$f2+pow($Dw2[$i],2);
}
for($i=0;$i<count($Dw3);$i++){
	$f3=$f3+pow($Dw3[$i],2);
}
for($i=0;$i<count($Dw4);$i++){
	$f4=$f4+pow($Dw4[$i],2);
}
for($i=0;$i<count($Dw5);$i++){
	$f5=$f5+pow($Dw5[$i],2);
}
for($i=0;$i<count($Qw);$i++){
	$f6=$f6+pow($Qw[$i],2);
}
//calculate cos semmitry btween quary and documents
$cos1=$sem1/(sqrt($f1*$f6));
$cos2=$sem2/(sqrt($f2*$f6));
$cos3=$sem3/(sqrt($f3*$f6));
$cos4=$sem4/(sqrt($f4*$f6));
$cos5=$sem5/(sqrt($f5*$f6));
//final search
$final=array("D1"=>"$cos1","D2"=>"$cos2","D3"=>"$cos3","D4"=>"$cos4","D5"=>"$cos5");
arsort($final);
foreach($final as $Key=>$value){
echo "$Key=>$value"."<br>";
}
?>
</body>

</html>