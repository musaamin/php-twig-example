<?php

// Load twig.php
require_once __DIR__.'/twig.php';

// Load konfigurasi database
require_once __DIR__.'/database.php';

// Variabel kode barang
$kode = $_GET['kode'];

// Query tabel barang
$query = "SELECT * FROM barang WHERE kd_barang = :kode ";
$stmt = $con->prepare($query);

// Binding parameter, :kode diisi dengan $kode
$stmt->bindParam(":kode", $kode, PDO::PARAM_STR);

// Eksekusi query
try {
  $stmt->execute();
}

// Jika gagal melakukan query
catch (PDOException $e) {
  die("Gagal melakukan query. ".$e->getMessage());
}

// Data hasil query disimpan ke variabel $data
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Kosongkan $stmt dan $con
$stmt = null;
$con = null;

// Variabel judul halaman
$title = "- Detail";

// Render template index.html
// Kirim variabel
echo $twig->render('detail.html', ['title' => $title, 'data' => $data] );
