<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika akan ada gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil diubah!</div>');
            redirect('user');
        }
    }


    public function jadwal()
    {
        $data['title'] = 'Jadwal Kuliah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jadwal'] = $this->db->get('matakuliah')->result_array();

        $this->form_validation->set_rules('kodemtk', 'Kode', 'required');
        $this->form_validation->set_rules('namamtk', 'Nama', 'required');
        $this->form_validation->set_rules('namadosen', 'Dosen', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('mulai', 'Mulai', 'required');
        $this->form_validation->set_rules('selesai', 'Selesai', 'required');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/jadwal', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kodemtk' => $this->input->post('kodemtk'),
                'namamtk' => $this->input->post('namamtk'),
                'namadosen' => $this->input->post('namadosen'),
                'hari' => $this->input->post('hari'),
                'mulai' => $this->input->post('mulai'),
                'selesai' => $this->input->post('selesai'),
                'fakultas' => $this->input->post('fakultas')
            ];
            $this->db->insert('matakuliah', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Berhasil Ditambah!</div>');
            redirect('user/jadwal');
        }
    }

    public function editJadwal()
    {
        $data['title'] = 'Edit Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['jadwal'] = $this->db->get_where('matakuliah')->row_array();

        $this->form_validation->set_rules('kodemtk', 'Kode', 'required');
        $this->form_validation->set_rules('namamtk', 'Nama', 'required');
        $this->form_validation->set_rules('namadosen', 'Dosen', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('mulai', 'Mulai', 'required');
        $this->form_validation->set_rules('selesai', 'Selesai', 'required');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit-jadwal', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kodemtk' => $this->input->post('kodemtk'),
                'namamtk' => $this->input->post('namamtk'),
                'namadosen' => $this->input->post('namadosen'),
                'hari' => $this->input->post('hari'),
                'mulai' => $this->input->post('mulai'),
                'selesai' => $this->input->post('selesai'),
                'fakultas' => $this->input->post('fakultas')
            ];

            $this->db->replace('matakuliah', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Berhasil Diubah!</div>');
            redirect('user/jadwal');
        }
    }

    public function hapusJadwal($kodemtk)
    {

        $this->db->delete('matakuliah', ['kodemtk' => $kodemtk]);
        redirect('user/jadwal');
    }
}
