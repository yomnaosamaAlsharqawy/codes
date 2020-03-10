<?php
$x=0;
$l=array("A","B","C","D","E");
$w=array("A.txt","B.txt","C.txt","D.txt","E.txt");
foreach($w as $Key){
$f=fopen("$Key","r");
$r=fread($f,filesize($Key));
fclose($f);
$aa=explode(" ",$r);
//print_r($aa);
//echo "<br>";
if($x==0){
$aar=array();
foreach($aa as $Key){
if($Key!="A")
$aar[]=$Key;	
}	
//print_r($aar);
$A=array();
for($i=0;$i<count($aar);$i++){
if(!isset($A[$aar[$i]])){
	$A[$aar[$i]]=1;

}}
for($i=0;$i<count($l);$i++){
if(!isset($A[$l[$i]])){
	$A[$l[$i]]=0;
	
}}
ksort($A);
$A1=array();
foreach($A as $Key)
{$A1[]=$Key;}

//print_r($A);
print_r($A1);
echo "<br>";	
}
elseif($x==1){
$aar=array();
foreach($aa as $Key){
if($Key!="B")
$aar[]=$Key;	
}
ksort($aar);	
//print_r($aar);
$B=array();
for($i=0;$i<count($aar);$i++){
if(!isset($B[$aar[$i]])){
	$B[$aar[$i]]=1;

}}
for($i=0;$i<count($l);$i++){
if(!isset($B[$l[$i]])){
	$B[$l[$i]]=0;
	
}}
ksort($B);
$B1=array();
foreach($B as $Key)
{$B1[]=$Key;}
//print_r($B);
print_r($B1);
echo "<br>";	
}
elseif($x==2){
$aar=array();
foreach($aa as $Key){
if($Key!="C")
$aar[]=$Key;	
}	
//print_r($aar);
$C=array();
for($i=0;$i<count($aar);$i++){
if(!isset($C[$aar[$i]])){
	$C[$aar[$i]]=1;

}}
for($i=0;$i<count($l);$i++){
if(!isset($C[$l[$i]])){
	$C[$l[$i]]=0;
	
}}
ksort($C);
$C1=array();
foreach($C as $Key)
{$C1[]=$Key;}
//print_r($C);
print_r($C1);
echo "<br>";	
}
elseif($x==3){
$aar=array();
foreach($aa as $Key){
if($Key!="D")
$aar[]=$Key;	
}	
//print_r($aar);
$D=array();
for($i=0;$i<count($aar);$i++){
if(!isset($D[$aar[$i]])){
	$D[$aar[$i]]=1;

}}
for($i=0;$i<count($l);$i++){
if(!isset($D[$l[$i]])){
	$D[$l[$i]]=0;
	
}}
ksort($D);
$D1=array();
foreach($D as $Key)
{$D1[]=$Key;}
//print_r($D);
print_r($D1);
echo "<br>";	
}
else{
$aar=array();
foreach($aa as $Key){
if($Key!="E")
$aar[]=$Key;	
}	
//print_r($aar);
$E=array();
for($i=0;$i<count($aar);$i++){
if(!isset($E[$aar[$i]])){
	$E[$aar[$i]]=1;

}}
for($i=0;$i<count($l);$i++){
if(!isset($E[$l[$i]])){
	$E[$l[$i]]=0;
	
}}
ksort($E);
$E1=array();
foreach($E as $Key)
{$E1[]=$Key;}
//print_r($E);
print_r($E1);
echo "<br>";	
}
$x++;
}
$adj=array();
for($i=0;$i<count($l);$i++){
	if($i==0)
	{for($j=0;$j<count($l);$j++){
		$adj[$i][$j]=$A1[$j];
		//$adj[]=$ad;
		echo $adj[$i][$j];
	}
	}
	if($i==1)
	{for($j=0;$j<count($l);$j++){
		$adj[$i][$j]=$B1[$j];
		echo $adj[$i][$j];
	}}
	if($i==2)
	{for($j=0;$j<count($l);$j++){
		$adj[$i][$j]=$C1[$j];
		echo $adj[$i][$j];
	}}
	if($i==3)
	{for($j=0;$j<count($l);$j++){
		$adj[$i][$j]=$D1[$j];
		echo $adj[$i][$j];
	}}
	if($i==4)
	{for($j=0;$j<count($l);$j++){
		$adj[$i][$j]=$E1[$j];
		echo $adj[$i][$j];
	}}echo "<br>";
}
//print_r($adj);
//echo "<br>";
echo "++++++++++++++++++++++++++++++++++";
echo "<br>";
$adjt=array();
for($i=0;$i<count($l);$i++)
{
	for($j=0;$j<count($l);$j++){
	$adjt[$i][$j]=$adj[$j][$i];
	echo $adjt[$i][$j];
	}
echo"<br>";	
}
//print_r($adjt);
//-------------------------------------------------------------------------------------------------------------
//calculate a0 by a0=adjt*h
$sum=0;
$h1=array(array(1),array(1),array(1),array(1),array(1));
//print_r($h);
$a0=array();
for($i=0;$i<count($l);$i++){

	for($j=0;$j<count($l);$j++){
		$sum=$sum+($adjt[$i][$j]*$h1[$j][0]);
$a0[$i][0]=$sum;	
	}
	$sum=0;
}
//print_r($a0);
//echo "<br>";
//calculate h0 by adj*a0
$h0=array();
for($i=0;$i<count($l);$i++){

	for($j=0;$j<count($l);$j++){
		$sum=$sum+($adj[$i][$j]*$a0[$j][0]);
$h0[$i][0]=$sum;	
	}
	$sum=0;
}
//print_r($h0);
//echo "<br>";
//-------------------------------------------------------------------------------------------------------------
//normalization for a0
$ca=0;
$y=0;
for($i=0;$i<count($l);$i++){
$y+=pow($a0[$i][0],2);	
}
$ca=sqrt($y);
//echo $ca."<br>";
for($i=0;$i<count($l);$i++){
	$a0[$i][0]=$a0[$i][0]/$ca;
}
//print_r($a0);
$ca=0;
$y=0;
//echo"<br>";
//normalization for h0
$ch=0;
$m=0;
for($i=0;$i<count($l);$i++){
$m=$m+pow($h0[$i][0],2);	
}
$ch=sqrt($m);
//echo $ch."<br>";
for($i=0;$i<count($l);$i++){
	$h0[$i][0]=$h0[$i][0]/$ch;
}
//print_r($h0);
$ch=0;
$m=0;
//echo "<br>";
//--------------------------------------------------------------------------------------------------------
//calculate adj*adjt
$R=array();
for($i=0;$i<count($l);$i++)
{
    for($j=0;$j<count($l);$j++)
    {
        $R[$i][$j]=0;
        for($k=0;$k<count($l);$k++)
        {

            $R[$i][$j]=$R[$i][$j]+($adj[$i][$k]*$adjt[$k][$j]);
        }
    }
}//print_r($R);
//echo "<br>";
//-----------------------------------------------------------------------------------
//calculate adjt*adj
$Z=array();
for($i=0;$i<count($l);$i++)
{
    for($j=0;$j<count($l);$j++)
    {
        $Z[$i][$j]=0;
        for($k=0;$k<count($l);$k++)
        {

            $Z[$i][$j]=$Z[$i][$j]+($adjt[$i][$k]*$adj[$k][$j]);
        }
    }
}print_r($Z);
echo "<br>";
//--------------------------------------------------------------------------------------------------------------
$a=array();
$h=array();
//calculate a
echo "++++++++++++++++++++++++++++++++++++++++++"."<br>";
for($w=0;$w<20;$w++){
if($w==0)
{
for($i=0;$i<count($l);$i++){

	for($j=0;$j<count($l);$j++){
		$sum=$sum+($Z[$i][$j]*$a0[$j][0]);
	}
	$a[$i][0]=$sum;
	$sum=0;
}
for($i=0;$i<count($l);$i++){
$y=$y+pow($a[$i][0],2);	
}
$ca=sqrt($y);
for($i=0;$i<count($l);$i++){
	$a[$i][0]=$a[$i][0]/$ca;
}
//print_r($a);	
}
else{
for($i=0;$i<count($l);$i++){

	for($j=0;$j<count($l);$j++){
		$sum=$sum+($Z[$i][$j]*$a[$j][0]);
	}
	$a[$i][0]=$sum;	
	$sum=0;
}
//echo "<br><br><br><br>";
//print_r($a);	
for($i=0;$i<count($l);$i++){
$y=$y+pow($a[$i][0],2);	
}
$ca=sqrt($y);
for($i=0;$i<count($l);$i++){
	$a[$i][0]=$a[$i][0]/$ca;
}	
}
echo "<br><br><br><br>";
print_r($a);	
$ca=0;
$y=0;	
	
	
}
echo "matrix a=";
print_r($a);
echo "<br><br>";
//echo $ca;
//********************************************************************************************
//calculate h
echo "++++++++++++++++++++++++++++++++++++++++++"."<br>";
for($w=0;$w<20;$w++){
if($w==0)
{
for($i=0;$i<count($l);$i++){

	for($j=0;$j<count($l);$j++){
		$sum=$sum+($R[$i][$j]*$h0[$j][0]);
$h[$i][0]=$sum;	
	}
	$sum=0;
}
for($i=0;$i<count($l);$i++){
$m=$m+pow($h[$i][0],2);	
}
$ch=sqrt($m);
for($i=0;$i<count($l);$i++){
	$h[$i][0]/=$ch;
}
	//print_r($h);
}

else{
for($i=0;$i<count($l);$i++){

	for($j=0;$j<count($l);$j++){
		$sum=$sum+($R[$i][$j]*$h[$j][0]);
$h[$i][0]=$sum;	
	}
	$sum=0;
}	
for($i=0;$i<count($l);$i++){
$m=$m+pow($h[$i][0],2);	
}
$ch=sqrt($m);
for($i=0;$i<count($l);$i++){
	$h[$i][0]/=$ch;
}	
}
//echo "<br><br><br><br>";
//print_r($h);	
$ch=0;	
$m=0;	
	
}
//echo $ch;
echo "matrix h=";
print_r($h);
?>