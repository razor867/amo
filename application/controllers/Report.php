<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
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
        $data['title'] = 'Report';
        $data['page'] = 'report';
        $data['sub'] = false;

        $this->load->view('templates/header', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function listdata_lent()
    {
        $this->load->library("datatables");
        $this->datatables->select("a.id, b.name as asset_name, (CASE WHEN a.department_id = 6 THEN c.name ELSE CONCAT(c.name, '_n_', d.name) END) as borrower, 
            DATE_FORMAT(a.date_lent, '%d/%m/%Y') as date_lent, 
            DATE_FORMAT(a.date_lent_returned, '%d/%m/%Y') as date_lent_returned, a.note_lent");
        $this->datatables->from('lent as a');
        $this->datatables->join('assets as b', 'a.asset_id = b.id', 'left');
        $this->datatables->join('employee as c', 'a.employee_id = c.id', 'left');
        $this->datatables->join('department as d', 'a.department_id = d.id', 'left');
        $this->datatables->where('a.status', 'Lent');
        $this->datatables->order_by('a.created_at', 'desc');
        // $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }
}
