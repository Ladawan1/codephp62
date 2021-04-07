<?php
include "tamplate\header.html";
require_once 'connectdb.php';

    $strSQL = "SELECT  id, username, status FROM user";
    $result = $myconn->query($strSQL);
     
   
    ?>
 
    <body>

       <table class="table table-striped table-dark">
       <thead>
          <tr>
              <th> รหัสผู้ใช้</th>
              <th> ชื่อผู้ใช้</th>
              <th> สถานะ</th>
              <th> แก้ไข</th>
              <th> ลบ</th>
          </tr>
       </thead>
       <tbody>
    <?php
     while ($row = $result->fetch_array()) {
        // echo $row["username"] . "<br>";
        ?>

         <tr>
             <td> <?php echo $row["id"]?></td>
             <td> <?php echo $row["username"] ?></td>
             <td> <?php echo $row["status"]?></td>
             <td><a href="update.php?id=<?php echo $row["id"]; ?>&username=<?php echo $row["username"]; ?>&status=<?php echo $row["status"]; ?>"><i class="fas fa-pen"></i></a></td>
             <td><a href="delete.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-trash"></i></a></td>
         </tr>
         <?php
    }
    ?>
        </tbody>
        </table>
        <a href="insert.php">เพิ่มผู้ใช้</a>
    <?php
        include "tamplate\Footer.html";
        ?>
    </body>

    </html>