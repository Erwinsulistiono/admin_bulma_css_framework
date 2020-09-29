<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect('login');
        }
        $this->load->model('M_crud');
    }

    public function nomor_account()
    {
        $output['data'] = $this->M_crud->read('tbl_akun');
        $output['html'] =  $this->load->view('accounting/v_nomor_account', '', TRUE);
        echo json_encode($output);
    }

    public function simpan_account()
    {
        $id = $this->input->post('akun_id');
        $data = [
            'akun_ket' => $this->input->post('akun_ket'),
            'akun_kode' => $this->input->post('akun_kode'),
        ];
        if ($id) {
            $this->M_crud->update('tbl_akun', $data, 'akun_id', $id);
            $this->nomor_account();
        } else {
            $this->M_crud->insert('tbl_akun', $data);
            $this->nomor_account();
        }
    }
}
