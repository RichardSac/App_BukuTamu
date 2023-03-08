<?php
require 'koneksi.php';
require 'ControllerUser.php'; 
// Created
if (isset($_POST['simpan'])){
    $id= $_POST['id'];
    $kategori= $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $keterangan = $_POST['keterangan'];
    $namalengkap = $_POST['namalengkap'];
    $insert = mysqli_query($koneksi, "INSERT INTO tbukutamu (kategori,tanggal,waktu,keterangan,namalengkap) 
    VALUES ('$kategori','$tanggal','$waktu','$keterangan ','$namalengkap') ");
        if($insert){
            echo "<script type='text/javascript'>
             document.location='../bukutamu.php'</script>";
           }else{
               //header('Location: kategori_buku.php');   
           }
}

//Read
function tampildata($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows=[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// Update
if (isset($_POST['ubah'])){
    $idbuku_tamu = $_POST['idbuku_tamu'];
    $id = $_POST['id'];
    $kategori= $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $keterangan = $_POST['keterangan'];
    $namalengkap = $_POST['namalengkap'];
    $waktu = date('Y-m-d  H:i:s');
    $status_user =  $_POST['status_user'];
    $update = mysqli_query($koneksi, "UPDATE tbukutamu SET 
    kategori='$kategori',tanggal='$tanggal',waktu='$waktu',keterangan='$keterangan',namalengkap='$namalengkap', update_at='$waktu',status_user='$status_user' WHERE id='$id'");
            if($update){
                $_SESSION["ubah"] = 'Data Berhasil DiUpdate';
               }else{
                  // header('Location: kategori_buku.php');   
               }
}

//Delete Temporary
if (isset($_POST['hapus'])){
    $idbuku_tamu = $_POST['idbuku_tamu'];
    $status_user = '0';
    $waktu = date('Y-m-d  H:i:s');
    $delete = mysqli_query($koneksi, "DELETE FROM tbukutamu WHERE
    idbuku_tamu='$idbuku_tamu'");
}

//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $idbuku_tamu = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM tbukutamu WHERE
    id='$idbuku_tamu'");
    if($delete){
        $_SESSION["hapus"] = 'Data Berhasil DiHapus';
       }else{
           //header('Location: kategori_buku.php');   
        }
    }

?>