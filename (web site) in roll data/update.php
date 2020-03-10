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
$data=simplexml_load_file("data.xml")
//Each primary key value is a choice in the drop-down list
foreach($data as $row){
echo"<option>".$row->Fulfill."</option>";
}
?>
</select><br><br>
Enter your Hurdles:<input name="y"><br><br><!line1>
Enter your Pllatoon:<input name="z"><br><br><!line2>
<input type="submit" name="update">         <!line3>
</form>
<?php
if(isset($_POST["update"]))<!line4>
{
//Read input from the user
$Fulfill=$_POST["x"];
$Hurdles=$_POST["y"];//line5
$Platoon=$_POST["z"];//line6
//Check numeric fields like old code
//Loop on all rows until you reach the row that will be updated
//we will change foreach statment
foreach($data as $row){
if($row->Fulfill==$x)//row is found
{//update the other two field
$row->Hurdles=$y;
$row->Platoon=$z;
breake;
}//end if
}//end for
//save the file
$data->asXML("data.xml");
echo"<script>alert('re up success')</script>";//line7
}//end if isset
?>
</body>
</html>