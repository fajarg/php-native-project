<?php

class daftarBarang extends Model
{
    private $daftar = [];


    public function getDataAll()
    {
        $stmt = "SELECT * FROM daftarBarang";
        $query = $this->db->query($stmt);
        $data = [];

        while ($result = $this->db->fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public function getDataById($id)
    {
        $stmt = "SELECT * FROM daftarBarang where id = $id";
        $query = $this->db->query($stmt);
        $data = [];

        $data = $this->db->fetch_array($query);


        return $data;
    }

    public function tambahBarang($param)
    {
        $nama = $_POST['nama'];
        $jumlah = $_POST['qty'];

        if (!preg_match("/^[a-zA-Z ]*$/", $nama) || !preg_match("/^[0-9]*$/", $jumlah)) {
            return false;
        } else {
            $stmt = "INSERT INTO daftarBarang (nama, qty) values (:nama, :qty)";
            $query = $this->db->query($stmt, $param);

            if ($this->db->last_id() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function updateBarang($param)
    {
        $nama = $_POST['nama'];
        $jumlah = $_POST['qty'];

        if (!preg_match("/^[a-zA-Z ]*$/", $nama) || !preg_match("/^[0-9]*$/", $jumlah)) {
            return false;
        } else {
            $stmt = "update daftarBarang set nama = :nama, qty = :qty where id = :id";
            $query = $this->db->query($stmt, $param);

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function deleteBarang($id)
    {
        $stmt = "delete from daftarBarang where id = $id";
        $query = $this->db->query($stmt);

        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
