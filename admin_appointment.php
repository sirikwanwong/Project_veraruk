<?php
    $pdo = new PDO("mysql:host=localhost;dbname=veraruk;charset=utf8", "root", "");
    $stmt = $pdo->prepare("SELECT * FROM appointment_admin_page "); 
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="admin_appointment.css">
  <script>
            
  </script>
<body>
  <header>
   <?php include('homepage_admin.php');?>
  </header>
  <div class="container">
      <div class="sidebar">
          <div class="side-nav">
            <a href="#" class="sidebar-item">การนัดหมาย</a>
            <a href="#" class="sidebar-item">พบแพทย์</a>
            <a href="#" class="sidebar-item">จ่ายยา</a>
          </div>
      </div>
      <div class="content">
          <div class="select_date">
              <h3>ตารางการนัดหมาย</h3>
              <label for="date_appoint">วันเดือนปีที่นัดหมาย :<input type="date" id="date_appoint"></label>
          </div>
              <table>
                    <tr>
                          <th>วันเดือนปีที่นัดหมาย</th>
                          <th>เวลาที่นัดหมาย</th>
                          <th>รหัสผู้ป่วย</th>
                          <th>ชื่อผู้ป่วย</th>
                          <th>      </th>
                    </tr>
                <?php while($row=$stmt->fetch()): ?>
                      <tr>
                          <td><?=$row ["date"] ?></td>
                          <td><?=$row ["time"] ?></td>
                          <td><?=$row ["patient_id"] ?></td>
                          <td><?=$row ["name_patient"] ?></td>
                          <!-- <td><a href="admin_viewdatapatient.php?patient_id=">view</a></td> -->
                          <td><button class="button-booking">เพิ่มลงในการนัดหมาย</button></td><br>     
                      </tr>
                <?php endwhile; ?>
              </table>
          </div>
      </div>
      







</body>
</html>