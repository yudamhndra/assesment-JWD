<?php 
include 'includes/header.php'; 
// include '../backend/config.php';    
?>

<h2>Daftar Beasiswa</h2>
<form action="../backend/registrationProcess.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="nomor_hp">Nomor HP:</label>
        <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" required pattern="\d*">
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
    const ipk =  Math.random() < 0.5 ? 3.4 : 2.9;
    document.getElementById("ipk").value = ipk;

    function enableFieldsBasedOnIPK() {
        const jenisBeasiswaField = document.getElementById("jenis_beasiswa");
        const berkasField = document.getElementById("berkas");
        const submitButton = document.getElementById("submit_button");

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

    enableFieldsBasedOnIPK();

    // Validasi form
    function validateForm() {
        const email = document.getElementById("email").value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!emailPattern.test(email)) {
            alert("Format email tidak valid.");
            return false;
        }
        return true;
    }
</script>

<?php include 'includes/footer.php'; ?>
