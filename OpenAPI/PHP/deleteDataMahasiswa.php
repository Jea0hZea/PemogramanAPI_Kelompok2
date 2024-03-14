<?php
include_once "koneksi.php";

if(!empty($_GET["key"])){
    $keyParm = htmlspecialchars(strip_tags($_GET["key"]));
    
    if(deleteDataMahasiswa("$keyParm")){
        echo json_encode(
            array(
                "status"=>1,
                "massage => data dihapus"
            )
        );
    }else{
        echo json_encode(
            array(
                "status"=>0,
                "massage => data gagal dihapus"
            )
        );
    }
}else{
    echo json_encode(
        array(
            "status"=>0,
            "massage => data tidak ditemukan"
        )
    );
};