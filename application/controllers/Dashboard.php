<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_crud');
    }

    public function index()
    {
        $output['html'] =  $this->load->view('v_dashboard', '', TRUE);
        $output['data'] = '';
        echo json_encode($output);
    }
}
