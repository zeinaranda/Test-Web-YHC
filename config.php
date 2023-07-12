<?php

$conn = mysqli_connect('localhost','root','','course') or die('connection failed');

function query($sql)
{
    global $conn;
    $result=mysqli_query($conn,$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function insertkursus($data)
{
    global $conn;
    $judul = $data['judul'];
    $deskripsi = $data['deskripsi'];  
    $durasi = $data['durasi'];

   $result= mysqli_query($conn,"INSERT INTO kursus (judul, deskripsi, durasi) VALUES ('$judul','$deskripsi','$durasi')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function insertmateri($data)
{
    global $conn;
    $judul = $data['judul'];
    $deskripsi = $data['deskripsi'];  
    $link = $data['link'];
    $idkursus = $data['idkursus'];

   $result= mysqli_query($conn,"INSERT INTO materi (judul, deskripsi, link, idkursus) VALUES ('$judul','$deskripsi','$link','$idkursus')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function updatekursus($data)
{
	global $conn;
    $id=$_GET["id"];
	$judul = $data['judul'];
    $deskripsi = $data['deskripsi'];
    $durasi = $data['durasi'];

    mysqli_query($conn, "UPDATE kursus SET judul='$judul', deskripsi='$deskripsi', durasi='$durasi' WHERE idkursus=$id");
	
	return mysqli_affected_rows($conn);
}

function updatemateri($data)
{
	global $conn;
    $id=$_GET["id"];
	$judul = $data['judul'];
    $deskripsi = $data['deskripsi'];
    $link = $data['link'];
    $idkursus = $data['idkursus'];

    mysqli_query($conn, "UPDATE materi SET judul='$judul', deskripsi='$deskripsi', link='$link', idkursus='$idkursus' WHERE idmateri=$id");
	
	return mysqli_affected_rows($conn);
}

?>