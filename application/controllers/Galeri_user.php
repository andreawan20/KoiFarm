<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_user extends CI_Controller
{

    public function index()
    {
        //title
        $data1['title'] = 'Galeri';
        //userdata
        $data2['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //koleksi
        // $this->load->model('Koleksi_model');
        // $data3['koleksi'] = $this->Koleksi_model->tampil_data();
        $data3['koleksi'] = $this->db->get('koleksi');
        $data3['koleksi'] = $this->Koleksi_model->tampil_data();

        $data3['koleksi'] = $this->Koleksi_model->tampil_data()->result();

        // $kol = $this->Koleksi_model->tampil_data();
        // $data['koleksi'] = $kol;
        $this->load->view('dashboard/template_admin/header', $data1);
        $this->load->view('dashboard/template_admin/sidebar');
        $this->load->view('dashboard/template_admin/topbar', $data2);
        $this->load->view('dashboard/galeri_user', $data3);
        $this->load->view('dashboard/template_admin/footer');
    }
}
