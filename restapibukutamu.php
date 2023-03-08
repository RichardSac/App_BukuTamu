<?php
require '../controller/koneksi.php';
if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_bukutamu(){
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM tbukutamu");
    while($row=mysqli_fetch_object($query)){
        $data[] = $row;
    };
    $respons = array(
        'status'=>1,
        'message'=>'Success',
        'data'=>$data
    );
    header('Content-Type:application/json');
    echo json_encode($respons);
}

function add_bukutamu(){
    global $koneksi;
    $check = array('id'=>'', 'kategoribukutamu'=>'','tanggal'=>'','waktu'=>'','keperluan'=>'','namakengkap'=>'','status'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "INSERT INTO tbukutamu SET 
        id='$_POST[id]',
        kategoribukutamu='$_POST[kategoribukutamu]',
        tanggal='$_POST[tanggal]',
        waktu='$_POST[waktu]',
        keterangan='$_POST[keterangan]',
        namakengkap='$_POST[namakengkap]',
        status_user='$_POST[status_user]");
        if($result){
            $respons=array(
                'status'=>1,
                'message'=>'Insert Success'
            );
        //header('location: view_kategoribuku.php');
        }else{
            $respons=array(
                'status'=>0,
                'message'=>'Insert Failed'
            );
        }
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Wrong Parameter'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}

function update_bukutamu(){
    global $koneksi;
    if(!empty($_GET["id"])){
        $id = $_GET["id"];
    }
    $query = $koneksi->query("SELECT*FROM tbukutamu");
    $check = array('id'=>'', 'kategoribukutamu'=>'','tanggal'=>'','waktu'=>'','keperluan'=>'','namakengkap'=>'','status'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "UPDATE tbukutamu SET 
         id='$_POST[id]',
        kategori='$_POST[kategori]',
        tanggal='$_POST[tanggal]',
        waktu='$_POST[waktu]',
        keterangan='$_POST[keterangan]',
        namakengkap='$_POST[namakengkap]',
        status_user='$_POST[status_user]');
        WHERE idbuku_tamu=$id");
        if($result){
            $respons=array(
                'status'=>1,
                'message'=>'Update Success',
            );
        }else{
            $respons=array(
                'status'=>0,
                'message'=>'Update Failed'
            );
        }
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Wrong Parameter'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}

function delete_bukutamu(){
    global $koneksi;
    $id = $_GET['id'];
    $query = "DELETE FROM tbukutamu  WHERE idbuku_tamu =".$id;
    if(mysqli_query($koneksi,$query)){
        $respons=array(
            'status'=>1,
            'message'=>'Delete Success'
        );
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Delete Failed'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}

?>