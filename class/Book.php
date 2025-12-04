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

    public function setById($id) {
        $sql = "SELECT * FROM buku WHERE id = :id";
        $stmt = $this->db->query($sql, ['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->id = $row['id'];
            $this->judul = $row['judul'];
            $this->penulis = $row['penulis'];
            $this->tahun_terbit = $row['tahun_terbit'];
            $this->kategori = $row['kategori'];
            $this->cover_path = $row['cover_path'];
            return true;
        }
        return false;
    }


    
    public function create() {
        $sql = "INSERT INTO buku (judul, penulis, tahun_terbit, kategori, cover_path) 
                VALUES (:judul, :penulis, :tahun, :kategori, :cover)";
        $params = [
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'tahun' => $this->tahun_terbit,
            'kategori' => $this->kategori,
            'cover' => $this->cover_path
        ];
        return $this->db->query($sql, $params);
    }

    public function update() {
        $sql = "UPDATE buku SET 
                judul = :judul, 
                penulis = :penulis, 
                tahun_terbit = :tahun, 
                kategori = :kategori";
        $params = [
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'tahun' => $this->tahun_terbit,
            'kategori' => $this->kategori,
            'id' => $this->id
        ];

        // Jika ada cover baru, update field cover_path
        if (!empty($this->cover_path)) {
            $sql .= ", cover_path = :cover";
            $params['cover'] = $this->cover_path;
        }

        $sql .= " WHERE id = :id";
        return $this->db->query($sql, $params);
    }
    public function delete($id) {
        $this->setById($id);
        
        // Hapus file fisik jika ada
        if ($this->cover_path && file_exists($this->cover_path)) {
            unlink($this->cover_path);
        }

        $sql = "DELETE FROM buku WHERE id = :id";
        return $this->db->query($sql, ['id' => $id]);
    }
}
