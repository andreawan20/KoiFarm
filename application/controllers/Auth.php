<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    public function _login()
    {
        $this->load->model('User_model');
        $this->User_model->_Login();
    }

    public function registration()
    {
        $this->load->model('User_model');
        $this->User_model->Registration();
    }

    public function Logout()
    {
        $this->load->model('User_model');
        $this->User_model->Logout();
    }
}
