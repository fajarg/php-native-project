<?php
session_start();

class Home extends Controller
{
    private $dt;
    private $df;

    public function __construct()
    {
        $this->dt = $this->loadmodel("Barang");
        $this->df = $this->loadmodel("daftarBarang");
    }

    public function index()
    {
        echo "anda memanggil action index \n";
    }

    public function home($data1, $data2)
    {
        echo "anda memanggil action home dengan data 1 = $data1 dan data 2 = $data2\n";
    }

    public function lihatdata($id)
    {
        $data = $this->df->getDataById($id);

        $this->loadview('templates/header', ['title' => 'detail barang']);
        $this->loadview('home/detailbarang', $data);
        $this->loadview('templates/footer');
    }

    public function listbarang()
    {
        $data = $this->df->getDataAll();

        $this->loadview('templates/header', ['title' => 'list barang']);
        $this->loadview('home/listbarang', $data);
        $this->loadview('templates/footer');
    }

    public function insertbarang()
    {
        if (!empty($_POST)) {
            if ($this->df->tambahBarang($_POST)) {
                header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
                exit;
            } else if ($this->df->tambahBarang($_POST) == false) {
                $_SESSION["check"] = false;
                header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
                exit;
            }
        }

        $this->loadview('templates/header', ['title' => 'insert barang']);
        $this->loadview('home/insert');
        $this->loadview('templates/footer');
    }

    public function updatebarang($id)
    {
        $data = $this->df->getDataById($id);

        if (!empty($_POST)) {
            if ($this->df->updateBarang($_POST)) {
                header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
                exit;
            } else if ($this->df->updateBarang($_POST) == false) {
                $_SESSION["check"] = false;
                header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
                exit;
            }
        }

        $this->loadview('templates/header', ['title' => 'update barang']);
        $this->loadview('home/update', $data);
        $this->loadview('templates/footer');
    }

    public function deletebarang($id)
    {
        $data = $this->df->getDataById($id);

        if ($this->df->deleteBarang($id)) {
            header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
            exit;
        }
    }
}
