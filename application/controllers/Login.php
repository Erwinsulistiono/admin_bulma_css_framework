<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_crud');
    }

    public function index()
    {
        if ($this->session->userdata('masuk') == true) {
            $this->berhasillogin();
        }
        $title['title'] = "Accounting";
        $this->load->view('v_login', $title);
    }


    public function auth()
    {
        $username = strip_tags(str_replace("'", "", $this->input->post('username')));
        $password = md5($this->input->post('password'));
        $cadmin = $this->M_login->cekadmin($username, $password);

        if ($cadmin) {
            $sesdata = array(
                'masuk' => true,
                'pengguna_id' => $cadmin['user_id'],
                'pengguna_nama' => $cadmin['user_nama'],
                'pengguna_username' => $cadmin['user_name'],
                'pengguna_photo' => $cadmin['user_foto'],
            );
            $this->session->set_userdata($sesdata);
        }

        if ($this->session->userdata('masuk') == true) {
            $this->berhasillogin();
        }
        $this->gagallogin();
    }

    public function berhasillogin()
    {
        $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Welcome <b>' . $this->session->userdata('user_nama') . '</b> Selamat bekerja.</div>');
        $this->load->view('layouts/v_main');
        redirect('main');
    }

    public function gagallogin()
    {
        $this->session->set_flashdata('msg', 'Username Atau Password Salah');
        redirect('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
