<?php
    $id=$_GET['id'];
    $query = mysqli_query($koneksi,"DELETE FROM peminjaman where id_peminjaman=$id");
?>
<script>
    alert("Hapus Data Berhasil");
    location.href = "index.php?page=peminjaman";
</script>