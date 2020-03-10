<html>
<body>
<form method="post">
Hurdles:<input name="x">
<br><br>
Fulfill:<input name="y">
<br><br>
Platoon:<input name="z">
<br><br>
<input type="submit" name="add">
<br><br>
</form>
<?php
 if(isset($_POST["add"]))
{
//1.Read user input
$Hurdles=$_POST["x"];
$Fulfill=$_POST["y"];
$Platoon=$_POST["z"];
//2.Check primary-key value is Not Null
if(empty($Fulfill)){
die("<script>alert('Duplicate Values Not Allow')</script>");
}
//3.Read the entire file
$data=simplexml_load_file("data.xml");
//4.Check if primary-key value already exists
foreach($data as $row){
if($Fulfill==$row->Fulfill){
die("<script>alert('Empty Values Not Allow')</script>");
}
}
if(!is_numeric($Fulfill)){
die("<script>alert('Invalid value for Fulfill')</script>");
}
//6.Add new row to the variable $data
$newvalue=new SimpleXMLElement($data->asXML());
$newRow=$newvalue->addChild("Row");
$newRow->addChild("Hurdles",$Hurdles);
$newRow->addChild("Fulfill",$Fulfill);
$newRow->addChild("Platoon",$Platoon);
//6.Save the data variable into the xml file
$newvalue->asXML("data.xml");
echo "<script>alert('New Record added')</script>";
}
?>
</body>
</html>