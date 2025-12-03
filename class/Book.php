<?php


class Book {
    public $id;
    public $judul;
    public $penulis;
    public $tahun_terbit;
    public $kategori;
    public $cover_path;
    public $created_at;

    protected $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function getAll() {
        $sql = "SELECT * FROM buku ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
