<?php
include_once "koneksi.php";

$data =file_get_contents("php://input", true);
parse_str($data, $dtArr);

$dataArr = array(
    'nim' => $dtArr['nim'],
    'nama_mahasiswa' => $dtArr['nama_mahasiswa'],
    'alamat' => $dtArr['alamat'],
    'no_hp' => $dtArr['no_hp'],
    'kelas' => $dtArr['kelas'],
    'id_jurusan' => $dtArr['id_jurusan'],
);

if (updateDataMahasiswa($dataArr)) {
    echo json_encode(
        array(
            "status" => 1,
            "message" => "Data Berhasil DIsimpan"
        )
    );
} else {
    echo json_encode(
        array(
            "status" => 0,
            "message" => "Data Gagal Disimpan"
        )
    );
}