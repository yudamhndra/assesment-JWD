<?php 
    include 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nomor_hp = $_POST['nomor_hp'];
        $semester = $_POST['semester'];
        $ipk = 3.4; // Nilai IPK otomatis
        $jenis_beasiswa = $_POST['jenis_beasiswa'];
        $status_ajuan = "Belum Diverifikasi";
    
        // Upload berkas
        $berkas = $_FILES['berkas']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($berkas);
        move_uploaded_file($_FILES['berkas']['tmp_name'], $target_file);
    
        // Simpan data ke db
        $stmt = $connection->prepare("INSERT INTO pendaftaran (nama, email, nomor_hp, semester, ipk, jenis_beasiswa, berkas, status_ajuan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("sssidsis", $nama, $email, $nomor_hp, $semester, $ipk, $jenis_beasiswa, $target_file, $status_ajuan);
        $stmt->execute();
        $stmt->close();

    $connection->close();
    }

    header("Location: ../frontend/result.php");
    exit();
?>