<?php
class Pengguna extends Controller {
    public function index() 
    {
        $data['judul']      = 'Pengguna';
        $data['pengguna']   = $this->model('Pengguna_model')->getAllData();
        $this->view('templates/header', $data);
        $this->view('pengguna/index', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if( $this->model('Pengguna_model')->addData($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'disimpan', 'success');
            header('Location: ' . BASEURL . '/Pengguna');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Pengguna');
            exit;
        }
    }

    public function detail($id)
    {
        $data['judul']      = 'Ubah Data Pengguna';
        $data['pengguna']   = $this->model('Pengguna_model')->getDataById($id);
        $this->view('templates/header', $data);
        $this->view('pengguna/detail', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if( $this->model('Pengguna_model')->updateData($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Pengguna');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/Pengguna');
            exit;
        }
    }

    public function delete($id)
    {
        if( $this->model('Pengguna_model')->deleteData($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Pengguna');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Pengguna');
            exit;
        }
    }

    public function search() 
    {
        $data['judul']  = 'Pengguna';
        $data['pengguna']   = $this->model('Pengguna_model')->getDataBy();
        $this->view('templates/header', $data);
        $this->view('pengguna/index', $data);
        $this->view('templates/footer');
    }
}