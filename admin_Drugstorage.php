<?php
    $pdo = new PDO("mysql:host=localhost;dbname=veraruk;charset=utf8", "root", "");
    $stmt = $pdo->prepare("SELECT * FROM medicine_stock "); 
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="admin_drungfirstpage.css">
  <script>
            
  </script>
<body>
  <header>
   <?php include('homepage_admin.php');?>
  </header>
  <body>
<!-- <div class="popup">
    <label for="show" class="close-btn" title="close">&times;</label>
    <h1>เพิ่มยาคงคลัง</h1>
    <form action=#>
    <label >รหัสยา :</label><br> <input type="text" id="drugid"><br>
    <label >ชื่อยา :</label><br> <input type="text" id="drugname"><br>
    <label >ประเภทยา:</label>
    <select id="typedrug" name="typedrug">
        <option value="tab">tab</option>
        <option value="capsule">capsule</option>
        <option value="ung.">ยาใช้ภายนอก</option>
    </select><br>
    <label >วันที่ผลิต:</label> <input type="date" id="drug-qual"><br>
    <label>วันที่หมดอายุ:</label><input type="date" id="drug-qual"><br>
    <button>เพิ่มยาคงคลัง</button>
</div> -->
    <div class="container">
        <input type="text" id="search-box" placeholder="ค้นหา"></input><br>
        <a href="#" class="button-add"> เพิ่มยาคงคลัง + </a>
    <table>
        <tr>
            <th>รหัสยา</th>
            <th>ชื่อยา</th>
            <th>ประเภทยา</th>
            <th>จำนวนยา</th>
            <th>วันที่ผลิต</th>
            <th>วันที่หมดอายุ</th>
            <th>แก้ไข/ลบ</th>
        </tr>
<?php while($row=$stmt->fetch()): ?>
    <tr>
        <td><?=$row ["medicine_id"] ?></td>
        <td><?=$row ["medicine_name"] ?></td>
        <td><?=$row ["type"] ?></td>
        <td><?=$row ["quantity"] ?></td>
        <td><?=$row ["MFG"] ?></td>
        <td><?=$row ["EXP"] ?></td>
        <td><button class="button-edit">แก้ไข</button>
        <button class="button-delete">ลบ</button></td><br>     
    </tr>
    <?php endwhile; ?>
</table>
</div>
</body>
</body>    
  
