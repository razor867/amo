<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct();

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

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
