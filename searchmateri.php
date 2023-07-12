<?php
    if (isset($_POST['search'])) {
        require_once 'config.php';
        $i = 1;
        $search = $_POST['search'];

        $query = mysqli_query($conn, "SELECT * FROM materi WHERE judul LIKE '%" . $search . "%'");
        while ($row = mysqli_fetch_object($query)) {
?>
         <tr>
         <td><?= $i++; ?></td>
            <td><?= $row->judul; ?></td>
            <td><div class="overflow-auto" style="max-height: 100px; max-width: 300px; text-align :justify"><?= $row->deskripsi; ?></div></td>
            <td><div class="overflow-auto" style="max-height: 100px; max-width: 300px; text-align :justify"><?= $row->link; ?></div></td>

            <td>
                 <a href="ubahmateri.php?id=<?php echo $row->idmateri; ?>" class="btn btn-primary btn-sm">Ubah</a>
                 <a href="hapusmateri.php?id=<?php echo $row->idmateri; ?> " onclick="return confirm('Yakin Ingin Menghapus Data?');" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
<?php }
} ?>