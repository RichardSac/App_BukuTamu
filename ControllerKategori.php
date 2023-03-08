<?php
require 'koneksi.php';
require 'ControllerUser.php';
// Created
if (isset($_POST['simpan'])){
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $insert = mysqli_query($koneksi, "INSERT INTO tkategori (kategori,deskripsi) 
    VALUES ('$kategori','$deskripsi') ");
        if($insert){
            echo "<script type='text/javascript'>
             document.location='../kategori.php'</script>";
            //header('location : kategori.php');
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
    $idkategori = $_POST['id'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $waktu = date('Y-m-d  H:i:s');
    $status =  $_POST['status'];
    $update = mysqli_query($koneksi, "UPDATE tkategori SET 
    kategori='$kategori',deskripsi='$deskripsi', update_at='$waktu',status_user='$status' WHERE idkategori='$idkategori'");
            if($update){
                $_SESSION["ubah"] = 'Data Berhasil DiUpdate';
               }else{
                  // header('Location: kategori_buku.php');    
               }
}


//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $idkategori = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM tkategori WHERE
    idkategori='$idkategori'");
    if($delete){
        $_SESSION["hapus"] = 'Data Berhasil DiHapus';
       }else{
           //header('Location: kategori_buku.php');   
  }
}

?>