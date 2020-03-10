<html>
<head>
<meta http-equiv='refresh' content='5'>
</head>
<body>
<?php
$data=simplexml_load_file("data.xml");
echo "<table border='1'>";
echo "<th>Hurdles</th><th>Fulfill</th><th>Platoon</th>";
foreach($data as $row)
{
echo "<tr>";
echo "<td>".$row->Hurdles."</td>";
echo "<td>".$row->Fulfill."</td>";
echo "<td>".$row->Platoon."</td>";
echo "</tr>";
}
echo "</table>";
?>
</body>
</html>