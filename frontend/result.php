<?php
include 'includes/header.php';
include '../backend/config.php';

$result = $connection->query("SELECT * FROM pendaftaran");
?>

<h2>Hasil Pendaftaran Beasiswa</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor HP</th>
            <th>Semester</th>
            <th>IPK</th>
            <th>Jenis Beasiswa</th>
            <th>Berkas</th>
            <th>Status Ajuan</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['nomor_hp']); ?></td>
            <td><?php echo htmlspecialchars($row['semester']); ?></td>
            <td><?php echo htmlspecialchars($row['ipk']); ?></td>
            <td><?php echo htmlspecialchars($row['jenis_beasiswa']); ?></td>
            <td>
                <a href="<?php echo '/assesment-JWD/backend/', htmlspecialchars($row['berkas']); ?>" download="<?php echo basename($row['berkas']); ?>">
                    Download Berkas
                </a>
            </td>
            <td><?php echo htmlspecialchars($row['status_ajuan']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'includes/footer.php'; ?>
