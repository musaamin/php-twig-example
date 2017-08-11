<?php

// akun login server dan nama database yang digunakan
$hostname = "localhost";
$username = "apps";
$password = "apps";
$database = "toko";

// login ke server
try {
    $con = new PDO("mysql:host={$hostname};dbname={$database}", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

// tampilkan pesan jika gagal terhubung ke database
catch(PDOException $e){
    die("Gagal terhubung ke database: " . $e->getMessage());
}
