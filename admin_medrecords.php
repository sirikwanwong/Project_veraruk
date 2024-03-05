<?php
    $pdo = new PDO("mysql:host=localhost;dbname=veraruk;charset=utf8", "root", "");
    $stmt = $pdo->prepare("SELECT * FROM medical_records "); 
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="admin_medrecords.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
  <script>
        function generateNumberKey() {
            var randomNumber = Math.floor(Math.random() * 10000).toString().padStart(6, '0');
            return "HN-" + randomNumber+"-2024";
        }
        function generateAndSendNumberKey() {
            var numberkey = generateNumberKey();
            document.getElementById("patient_id").value = numberkey;
        }
    
        function showform(){
                generateAndSendNumberKey();
                document.getElementById('button-add')
                document.querySelector('.bg-modal').style.display='flex';
            };
        function close_modal(){
            document.getElementById('close')
            document.querySelector('.bg-modal').style.display='none';
        };
        function addvalue(){
                document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("form_data").addEventListener("submit", function(event) {
                event.preventDefault();
                // ถ้ารหัสผ่านตรงกัน ให้ทำการส่งข้อมูลไปยังไฟล์ PHP ตรวจสอบและบันทึกข้อมูล
                var formData = new FormData(this); // สร้าง FormData object จากแบบฟอร์ม
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "admin_insertaddpatient.php", true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                        document.querySelector('.bg-modal').style.display='none';    
                        } else {
                            
                        }
                    }
                };
                xhr.send(formData); // ส่งข้อมูล FormData ไปยังไฟล์ PHP
            });
        });
    }

  </script>
<body>
<div class="bg-modal">
    <div class="modal-content">
        <div class="close" onclick="close_modal()"> + </div>
        <form id="form_data"action="admin_insertaddpatient.php" method="post" >
            <label> รหัสผู้ป่วย: <input type="text"  id="patient_id"name="patient_id" ></label><br>
            <label>ชื่อ-สกุล :<input type="text" name="name_patient"></label>   
            <label>เลขบัตรประชาชน : <input  type="text" name="id_card"></label><br>
            <label>วัน เดือน ปี เกิด : <input type="date" name="date_of_birth"></label>
            <label>อายุ : <input type="number" name="age"> ปี</label>
            <label>เพศ : <select id="typegender" name="gender">
                <option value="หญิง">หญิง</option>
                <option value="ชาย">ชาย</option></select></label><br>
                <label>อาชีพ : <input  type="text" name="career">
            <label>สถานภาพ : <input type="checkbox" value="โสด" name="status"> โสด
                <input type="checkbox" value="สมรส" name="status">สมรส
                <input type="checkbox" value="หย่าร้าง" name="status"> หย่าร้าง</label><br>
            <label>เชื้อชาติ : <input type="text" name="ethnicity"></label>
            <label>สัญชาติ : <input type="text" name="nationality"></label>
            <label>ศาสนา : <input type="text" name="religion"></label><br>
            <label>ที่อยู่ : <input type="text" name="address"></label>
            <label>จังหวัด : <input type="text" name="province"></label>
            <label>อำเภอ : <input type="text" name="district"></label><br>
            <label>ตำบล : <input type="text" name="sub_district"></label>
            <label>รหัสไปรษณีย์ : <input type="text" name="zip_code"></label><br>
            <label>เบอร์โทรศัพท์ : <input type="text" pattern="[0-9]{10}" name="tel"></label><br>
            <label>โรคประจำตัว : <input type="text" name="congenital_disease"></label><br>
            <label>ประวัติแพ้ยา : <input type="text" name="allergy"></label><br>
            <label>ประวัติการผ่าตัด : <input type="text" name="surgery_history"></label><br>
            <label>ประวัติการประสบอุบัติเหตุ : <input type="text" name="accident_history"></label><br>
            <input id="submit" type="submit" value="เพิ่มประวัติผู้ป่วย"onclick="addvalue()">
            
        </form>
    </div>

</div>
  <header>
   <?php include('homepage_admin.php');?>
  </header>
  <div class="container">
        <input type="text" id="search-box" placeholder="ค้นหา"></input><br>
        <a href="#" id="button-add" class="button-add" onclick="showform()" > เพิ่มประวัติผู้ป่วยใหม่ + </a>
    <table>
        <tr>
            <th>รหัสผู้ป่วย</th>
            <th>ชื่อผู้ป่วย</th>
            <th>   </th>
            <th>   </th>
        </tr>
        <?php while($row=$stmt->fetch()): ?>
            <tr>
                <td><?=$row ["patient_id"] ?></td>
                <td><?=$row ["name_patient"] ?></td>
                <td><a class="button-view" href="admin_viewdatapatient.php?patient_id=<?=$row ["patient_id"] ?>">view</a></td>
                <td><button class="button-booking">เพิ่มลงในการนัดหมาย</button></td><br>     
            </tr>
        <?php endwhile; ?>
        </table>
</div>

</body>    
<footer>

        
</footer>
</html>