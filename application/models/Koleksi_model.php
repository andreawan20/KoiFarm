<?php

class Koleksi_Model extends CI_Model
{
    public function tampil_data()
    {
        //$this->db->select('*')->from('koleksi');
        return $this->db->get('koleksi');
        $this->db->SELECT('*')->FROM('koleksi');

        // return $this->db->get()->result();
    }

    public function tambah_aksi()
    {
        $nama_ikan               = $this->input->post('nama_ikan');
        $kategori                = $this->input->post('kategori');
        $deskripsi               = $this->input->post('deskripsi');
        $usia                    = $this->input->post('usia');
        $ukuran                  = $this->input->post('ukuran');
        $kelamin                 = $this->input->post('kelamin');
        $gambar                  = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_ikan'        => $nama_ikan,
            'kategori'         => $kategori,
            'deskripsi'        => $deskripsi,
            'usia'             => $usia,
            'ukuran'           => $ukuran,
            'kelamin'          => $kelamin,
            'gambar'           => $gambar,
        );
        $this->Koleksi_model->tambah_data($data, 'koleksi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan! </div>');
        redirect('Galeri_admin');
    }

    public function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
