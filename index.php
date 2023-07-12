<?php
session_start();
@include 'config.php';
 
$kursus=array_reverse(query("SELECT * FROM kursus"));

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
    <title>Halaman Admin</title>
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
                    <a href="daftar_materi.php">Kelola Data Materi</a>
                </li>

            </ul>
        </div>

         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-lg-12 p-3">
                        <h3>Daftar Kursus</h3> 
                        <div>
                            <a href="tambahkursus.php" class="btn btn-primary">Tambah Kursus</a>
                        </div>
                        <hr>
                        <form class="d-flex">
                            <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
                        </form>
                        <hr>
                        <table class="table my-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Durasi</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tampil">
                                <?php $i = 1; ?>
                                <?php foreach ($kursus as $row) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row["judul"]; ?></td>
                                        <td><?php echo $row["durasi"]; ?> Jam</td>
                                        <td> <div class="overflow-auto" style="max-height: 100px; max-width: 500px; text-align :justify"><?php echo $row["deskripsi"]; ?></div></td>
                                        <td>
                                            <a href="materi_idkursus.php?idkursus=<?php echo $row["idkursus"]; ?>" class="btn btn-success btn-sm">Lihat Materi</a>
                                            <a href="ubahkursus.php?id=<?php echo $row["idkursus"]; ?>" class="btn btn-primary btn-sm">Ubah</a>
                                            <a href="hapuskursus.php?id=<?php echo $row["idkursus"]; ?> " onclick="return confirm('Yakin Ingin Menghapus Data?');" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


     <!-- Optional JavaScript; choose one of the two! -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                $.ajax({
                    type: 'POST',
                    url: 'search.php',
                    data: {
                        search: $(this).val()
                    },
                    cache: false,
                    success: function(data) {
                        $('#tampil').html(data);
                    }
                });
            });
        });
    </script>

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