<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        //title
        $data1['title'] = 'Administrator Setup';
        //userdata
        $data2['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('dashboard/template_admin/header', $data1);
        $this->load->view('dashboard/template_admin/sidebar');
        $this->load->view('dashboard/template_admin/topbar', $data2);
        $this->load->view('dashboard/index');
        $this->load->view('dashboard/template_admin/footer');
    }
}
