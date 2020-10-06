<<<<<<< Updated upstream
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
        $output['data'] = $this->M_crud->read('acc_akun');
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
            $this->M_crud->update('acc_akun', $data, 'akun_id', $id);
            $this->nomor_account();
        } else {
            $this->M_crud->insert('acc_akun', $data);
            $this->nomor_account();
        }
    }

    public function hapus_account($id)
    {
        $this->M_crud->delete('acc_akun', 'akun_id', $id);
        $this->nomor_account();
    }


    /* COA */
    public function master_coa()
    {
        $output['data'] = [
            'data1' => $this->M_crud->left_join('acc_coa', 'acc_akun', 'acc_coa.coa_akun_grup=acc_akun.akun_kode'),
            'data2' => $this->M_crud->read('acc_akun'),
        ];
        $output['html'] =  $this->load->view('accounting/v_master_coa', '', TRUE);
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
            $this->M_crud->update('acc_coa', $data, 'coa_id', $id);
            $this->master_coa();
        } else {
            $this->M_crud->insert('acc_coa', $data);
            $this->master_coa();
        }
    }

    public function hapus_coa($id)
    {
        $this->M_crud->delete('acc_coa', 'coa_id', $id);
        $this->master_coa();
    }
}
=======
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
        echo json_encode($output);
    }

    public function simpan_coa()
    {
        $id = $this->input->post('coa_id');
        $data = [
            'coa_no' => $this->input->post('coa_no'),
            'coa_nama' => $this->input->post('coa_nama'),
            'coa_akun_grup' => $this->input->post('akun_kode'),
            'coa_crdr' => $this->input->post('coa_crdr'),
            'coa_header_detail' => $this->input->post('coa_header_detail'),
            'coa_balance' => $this->input->post('coa_balance'),
            'coa_balance_date' => $this->input->post('coa_balance_date'),
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
>>>>>>> Stashed changes
