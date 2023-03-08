<?php
require 'koneksi.php';
require 'ControllerUser.php';
// Created
if (isset($_POST['simpan'])){
    $namafile = $_POST['namafile'];
    $keterangan = $_POST['keterangan'];
    // $eksetensi_diperbolehkan = array('docx');
    // $namafile = $_FILES['namafile']['name'];
    // $x = explode('.', $namafile);
    // $eksetensi = strtolower(end($x));
    // $ukuran = $_FILES['namafile']['size'];
    // $file_temp = $_FILES['namafile']['tmp_name'];
    // $generatename = uniqid(); 
    // $namafile = $generatename;
    // $namafile = $generatename.".".$eksetensi;

    // if (in_array($eksetensi, $eksetensi_diperbolehkan) === true){
    //    if($ukuran < 2000000){
    //     move_uploaded_file($file_temp, 'file/'. $namafile);
    //     $insert = mysqli_query($koneksi, "INSERT INTO tdokumen (idbuku_tamu,id, 
    //     namafile,keteragan) VALUES ('$idbukutamu','$id','$namafile','$keteragan') ");
    //    }else{
    //         $_SESSION["eror"] = 'Data Gagal Disimpan Ekstensi File Tidak Boleh Lebih Dari 2Gb';
    //    }
    // }else {
    //     $_SESSION["eror"] = 'Data Gagal Disimpan Ekstensi File Tidak Diperbolehkan (DOCX)' ;
    // }

    $insert = mysqli_query($koneksi, "INSERT INTO tdokumen (namafile,keterangan) 
    VALUES ('$namafile','$keterangan') ");
        if($insert){
            echo "<script type='text/javascript'>
             document.location='../dokumen.php'</script>";
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
    $id = $_POST['id'];
    $idbuku_tamu = $_POST['idbuku_tamu'];
    $namafile = $_POST['namafile'];
    $keterangan = $_POST['keterangan'];
    $status_user = $_POST['status_user'];
    $waktu = date('Y-m-d  H:i:s');
    $update = mysqli_query($koneksi, "UPDATE tdokumen SET namafile='$namafile',
    keterangan='$keterangan',status_user='$status_user', update_at='$waktu' WHERE id='$id'");
}

//Delete Temporary
if (isset($_POST['hapus'])){
    $id = $_POST['id'];
    $status = '0';
    $delete = mysqli_query($koneksi, "UPDATE tdokumen SET status='$status' WHERE id='$id'");
}

//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $id = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM tdokumen WHERE
    id='$id'");
}

?>