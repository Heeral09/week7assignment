<?php

echo "<h1>PDO</h1>";
$host = "sql1.njit.edu" ;
$user = "hp336" ;
$database  = "hp336" ;
$pass = "VrajHeeral" ;

try {
    $db = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";

$select = "select*from accounts where id < 6";

($t = $db->query($select));

$number = $t->rowCount();
echo "Number of rows retrieved: $number";

$column = "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'accounts'";
($c = $db->query($column));

echo "<table border = '1'>";

while($col = $c->fetch(PDO::FETCH_ASSOC))
{
echo "<th>" . implode("</th><th>",$col) . "</th>";
}

while($row = $t->fetch(PDO::FETCH_ASSOC))
{
echo "<tr><td>" . implode("</td><td>",$row) . "</td></tr>";
}

echo "</table>";
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$db=null;
?>
