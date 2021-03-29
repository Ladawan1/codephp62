<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'codephp62';

$myconn = new mysqli($host, $user, $password, $database);
if ($myconn->connect_errno) {
    printf("Connect failed: %s\n", $myconn->connect_error);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frmUsername = $frmPassword = "";
    $frmUsername = $_POST["username"];
    $frmPassword = $_POST["password"];

    if ($frmUsername && $frmPassword) {
        $strSQL = "INSERT INTO user (username, password_hash, status)";
        $strSQL .= "VALUES ('" . $frmUsername . "','" . $frmPassword . "',0)";

        $result = $myconn->query($strSQL);
        if ($result) {
            echo "Add User Complete";
        } else {
            echo "Add User Denied";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="insert.php" method="post">
    <table border="7">
     <tr>
        <td>username</td>
        <td><input type="text" name="username" id="username"></td>
    </tr>
    <tr>    
        <td>password</td>
        <td><input type="password" name="password" id="password"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="save"></td>
    </tr>
    </table>
    </form>
</body>
</html>