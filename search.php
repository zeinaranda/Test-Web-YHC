<?php
    if (isset($_POST['search'])) {
        require_once 'config.php';
        $i = 1;
        $search = $_POST['search'];

        $query = mysqli_query($conn, "SELECT * FROM kursus WHERE judul LIKE '%" . $search . "%'");
        while ($row = mysqli_fetch_object($query)) {
?>
         <tr>
         <td><?= $i++; ?></td>
            <td><?= $row->judul; ?></td>
            <td><?= $row->durasi; ?></td>
            <td><div class="overflow-auto" style="max-height: 100px; max-width: 500px; text-align :justify"><?= $row->deskripsi; ?></div></td>
            <td>
                 <a href="materi_idkursus.php?idkursus=<?php echo $row->idkursus; ?>" class="btn btn-success btn-sm">Lihat Materi</a>
                 <a href="ubahkursus.php?id=<?php echo $row->idkursus; ?>" class="btn btn-primary btn-sm">Ubah</a>
                 <a href="hapuskursus.php?id=<?php echo $row->idkursus; ?> " onclick="return confirm('Yakin Ingin Menghapus Data?');" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
<?php }
} ?>
