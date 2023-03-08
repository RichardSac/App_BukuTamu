<?php
require '../controller/koneksi.php';
if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_kategori(){
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM tkategori");
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

function add_kategori(){
    global $koneksi;
    $check = array('kategori'=>'', 'deksripsi'=>'','status_user'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "INSERT INTO tkategori SET 
        kategori='$_POST[kategori]',
        deksripsi='$_POST[deksripsi]',
        status_user='$_POST[status_user]'");
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

function update_kategori(){
    global $koneksi;
    if(!empty($_GET["id"])){
        $id = $_GET["id"];
    }
    $query = $koneksi->query("SELECT*FROM tkategori");
    $check = array('kategori'=>'', 'deksripsi'=>'','status_user'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "UPDATE tkategori SET 
         kategori='$_POST[kategori]',
        deksripsi='$_POST[deksripsi]',
        status_user='$_POST[status_user]'
        WHERE idkategori=$id");
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

function delete_kategori(){
    global $koneksi;
    $id = $_GET['id'];
    $query = "DELETE FROM tkategori WHERE idkategori=".$id;
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