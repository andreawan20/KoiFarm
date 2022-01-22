<?php

class User_Model extends CI_Model
{
    public function _Login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //meminta
        // var_dump($user); 
        // die;

        if ($user) {
            //user aktif
            if ($user['is_active'] == 1) {
                //check password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak sesuai !!! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum aktifasi !!! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum terdaftar!!</div>');
            redirect('auth');
        }
    }

    public function Registration()
    {
        //rules nama
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama kosong!'
        ]);
        //rules email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'email kosong!',
            'is_unique' => 'email telah digunakan'
        ]);
        //rules phone
        $this->form_validation->set_rules('phone', 'Phone', 'required', [
            'required' => 'Nomor phone kosong!'
        ]);
        //rules password1
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => 'Password kosong!',
            'matches' => 'Password berbeda!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendaftaran member KoiFarm';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'phone' => $this->input->post('phone'),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time(),
                'image' => 'default.jpg',
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat telah bergabung menjadi member !!! silakan lanjutkan login..!!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        //membersihkan session
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil keluar dan sampai jumpa lagi</div>');
        redirect('auth');
    }
}
