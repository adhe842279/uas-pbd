<?php
include '../conn.php';

// Ambil semua data dari tabel latihan2
$sql = "SELECT * FROM latihan2";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Tersimpan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="card shadow">
            <div class="card-header text-center fw-bold">
                Data yang Telah Disimpan
            </div>
            <div class="card-body">
                <?php if ($result->num_rows > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Komentar</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['id']) ?></td>
                                        <td><?= htmlspecialchars($row['name']) ?></td>
                                        <td><?= htmlspecialchars($row['email']) ?></td>
                                        <td><?= htmlspecialchars($row['website']) ?></td>
                                        <td><?= htmlspecialchars($row['comment']) ?></td>
                                        <td><?= htmlspecialchars($row['gender']) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">Belum ada data.</div>
                <?php endif; ?>

                <a href="index.php" class="btn btn-primary mt-3">← Back to Form</a>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$koneksi->close();
?>