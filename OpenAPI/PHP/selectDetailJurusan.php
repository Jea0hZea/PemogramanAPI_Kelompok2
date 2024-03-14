<?php
include_once "koneksi.php";

if (!empty($_GET['key'])) {
    $keyParm = htmlspecialchars(strip_tags($_GET['key']));
    $result = selectDetailJurusan($keyParm);
    $countdData = mysqli_num_rows($result);

    if ($countdData > 0) {
        $data_arr = array();
        $data_arr['status'] = 1;
        $data_arr['records'] = array();

        $row = mysqli_fetch_array($result);
        $data_item = array(
            'id_jurusan' => $row['id_jurusan'],
            'nama_jurusan' => $row['nama_jurusan']
        );
        array_push($data_arr, $data_item);
        echo json_encode($data_arr);
    } else {
        echo json_encode(
            array(
                'status' => 0,
                'message' => 'Data tidak ditemukan'
            )
        );
    }
}else {
    echo json_encode(
        array(
    'status' => 0,
    'message' => 'format Data tidak ditemukan'
        )
    );
}

