<?php
    $pdo = new PDO("mysql:host=localhost;dbname=veraruk;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html lang="en">
<script>
      function loadData() {
    // Make an AJAX request to fetch the data
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "admin_viewdatapatient-appoint.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the data container with the fetched data
            document.getElementById("dataContainer").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="admin_viewdatapatient.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<body>
<header>
   <?php include('homepage_admin.php');?> 
</header>
<div class="container">
    <div class="sidebar">
        <?php include('admin_datapatient_id.php');?> 
          <div class="sidebar-1">
            รหัสผู้ป่วย  : <?=$row["patient_id"]?><br>
            ชื่อ-สกุล : <?=$row ["name_patient"]?>
          </div>
        <div class="side-nav">
          <a href="#" class="sidebar-item" >ข้อมูลทั่วไป</a>
          <a href="#" class="sidebar-item" onclick="loadData()">ประวัติการรักษา</a> 
          <a href="#" class="sidebar-item">คอร์สการรักษา</a>
        </div>
  </div>
    <div class="content">
        <div class="patientdata_general" id="patientdata_general">
                  <label>รหัสผู้ป่วย: <?=$row["patient_id"]?> </label><br>
                  <label>ชื่อ-สกุล : <?=$row ["name_patient"]?>
                  เลขบัตรประชาชน : <?=$row ["id_card"]?></label><br>
                  <label>วัน เดือน ปี เกิด : <?=$row ["date_of_birth"]?>
                  อายุ : <?=$row ["age"]?>  ปี</label>
                  เพศ : <?=$row ["gender"]?></label><br>
                  <label>อาชีพ : <?=$row ["career"]?></label>
                  <label>สถานภาพ : <?=$row ["status"]?></label>
                  <label>เชื้อชาติ : <?=$row ["ethnicity"]?></label>
                  <label>สัญชาติ : <?=$row ["nationality"]?></label>
                  <label>ศาสนา : <?=$row ["religion"]?></label><br>
                  <label>ที่อยู่ : <?=$row ["address"]?></label>
                  <label>จังหวัด : <?=$row ["province"]?></label>
                  <label>อำเภอ : <?=$row ["district"]?></label>
                  <label>ตำบล : <?=$row ["sub_district"]?></label>
                  <label>รหัสไปรษณีย์ : <?=$row ["zip_code"]?></label>
                  <label>เบอร์โทรศัพท์ : <?=$row ["tel"]?><br></label>
                  <label>โรคประจำตัว :<?=$row ["congenital_disease"]?></label><br>
                  <label>ประวติแพ้ยา : <?=$row ["allergy"]?></label><br>
                  <label>ประวัติการผ่าตัด : <?=$row ["surgery_history"]?></label><br>
                  <label>ประวัติการประสบอุบัติเหตุ : <?=$row ["accident_history"]?></label><br>
                  <input type="submit" id="edit" value="แก้ไข">
            </div>
            <div id="dataContainer"></div>
            
    </div>
    </div>

  </div>
</body>    
</html>