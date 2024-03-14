<?php
function koneksiDB(){
    $host ="localhost";
    $user ="root";
    $pass ="";
    $db ="api1";

    $conn = mysqli_connect($host,$user,$pass, $db);
    if(!$conn){
        die("Gagal koneksi ke database" . mysqli_connect_error());
    }else{
        return $conn;
    }   
}
function selectDataJurusanAll(){
    $query = "SELECT * FROM tb_jurusan";
    $result = mysqli_query(koneksiDB(), $query);
    return $result;
}

function selectDetailJurusan($key)
{
    $query = "SELECT * FROM tb_jurusan WHERE id_jurusan = '$key'";
    $result = mysqli_query(koneksiDB(), $query);
    return $result;
}

function selectDataMahasiswaAll(){
    $query = "SELECT mhs.*, jur.nama_jurusan
    FROM tb_mahasiswa mhs INNER JOIN tb_jurusan jur 
    ON mhs.id_jurusan = jur.id_jurusan";

    $result = mysqli_query(koneksiDB(), $query);
    return $result;
}
function insertDataMahasiswa($data){
    $query = "INSERT INTO tb_mahasiswa VALUES (
    '" . $data['nim'] . "',
    '" . $data['nama_mahasiswa'] . "',
    '" . $data['alamat'] . "',
    '" . $data['no_hp'] . "',
    '" . $data['kelas'] . "',
    '" . $data['id_jurusan'] . "'
    )";

    $result = mysqli_query(koneksiDB(), $query);
    if (!$result){
        return 0;
    } else {
        return 1;
    }
}
function updateDataMahasiswa($data){
    $query = "UPDATE tb_mahasiswa SET 
    nama_mahasiswa= '". $data['nama_mahasiswa']. "',
    alamat = '". $data['alamat']. "',
    no_hp = '". $data['no_hp']. "',
    kelas = '". $data['kelas']. "',
    id_jurusan = '". $data['id_jurusan']. "'
    WHERE nim = '". $data['nim']. "'
    ";

    $result = mysqli_query(koneksiDB(), $query);
    if (!$result) {
        return 0;
    } else {
        return 1;
    }
}
function deleteDataMahasiswa($key){
    $query = "DELETE FROM tb_mahasiswa WHERE nim = '$key'";
    $result = mysqli_query(koneksiDB(), $query);
    if (!$result) {
        return 0;
    } else {
        return 1;
    }
}

