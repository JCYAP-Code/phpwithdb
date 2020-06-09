<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:tp042308db.database.windows.net,1433; Database = tp042308db", "tp042308", "2112155913_YaP");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Done";
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "tp042308", "pwd" => "2112155913_YaP", "Database" => "tp042308db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:tp042308db.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn)
{die("Error connection: ".sqlsrv_errors());}
$tsql= "SELECT * FROM [dbo].[restaurant]";
$getResults= sqlsrv_query($conn, $tsql);
if ($getResults == FALSE){die(sqlsrv_errors());}
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) 
{echo "<tr>";echo "<td>". $row['restaurant_id'] . "</td>";echo "<td>". $row['restaurant_name'] ."</td>";echo "<td>". $row['restaurant_address'] . "</td>";echo "<td>". $row['restaurant_phone'] . "</td>";echo "</tr>";}sqlsrv_free_stmt($getResults);
?>
