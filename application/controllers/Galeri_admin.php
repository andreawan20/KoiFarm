<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_admin extends CI_Controller
{

    public function index()
    {
        //title
        $data1['title'] = 'Galeri';
        //userdata
        $data2['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //koleksi
        $data3['koleksi'] = $this->db->get('koleksi');
        $data3['koleksi'] = $this->Koleksi_model->tampil_data();

        $data3['koleksi'] = $this->Koleksi_model->tampil_data()->result();

        $this->load->view('dashboard/template_admin/header', $data1);
        $this->load->view('dashboard/template_admin/sidebar');
        $this->load->view('dashboard/template_admin/topbar', $data2);
        $this->load->view('dashboard/galeri', $data3);
        $this->load->view('dashboard/template_admin/footer');
    }


    public function tambah_aksi()
    {
        $this->load->model('Koleksi_model');
        $this->Koleksi_model->tambah_aksi();
    }


    public function edit($id)
    {

        $data1['title'] = 'Galeri';
        //userdata
        $data2['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['koleksi'] = $this->db->get('koleksi');
        $where = array('id_ikan' => $id);
        $data['koleksi'] = $this->Koleksi_model->edit_data($where, 'koleksi')->result();
        $this->load->view('dashboard/template_admin/header', $data1);
        $this->load->view('dashboard/template_admin/sidebar');
        $this->load->view('dashboard/template_admin/topbar', $data2);
        $this->load->view('dashboard/admin/edit_data', $data);
        $this->load->view('dashboard/template_admin/footer');
    }


    public function update()
    {
        $id_ikan                 = $this->input->post('id_ikan');
        $nama_ikan               = $this->input->post('nama_ikan');
        $kategori                = $this->input->post('kategori');
        $deskripsi               = $this->input->post('deskripsi');
        $usia                    = $this->input->post('usia');
        $ukuran                  = $this->input->post('ukuran');
        $kelamin                 = $this->input->post('kelamin');
        $gambar                  = $this->input->post('gambar');

        $data = array(
            'nama_ikan'        => $nama_ikan,
            'kategori'         => $kategori,
            'deskripsi'        => $deskripsi,
            'usia'             => $usia,
            'ukuran'           => $ukuran,
            'kelamin'          => $kelamin,
            'gambar'           => $gambar,
        );
        $where = array(
            'id_ikan'    => $id_ikan
        );
        $this->Koleksi_model->update_data($where, $data, 'koleksi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di edit ! </div>');
        redirect('Galeri_admin/');
    }


    public function hapus($id)
    {
        $where = array('id_ikan' => $id);
        $this->Koleksi_model->hapus_data($where, 'koleksi');
    }
}
