<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AssetsModel');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $this->user = $this->ion_auth->user()->row();
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['page'] = 'home';
        $data['sub'] = false;

        $total_asset = $this->AssetsModel->total_asset();
        $data['total_asset'] = $total_asset[0]['total_asset'];

        $total_lent = $this->AssetsModel->total_lent();
        $data['total_asset_lent'] = $total_lent[0]['total_lent'];

        $total_returned = $this->AssetsModel->total_returned();
        $data['total_asset_returned'] = $total_returned[0]['total_returned'];

        $total_broken = $this->AssetsModel->total_broken();
        $data['total_asset_broken'] = $total_broken[0]['total_broken'];

        $total_repair = $this->AssetsModel->total_repair();
        $data['total_asset_repair'] = $total_repair[0]['total_repair'];

        $total_lost = $this->AssetsModel->total_lost();
        $data['total_asset_lost'] = $total_lost[0]['total_lost'];

        $getLentAndReturned = $this->AssetsModel->getLentByCurrentYear();
        foreach ($getLentAndReturned->result() as $r) {
            if ($r->status == 'Lent') {
                $lent[] = $r->created_at;
            } else {
                $returned[] = $r->created_at;
            }
        }
        $data['dataLent'] = $lent;
        $data['dataReturned'] = $returned;

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // public function tes_login()
    // {
    //     $data['title'] = 'Login';
    //     $data['page'] = 'home';
    //     $data['sub'] = false;

    //     $this->load->view('auth/teslogin', $data);
    // }
}
