<html>
<head>
<meta http_equiv='refresh' content='30'>
</head>
<body>
<form method="post">
<!put all value of primary key in drop-down list>
Select Fulfill:<select name="x">
<br><br>
<?php
//Read the whole xml file into a variable
$data=simplexml_load_fil("data.xml")
//Each primary key value is a choice in the drop-down list
foreach($data as $row){
echo"<option>".$row->Fulfill."</option>";
}
?>
</select><br><br>
<input type="submit" name="delete">
</form>
<?php
if(isset($_POST["delete"]))
{
//Read input from the user
$Fulfill=$_POST["x"];
//Check numeric fields like old code
//Loop on all rows until you reach the row that will be updated
$count=0;//index of each row
foreach($data as $row){
if($row->Fulfill==$x){
unset($data->Row[]$count);
breake;
}
else
{$count++;}
}
//save the file
$data->asXML("data.xml");
echo"<script>alert('record deleted')</script>";
}//end if isset
?>
</body>
</html>