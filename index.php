<?php

// Mulai session
session_start();

// Load twig.php
require_once __DIR__.'/twig.php';

// Load konfigurasi database
require_once __DIR__.'/database.php';

// Query tabel barang
$query = "SELECT * FROM barang";
$stmt = $con->prepare($query);

// Eksekusi query
try {
  $stmt->execute();
}

// Jika gagal melakukan query
catch (PDOException $e) {
  die("Gagal melakukan query. ".$e->getMessage());
}

// Data hasil query disimpan ke variabel array $data[]
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Kosongkan $stmt dan $con
$stmt = null;
$con = null;

// Variabel pesan setelah update
$msg = "";
if(!empty($_SESSION['msg'])){
  $msg = $_SESSION['msg'];
}
session_unset();
session_destroy();

// Variabel judul halaman
$title = "- Home";

// Render template index.html
// Kirim variabel
echo $twig->render('index.html', ['title' => $title, 'data' => $data, 'msg' => $msg]);
