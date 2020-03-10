<html>
<body>
<form method="post">
<center>
<h1>scheduling cpu</h1>
no of process:<input type="text" name="n"/><br><br>
process:<input type="text" name="p" required />*<br><br>
quantim time:<input type="text" name="q"/><br><br>
arrival time(array):<input type="text" name="arrival" required />*<br><br>
service time(array):<input type="text" name="service" required />*<br><br>
<input type='submit' name='ok' value="RR"/>
<input type="submit" name="n4" value='sjf'>
</center>
</form>
<?php
//Round robin ***************************************************
//******************************************************************************
$t1=array();$enterp=array();
$t=0;$time=array();$waitingtime=array(); $s1=array();
if(isset($_POST['ok'])){
	$n=$_POST['n'];
	$p=$_POST['p'];
	$q=$_POST['q'];
	$arrival=$_POST['arrival'];
	$service=$_POST['service'];

$p=explode(' ',$p);
$arrival=explode(' ',$arrival);
$service=explode(' ',$service);
$checks=array();
for($i=0;$i<count($p);$i++){
	$s[$p[$i]]=$service[$i];
	$a[$p[$i]]=$arrival[$i];
}
$checks=$s;
//first iteration
$x=min($a);
$key = array_search($x, $a);
if($s[$key]<=$q){
	$t=$s[$key]+$a[$key];
	$time[$key]=$t;
	$waitingtime[$key]=0;

} 
//print_r($s);
else{
	$s[$key]=$s[$key]-$q;
	$t=$q+$a[$key];
	$time[$key]=$t;
	$waitingtime[$key]=0;
	$s1[$key]=$s[$key];
}
echo"<center>Steps for calculate time</center>"."<br>";
//echo"<center>s=>0</center>"."<br>";
//echo "<center>".$key."=>".$t."</center>"."<br>";
echo "<center><table><th>process</th><th>time</th>
<tr><td>start</td><td>0</td></tr>
<tr><td>".$key."</td><td>".$t."</td></tr>";
$t1[]=$t;$enterp[]=$key;// for gaint chart
//p2 p3 p4
$z=array_search($x,$arrival); //search for key
	unset($service[$z]);
	unset($arrival[$z]);
	//unset($p[$z]);
//print_r($s1);
$a2=array(); $s2=array();
	foreach($arrival as $Key){
		if($Key<=$t){
		$k = array_search($Key,$arrival);	
			$a2[$p[$k]]=$Key;
			unset($arrival[$k]);
			$s2[$p[$k]]=$service[$k];
			unset($service[$k]);
		}
	}
	
	$s2[$key]=$s1[$key];
	unset($s1[$key]);
	//print_r($s2);
//second iteration
	for($i=0;$i<1;$i++){
		$x=0;
	$x=min($a2);
$key = array_search($x, $a2);
if($s2[$key]<=$q){
	if($a2[$key]<$t)
	{$waitingtime[$key]=$t-$a2[$key];}
else{$waitingtime[$key]=0;}
	if($a2[$key]<=$t){$t+=$s2[$key];}
	else{$t+=$s2[$key]+$a2[$key];}
	$time[$key]=$t;
}
else{
	$s2[$key]=$s2[$key]-$q;
	if($a2[$key]<$t)
	{$waitingtime[$key]=$t-$x;}
else{$waitingtime[$key]=0;}
	$t=$t+$q;
	$time[$key]=$t;
	$s1[$key]=$s2[$key];
}
	unset($s2[$key]);
	unset($a2[$key]);
	
}
//print_r($s2);
//echo $t;
//echo "<center>".$key."=>".$t."</center>"."<br>";
	echo "<tr><td>".$key."</td><td>".$t."</td></tr>";
	$t1[]=$t;$enterp[]=$key;
	foreach($arrival as $Key){
		if($Key<=$t){
		$k = array_search($Key,$arrival);	
			$a2[$p[$k]]=$Key;
			unset($arrival[$k]);
			$s2[$p[$k]]=$service[$k];
			unset($service[$k]);
		}
	}
	$s2[$key]=$s1[$key];
	unset($s1[$key]);
	for($i=0;$i<1;$i++){
		$x=0;
	$x=min($a2);
$key = array_search($x, $a2);
if($s2[$key]<=$q){
	if($a2[$key]<$t)
	{$waitingtime[$key]=$t-$a2[$key];}
else{$waitingtime[$key]=0;}
	if($a2[$key]<=$t){$t+=$s2[$key];}
	else{$t+=$s2[$key]+$a2[$key];}
	$time[$key]=$t;
}
//print_r($s);
else{
	$s2[$key]=$s2[$key]-$q;
	if($a2[$key]<$t)
	{$waitingtime[$key]=$t-$x;}
else{$waitingtime[$key]=0;}
	$t=$t+$q;
	$time[$key]=$t;
	$s1[$key]=$s2[$key];
}
	unset($s2[$key]);
	unset($a2[$key]);	
}
	foreach($arrival as $Key){
		if($Key<=$t){
		$k = array_search($Key,$arrival);	
			$a2[$p[$k]]=$Key;
			unset($arrival[$k]);
			$s2[$p[$k]]=$service[$k];
			unset($service[$k]);
		}
	}
	//$s2[$key]=$s1[$key];
	unset($s1[$key]);
	//echo "<center>".$key."=>".$t."</center>"."<br>";
	echo "<tr><td>".$key."</td><td>".$t."</td></tr>";
	$t1[]=$t;$enterp[]=$key;
	for($i=0;$i<1;$i++){
		$x=0;
	$x=min($a2);
$key = array_search($x, $a2);
if($s2[$key]<=$q){
	if($a2[$key]<$t)
	{$waitingtime[$key]=$t-$a2[$key];}
else{$waitingtime[$key]=0;}
	if($a2[$key]<=$t){$t+=$s2[$key];}
	else{$t+=$s2[$key]+$a2[$key];}
	$time[$key]=$t;
}
//print_r($s);
else{
	$s2[$key]=$s2[$key]-$q;
	if($a2[$key]<$t)
	{$waitingtime[$key]=$t-$x;}
else{$waitingtime[$key]=0;}
	$t=$t+$q;
	$time[$key]=$t;
	$s1[$key]=$s2[$key];
}
	unset($s2[$key]);
	unset($a2[$key]);	
}
	foreach($arrival as $Key){
		if($Key<=$t){
		$k = array_search($Key,$arrival);	
			$a2[$p[$k]]=$Key;
			unset($arrival[$k]);
			$s2[$p[$k]]=$service[$k];
			unset($service[$k]);
		}
	}
	$s2[$key]=$s1[$key];
	unset($s1[$key]);
	//echo "<center>".$key."=>".$t."</center>"."<br>";
	echo "<tr><td>".$key."</td><td>".$t."</td></tr>";
	$t1[]=$t;$enterp[]=$key;
	// lw d5al a>16 lazm 23mal copy paste  67
	for($i=0;$i<count($s2)+6;$i++){
		foreach($s2 as $Key){
			$w=array_search($Key,$s2);
			if($Key==$checks[$w]){
			if($s2[$w]<=$q){
	if($a2[$w]<$t)
	{$waitingtime[$w]=$t-$a2[$w];}
else{$waitingtime[$w]=0;}
	if($a2[$w]<=$t){$t+=$s2[$w];}
	else{$t+=$s2[$w]+$a2[$w];}
	$time[$w]=$t;
unset($s2[$w]);
	unset($a2[$w]);	

}
else{
	$s2[$w]=$s2[$w]-$q;
	if($a2[$w]<$t)
	{$waitingtime[$w]=$t-$a2[$w];}
else{$waitingtime[$w]=0;}
	$t=$t+$q;
	$time[$w]=$t;
	$s1[$w]=$s2[$w];
		unset($s2[$w]);
	unset($a2[$w]);	
	
$s2[$w]=$s1[$w];
unset($s1[$w]);
}
		
	}
	
	
	//lw el process m4 2wal mara yd5ol
	//*****************************************************************
else{
	if($s2[$w]<=$q){
		$sumwaiting=0;
		$sumwaiting=$t-$time[$w];
	$waitingtime[$w]+=$sumwaiting;
	$t+=$s2[$w];
	$time[$w]=$t;
unset($s2[$w]);
	unset($a2[$w]);	

}
//print_r($s);
//lw el time >q
else{
	$s2[$w]=$s2[$w]-$q;
			$sumwaiting=0;
		$sumwaiting=$t-$time[$w];
	$waitingtime[$w]+=$sumwaiting;
	$t=$t+$q;
	$time[$w]=$t;
	$s1[$w]=$s2[$w];
		unset($s2[$w]);
	unset($a2[$w]);	
	
$s2[$w]=$s1[$w];
unset($s1[$w]);
}	
}//end of else lw elprocess mish 2wal mara yd5ol
	//echo "<center>".$w."=>".$t."</center>"."<br>";
	echo "<tr><td>".$w."</td><td>".$t."</td></tr>";
	$t1[]=$t;$enterp[]=$w;
	}// for choclate 11
	}// loop elkpera
	echo"</table><br></center>";
	$grant=array();
	for($j=0;$j<=$t;$j++){
		$grant[]=$j;
	}
	//drow the grant chartt
	echo"<table border='2' width='75%'><tr><td>time</td>";
	for($j=0;$j<=$t;$j++){
		if (in_array($grant[$j],$t1)) {
			$key=array_search($grant[$j],$t1);
			if($key==0){
				for($i=0;$i<=$t1[$key];$i++)
				{echo"<td>".$enterp[$key]."=>".$grant[$i]."</td>";}}
			else{
				for($i=$grant[$t1[$key-1]]+1;$i<=$t1[$key];$i++)
			    {echo"<td>".$enterp[$key]."=>".$grant[$i]."</td>";}
		}
			}		
		}
		echo"</tr></table><br>";
	
ksort($waitingtime);
	$sum=0;
	foreach($waitingtime as $Key)
	{$sum+=$Key;}
	$avg=$sum/count($waitingtime);
	echo "<center>wating time for each process</center>"."<br>";
	foreach($waitingtime as $Key=>$value){echo "<center>"."$Key=>$value"."<br>"."</center>";}
	echo "<center>"."Average Time=".$avg."</center>";
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//Sjf ****************************************************************************
$time=0;
$t=array();$t['s']=0;$watingtime=array();$t1=array();$enterp=array();
if(isset($_POST["n4"])){
	$process=explode(" ",$_POST["p"]);
	$service=explode(" ",$_POST["service"]);
    $arrival=explode(" ",$_POST["arrival"]);

	$fact='f';
	foreach($arrival as $Key){
		if($Key==0){$fact='f';}
		else{$fact='t';break;}
	}
	if($fact=='t'){
	for($i=0;$i<count($process);$i++){
	$s[$process[$i]]=$service[$i];
    $a[$process[$i]]=$arrival[$i];	
	}
	//first iteration
	$minat=min($a);
	$key = array_search($minat,$arrival);//dh rakm
$time=$s[$process[$key]]+$a[$process[$key]]; //peocess[$key]=btrg3 p1 aw keda
$t[$process[$key]]=$time;//$t[$key]=$t[p1]
$watingtime[$process[$key]]=0;
$t1[]=$time;$enterp[]=$process[$key];//gaint chart
unset($s[$process[$key]]);
unset($a[$process[$key]]);
unset($process[$key]);

//delete process from the enter data
$a1=array();$s1=array();$p1=array();//3shan a3ed trteb el array 2abl elso8el
foreach($a as $Key){
	$a1[]=$Key;
}
foreach($s as $Key){
	$s1[]=$Key;
}
foreach($process as $Key){
	$p1[]=$Key;
}
//print_r($a1);
//check if there is process enter in the remain time
$a2=array();$s2=array();$p2=array();
for($i=0;$i<count($a1)+8;$i++){
	if(count($a1)!=0){
if($a1[$i]<=$time){
	$a2[]=$a1[$i];
	$s2[]=$s1[$i];
	$p2[]=$p1[$i];
	unset($a1[$i]);
	unset($s1[$i]);
unset($p1[$i]);}
else{break;}
}}
//handel the rest of the process that doesnot come yet
$a3=array();$s3=array();$p3=array();
foreach($a1 as $Key){
	$a3[]=$Key;
}
foreach($s1 as $Key){
	$s3[]=$Key;
}
foreach($p1 as $Key){
	$p3[]=$Key;
}
//print_r($p3);
//second iteration
$mins=min($s2);

	$key = array_search($mins, $s2);
	$watingtime[$p2[$key]]=$time-$a2[$key];
	if($a2[$key]<=$time)
		$time=$time+$mins;
	else
		$time+=$mins+$a2[$key];
	$t[$p2[$key]]=$time;
	$t1[]=$time;$enterp[]=$p2[$key];
	//print_r($watingtime);
	unset($p2[$key]);unset($s2[$key]);unset($a2[$key]);
	$a4=array();$s4=array();$p4=array();
foreach($a2 as $Key){
	$a4[]=$Key;
}
foreach($s2 as $Key){
	$s4[]=$Key;
}
foreach($p2 as $Key){
	$p4[]=$Key;
}
	//print_r($p4);
	//the rest of the process
	if(count($p3)!=0){
	for($i=0;$i<count($a3)+8;$i++){
		if(count($a3)!=0){
if($a3[$i]<=$time){
	$a4[]=$a3[$i];
	$s4[]=$s3[$i];
	$p4[]=$p3[$i];
	unset($a3[$i]);
	unset($s3[$i]);
	unset($p3[$i]);
}}
	else{break;}}
	//print_r($a4);print_r($s4);print_r($p4);
//the rest of the iterations
while(count($p4)!=0){
	$mins=min($s4);
	
	$key = array_search($mins, $s4);
	$watingtime[$p4[$key]]=$time-$a4[$key];
	if($a4[$key]<=$time)
		$time=$time+$mins;
	else
		$time+=$mins+$a4[$key];
	$t[$p4[$key]]=$time;
	$t1[]=$time;$enterp[]=$p4[$key];
		unset($p4[$key]);unset($s4[$key]);unset($a4[$key]);
		
}	
	}
	else{
		while(count($p4)!=0){
	$mins=min($s4);
	
	$key = array_search($mins, $s4);
	$watingtime[$p4[$key]]=$time-$a4[$key];
	if($a4[$key]<=$time)
		$time=$time+$mins;
	else
		$time+=$mins+$a4[$key];
	$t[$p4[$key]]=$time;
		unset($p4[$key]);unset($s4[$key]);unset($a4[$key]);
		$t1[]=$time;$enterp[]=$p4[$key];
}
	}
	}
	//if arrival equal zero*****************************************************
	else{
		while(count($process)!=0){//number of iteration
	$mins=min($service);
	
	$key = array_search($mins,$service);
	$watingtime[$process[$key]]=$time;
		$time=$time+$mins;
	$t[$process[$key]]=$time;
	$t1[]=$time;$enterp[]=$process[$key];
		unset($process[$key]);unset($service[$key]);
}
	}
	ksort($watingtime);
	$sum=0;
	foreach($watingtime as $Key)
	{$sum+=$Key;}
	$avg=$sum/count($watingtime);
	//print time
	echo "<center>step to calculate time</center>"."<br>";
	foreach($t as $Key=>$value){echo "<center>"."$Key=>$value"."<br>"."</center>";}
	$grant=array();
	for($j=0;$j<=$time;$j++){
		$grant[]=$j;
	}
	//drow the grant chartt
	echo"<table border='2' width='75%'><tr><td>time</td>";
	for($j=0;$j<=$time;$j++){
		if (in_array($grant[$j],$t1)) {
			$key=array_search($grant[$j],$t1);
			if($key==0){
				for($i=0;$i<=$t1[$key];$i++)
				{echo"<td>".$enterp[$key]."=>".$grant[$i]."</td>";}}
			else{
				for($i=$grant[$t1[$key-1]]+1;$i<=$t1[$key];$i++)
			    {echo"<td>".$enterp[$key]."=>".$grant[$i]."</td>";}
		}
			}		
		}
		echo"</tr></table><br>";
	echo "<center>wating time for each process</center>"."<br>";
	foreach($watingtime as $Key=>$value){echo "<center>"."$Key=>$value"."<br>"."</center>";}
	echo "<center>"."Average Time=".$avg."</center>";
}
	?>
</body>
</html>