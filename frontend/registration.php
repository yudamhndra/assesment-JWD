<?php 
include 'includes/Header.php';
include '../backend/config.php';    
?>

<h2>Daftar Beasiswa</h2>
<form action="../backend/RegistrationProcess.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <small id="emailWarning" style="color: red; display: none;">Format email tidak valid!</small>
    </div>
    <div class="form-group">
        <label for="nomor_hp">Nomor HP:</label>
        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
        <small id="phoneWarning" style="color: red; display: none;">Nomor HP harus terdiri dari 10-13 digit angka!</small>
    </div>
    <div class="form-group">
        <label for="semester">Semester:</label>
        <select class="form-control" id="semester" name="semester" required>
            <?php for ($i = 1; $i <= 8; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="ipk">IPK Terakhir:</label>
        <input type="text" class="form-control" id="ipk" name="ipk" readonly>
    </div>
    <div class="form-group">
        <label for="jenis_beasiswa">Jenis Beasiswa:</label>
        <select class="form-control" id="jenis_beasiswa" name="jenis_beasiswa" required disabled>
            <option value="akademik">Beasiswa Akademik</option>
            <option value="non_akademik">Beasiswa Non-Akademik</option>
        </select>
    </div>
    <div class="form-group">
        <label for="berkas">Upload Berkas Syarat:</label>
        <input type="file" class="form-control-file" id="berkas" name="berkas" required disabled>
    </div>
    <button type="submit" class="btn btn-primary" id="submit_button" disabled>Daftar</button>
</form>

<script>
    // Set nilai IPK dengan peluang 50/50
    const ipk = Math.random() < 0.5 ? 3.4 : 2.9;
    document.getElementById("ipk").value = ipk; // Set nilai IPK di field IPK

    // Fungsi untuk mengaktifkan atau menonaktifkan elemen berdasarkan nilai IPK
    function enableFieldsBasedOnIPK() {
        const jenisBeasiswaField = document.getElementById("jenis_beasiswa");
        const berkasField = document.getElementById("berkas");
        const submitButton = document.getElementById("submit_button");

        // Aktifkan atau nonaktifkan elemen berdasarkan nilai IPK
        if (ipk >= 3.0) {
            jenisBeasiswaField.disabled = false;
            berkasField.disabled = false;
            submitButton.disabled = false;
            jenisBeasiswaField.focus();
        } else {
            jenisBeasiswaField.disabled = true;
            berkasField.disabled = true;
            submitButton.disabled = true;
            setTimeout(() => {
                alert("Maaf, IPK Anda di bawah 3. Anda tidak memenuhi syarat untuk mendaftar beasiswa.");
            }, 500);
        }
    }

    // Panggil fungsi saat halaman selesai dimuat
    document.addEventListener("DOMContentLoaded", enableFieldsBasedOnIPK);

    // Fungsi validasi form (email dan nomor telepon)
    function validateForm() {
        // Mendapatkan nilai input email dan nomor telepon
        const email = document.getElementById("email").value;
        const nomor_hp = document.getElementById("nomor_hp").value;

        // Regex untuk validasi email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const emailWarning = document.getElementById("emailWarning");

        // Regex untuk validasi nomor telepon (10-13 digit)
        const phonePattern = /^\d{10,13}$/;
        const phoneWarning = document.getElementById("phoneWarning");

        let isValid = true;

        // Validasi email
        if (!emailPattern.test(email)) {
            emailWarning.style.display = "inline";
            isValid = false;
        } else {
            emailWarning.style.display = "none";
        }

        // Validasi nomor telepon
        if (!phonePattern.test(nomor_hp)) {
            phoneWarning.style.display = "inline";
            isValid = false;
        } else {
            phoneWarning.style.display = "none";
        }

        return isValid; // Menghentikan submit jika ada validasi yang gagal
    }
</script>

<?php include 'includes/Footer.php'; ?>
