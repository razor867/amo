<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_management extends CI_Controller
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
        $data['title'] = 'User Management';
        $data['page'] = 'user_management';
        $data['sub'] = false;

        $this->load->view('templates/header', $data);
        $this->load->view('user_management/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
