<?php
class Pengguna_model {
    private $db;
    private $db_table = 'tb_pengguna';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $this->db->query('SELECT * FROM ' . $this->db_table . ' order by id_pengguna desc');
        
        return $this->db->resultSet();
    }

    public function getDataById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->db_table . ' WHERE id_pengguna=:id');
        $this->db->bind('id', $id);
        
        return $this->db->resultSingle();
    }

    public function addData($data)
    {
        $hash_password = hash("sha256", $data['password']);
        
        $query = '  INSERT INTO ' . $this->db_table . ' 
                    VALUES 
                    (null, :username, :password, :nama, :unit, :jabatan)';

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $hash_password);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('unit', $data['unit']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData($data)
    {
        $query = '  UPDATE ' . $this->db_table . ' 
                    SET 
                        nama     = :nama, 
                        unit     = :unit,
                        jabatan  = :jabatan
                    WHERE id_pengguna = :id';

        $this->db->query($query);
        $this->db->bind('id', $data['id_pengguna']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('unit', $data['unit']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteData($id)
    {
        $query = 'DELETE FROM ' . $this->db_table . ' WHERE id_pengguna=:id';
        
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDataBy()
    {
        $keyword = $_POST['keyword'];
        $query = 'SELECT * FROM ' . $this->db_table . ' WHERE nama LIKE :keyword';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}