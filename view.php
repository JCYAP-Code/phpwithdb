<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:tp042308db.database.windows.net,1433; Database = tp042308db", "tp042308", "2112155913_YaP");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "tp042308", "pwd" => "2112155913_YaP", "Database" => "tp042308db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:tp042308db.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
