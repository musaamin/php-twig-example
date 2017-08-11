<?php

// Load autoloader
require_once __DIR__.'/vendor/autoload.php';

// Lokasi template
$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');

 // Instansiasi Twig
$twig = new Twig_Environment($loader);
