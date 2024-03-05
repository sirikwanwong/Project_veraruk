<?php
    $pdo = new PDO("mysql:host=localhost;dbname=veraruk;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
        <?php
            $stmt = $pdo->prepare("INSERT INTO medical_records VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $_POST["patient_id"]);
            $stmt->bindParam(2, $_POST["name_patient"]);
            $stmt->bindParam(3, $_POST["id_card"]);
            $stmt->bindParam(4, $_POST["date_of_birth"]);
            $stmt->bindParam(5, $_POST["age"]);
            $stmt->bindParam(6, $_POST["gender"]);
            $stmt->bindParam(7, $_POST["career"]);
            $stmt->bindParam(8, $_POST["status"]);
            $stmt->bindParam(9, $_POST["ethnicity"]);
            $stmt->bindParam(10, $_POST["nationality"]);
            $stmt->bindParam(11, $_POST["religion"]);
            $stmt->bindParam(12, $_POST["address"]);
            $stmt->bindParam(13, $_POST["province"]);
            $stmt->bindParam(14, $_POST["district"]);
            $stmt->bindParam(15, $_POST["sub_district"]);
            $stmt->bindParam(16, $_POST["zip_code"]);
            $stmt->bindParam(17, $_POST["tel"]);
            $stmt->bindParam(18, $_POST["congenital_disease"]);
            $stmt->bindParam(19, $_POST["allergy"]);
            $stmt->bindParam(20, $_POST["surgery_history"]);
            $stmt->bindParam(21, $_POST["accident_history"]);
            $stmt->execute();
            ?>
            