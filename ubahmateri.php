<?php
@include 'config.php';

$id = $_GET["id"];
$kursus=array_reverse(query("SELECT * FROM kursus"));

// query data berita berdasarkan ID
$materi = query("SELECT * FROM materi WHERE idmateri = $id")[0];
if (isset($_POST["submit"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (updatemateri($_POST) > 0) {
        echo "
				<script>
					alert('data berhasil diubah!');
					document.location.href = 'daftar_materi.php';
				</script>
		";
    } else {
        echo "
		<script>
					alert('data gagal diubah!');
					document.location.href = 'daftar_materi.php';
				</script>
		";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style3.css">
    <title>Halaman Admin - Update Kursus</title>
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                        ADMIN
                    </a>
                </li>
                <li class="d-flex justify-content-center">
                    <img class="w-75 h-75 py-2" src="images/logo.PNG" alt="">
                </li>
                <li >
                    <a href="index.php">Kelola Data Kursus</a>
                </li>
                <li class="active">
                    <a href="daftar_materi.php">Kelola Data Materi</a>
                </li>
            </ul>
        </div>

         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-lg-12 p-3">
                        <h3>Update Materi</h3>
                        <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="" class="form-label">Judul</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="judul" value="<?php echo $materi["judul"]; ?>">
                            </div>   
                            <div class="mb-3">
                                <label for="" class="form-label">Kursus</label>
                                <Select class="form-select" name="idkursus">
                                    <option value="">Pilih Kursus</option>
                                    <?php $i = 1; ?>
                                    <?php
                                    foreach ($kursus as $row) :
                                        if ($materi["idkursus"] == $row["idkursus"]) {
                                    ?>
                                            <option selected value="<?php echo $row["idkursus"]; ?>"><?php echo $row["judul"]; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?php echo $row["idkursus"]; ?>"><?php echo $row["judul"]; ?></option>
                                            <?php $i++; ?>
                                    <?php
                                        }
                                    endforeach; ?>
                                </Select>
                            </div>        
                            <div class="mb-3">
                                <label for="" class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control" name="deskripsi"><?php echo $materi["deskripsi"]; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Link</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="link" value="<?php echo $materi["link"]; ?>">
                            </div>                      
                            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                            <a href="index.php" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>