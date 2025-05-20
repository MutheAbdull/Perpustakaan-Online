<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        h2 {
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        hr {
            border: 1px solid black;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #ddd;
        }
        td:nth-child(2), td:nth-child(3) {
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Laporan Peminjaman Buku</h2>
<hr>

<table>
    <tr>
        <th>No</th>
        <th>User</th>
        <th>Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Status Peminjaman</th>
    </tr>
    <?php
    include "koneksi.php";

    $i = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
        LEFT JOIN user ON user.id_user = peminjaman.id_user 
        LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
    
    while($data = mysqli_fetch_array($query)) {
        $tanggal_peminjaman = date("d-m-Y", strtotime($data['tanggal_peminjaman']));
        $tanggal_pengembalian = $data['tanggal_pengembalian'] ? date("d-m-Y", strtotime($data['tanggal_pengembalian'])) : "-";
    ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo htmlspecialchars($data['nama']); ?></td>
        <td><?php echo htmlspecialchars($data['judul']); ?></td>
        <td><?php echo $tanggal_peminjaman; ?></td>
        <td><?php echo $tanggal_pengembalian; ?></td>
        <td><?php echo htmlspecialchars($data['status_peminjaman']); ?></td>
    </tr>
    <?php } ?>
</table>

<script>
    window.print();
    setTimeout(function() {
        window.close();
    }, 1000);
</script>

</body>
</html>
