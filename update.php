<?php

// Mulai session
session_start();

// Load konfigurasi database
require_once __DIR__.'/database.php';

// Variabel superglobal diubah menjadi variabel local
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

// Query update tabel barang
$query = "UPDATE barang SET nama_barang = :nama,
                            harga = :harga,
                            stok = :stok
          WHERE kd_barang = :kode";
$stmt = $con->prepare($query);

// Binding parameter
$stmt->bindParam(":kode", $kode, PDO::PARAM_STR);
$stmt->bindParam(":nama", $nama, PDO::PARAM_STR);
$stmt->bindParam(":harga", $harga, PDO::PARAM_INT);
$stmt->bindParam(":stok", $stok, PDO::PARAM_INT);

// Eksekusi query
try {
  $stmt->execute();
}

// Jika gagal melakukan query
catch (PDOException $e) {
  die("Gagal melakukan query. ".$e->getMessage());
}

// Kosongkan $stmt dan $con
$stmt = null;
$con = null;

// Variabel pesan setelah update
$_SESSION['msg'] = "Barang berhasil diubah";

// Redirect ke index.php
header('location: index.php');
