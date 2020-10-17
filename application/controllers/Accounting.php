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

    public function simpan_nomor_account()
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

    public function hapus_nomor_account($id)
    {
        $this->M_crud->delete('acc_akun', 'akun_id', $id);
        $this->nomor_account();
    }


    /* COA */
    public function master_coa()
    {
        $output['data'] = $this->M_crud->left_join('acc_coa', 'acc_akun', 'acc_coa.coa_akun_grup=acc_akun.akun_kode');
        $output['akun'] = json_encode($this->M_crud->read('acc_akun'));
        $output['html'] =  $this->load->view('accounting/v_master_coa', $output, TRUE);
        echo json_encode($output);
    }

    public function simpan_master_coa()
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

    public function hapus_master_coa($id)
    {
        $this->M_crud->delete('acc_coa', 'coa_id', $id);
        $this->master_coa();
    }

    public function print()
    {
        $field = explode(",", $this->input->post('field')[0]);
        // foreach ($field as $f) {
        $data = [
            'head' => [$field, $this->input->post("dbField")]
        ];
        // }
        $data['body'] = $this->M_crud->left_join('acc_coa', 'acc_akun', 'acc_coa.coa_akun_grup=acc_akun.akun_kode');
        $this->load->view('accounting/v_print', $data);
        // var_dump($data);
        // $this->load->view('accounting/v_print', $data);

        // var_dump($data);

        // $this->load->view('accounting/v_print', $data);

        // echo json_encode($data);
    }
}
