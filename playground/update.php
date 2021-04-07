<?php
include "tamplate\header.html";
require_once 'connectdb.php';
$id = " ";
$username = " ";
$status = " ";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = "";
    if(isset($_GET["id"]) && $_GET["id"] != '') {
        $id = $_GET["id"];
        $strSQL = "DELETE FROM `user` WHERE id=".$id;
        $result = $myconn->query($strSQL);
        if ($result) {
            echo "ลบข้อมูลสำเร็จ";
        } else {
            echo "ไม่สามารถลบข้อมูลได้";
        }
    }
    // // else{
    //     echo "id is null";
    // }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frmUsername = $frmPassword = "";
    $frmUsername = $_POST["username"];
    $frmPassword = $_POST["password"];

    if ($frmUsername && $frmPassword) {
        $strSQL = "UPDATE `user` SET `id`=[value-1],`username`=[value-2],`password_hash`=[value-3],`status`=[value-4] WHERE id=".$id;
        
        $result = $myconn->query($strSQL);
        if ($result) {
            echo "เพิ่มข้อมูลสำเร็จ";
        } else {
            echo "ไม่สามารถเพิ่มข้อมูลได้";
        }
    }
}
?>

<body>
<form action="update.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">User name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="<?=$username ?>">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="status" value="<?=$status?>">
  </div>
  
  <button type="submit" class="btn btn-primary">save</button>
</form>
    <?php
        include "tamplate\Footer.html";
        ?>
</body>
</html>