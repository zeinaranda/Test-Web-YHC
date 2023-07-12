<?php
@include 'config.php';

$id = $_GET["id"];

// query data berita berdasarkan ID
$kursus = query("SELECT * FROM kursus WHERE idkursus = $id")[0];
if (isset($_POST["submit"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (updatekursus($_POST) > 0) {
        echo "
				<script>
					alert('data berhasil diubah!');
					document.location.href = 'index.php';
				</script>
		";
    } else {
        echo "
		<script>
					alert('data gagal diubah!');
					document.location.href = 'index.php';
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
                <li class="active">
                    <a href="index.php">Kelola Data Kursus</a>
                </li>
                <li>
                    <a href="daftar_materi.php">Daftar Materi</a>
                </li>
            </ul>
        </div>
         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-lg-12 p-3">
                        <h3>Update Kursus</h3>
                        <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="" class="form-label">Judul</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="judul" value="<?php echo $kursus["judul"]; ?>">
                            </div>                  
                            <div class="mb-3">
                                <label for="" class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control" name="deskripsi"><?php echo $kursus["deskripsi"]; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Durasi</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="durasi" value="<?php echo $kursus["durasi"]; ?>">
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