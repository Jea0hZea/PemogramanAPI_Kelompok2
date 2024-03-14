<?php
include_once "koneksi.php";

$result = selectDataMahasiswaAll();
$countdData = mysqli_num_rows($result);

if ($countdData > 0) {
    $data_arr = array();
    $data_arr['status'] = 1;
    $data_arr['records'] = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data_item = array(
            'nim' => $row['nim'],
            'nama_jurusan' => $row['nama_jurusan'],
            'nama_mahasiswa' => $row['nama_mahasiswa'],
            'alamat' => $row['alamat'],
            'no_hp' => $row['no_hp'],
            'kelas' => $row['kelas'],
            'id_jurusan' => $row['id_jurusan']
        );
        array_push($data_arr['records'], $data_item);
    }
    echo json_encode($data_arr);
} else {
    echo json_encode(
        array(
            'status' => 0,
            'message' => 'Data tidak ditemukan'
        )
    );
}
