<?php


// Error reporting untuk development
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

// Database config
const DB_HOST = 'localhost';
const DB_USER = 'root';       
const DB_PASS = '';           
const DB_NAME = 'perpustakaan_crud';


const BASE_URL = 'http://localhost:8000/'; 


spl_autoload_register(function ($class_name) {
    include __DIR__ . '/../class/' . $class_name . '.php';
});


const NAV_PAGES = [
    ['title' => 'Daftar Buku', 'url' => 'index.php'],
    ['title' => 'Tambah Buku', 'url' => 'create.php'],
];
