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

    /* ACCOUNT */
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

    public function hapus_account($id)
    {
        $this->M_crud->delete('tbl_akun', 'akun_id', $id);
        $this->nomor_account();
    }


    /* COA */
    public function master_coa()
    {
        $output['data'] = [
            'data1' => $this->M_crud->left_join('tbl_coa', 'tbl_akun', 'tbl_coa.coa_akun_grup=tbl_akun.akun_kode'),
            'data2' => $this->M_crud->read('tbl_akun'),
        ];
        $output['html'] =  $this->load->view('accounting/v_master_coa', '', TRUE);
        // echo json_encode($output['data']['data1']);
        // die();
        echo json_encode($output);
    }

    public function simpan_coa()
    {
        $id = $this->input->post('coa_id');
        $data = [
            'akun_ket' => $this->input->post('akun_ket'),
            'akun_kode' => $this->input->post('akun_kode'),
        ];
        if ($id) {
            $this->M_crud->update('tbl_coa', $data, 'coa_id', $id);
            $this->master_coa();
        } else {
            $this->M_crud->insert('tbl_coa', $data);
            $this->master_coa();
        }
    }

    public function hapus_coa($id)
    {
        $this->M_crud->delete('tbl_coa', 'coa_id', $id);
        $this->master_coa();
    }
}
