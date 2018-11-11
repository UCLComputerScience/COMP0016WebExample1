<?php
$dbname = 'message';
$dbhost = '';
$dbusername = '';
$dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    
    $dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// This is for debugging only, to confirm whether the database connection is successfull.
echo "<p>Success: A working connection to MySQL was made!</p>";
echo "<p>The database is: $dbname</p>";
echo "<p>The host is: = $dbhost</p>";
echo "<p>Host information: " . mysqli_get_host_info($connection) . "</p>";
echo "<p>The database username is: $dbusername</p>";

?>
