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
        $this->datatables->select("id, asset_name, borrower, DATE_FORMAT(date_lent, '%d/%m/%Y') as date_lent, 
        DATE_FORMAT(date_lent_returned, '%d/%m/%Y') as date_lent_returned, note_lent");
        $this->datatables->from('_lent');
        $this->datatables->where('status', 'Lent');
        $this->datatables->order_by('created_at', 'desc');
        // $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function listdata_returned()
    {
        $this->load->library("datatables");
        $this->datatables->select("id, asset_name, borrower, DATE_FORMAT(date_returned, '%d/%m/%Y') as date_returned, 
            fine, note_returned");
        $this->datatables->from('_lent');
        $this->datatables->where('status', 'Returned');
        $this->datatables->order_by('created_at', 'desc');
        // $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function listdata_broken()
    {
        $this->load->library("datatables");
        $this->datatables->select("id, name, asset_code, serial_number, DATE_FORMAT(date_purchase, '%d/%m/%Y') as date_purchase");
        $this->datatables->from('assets');
        $this->datatables->where('status', 'Broken');
        $this->datatables->order_by('created_at', 'desc');
        // $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function listdata_repair()
    {
        $this->load->library("datatables");
        $this->datatables->select("a.id, CONCAT(b.name, ' (', b.asset_code, ')') as asset_name, 
            a.repair_by, DATE_FORMAT(a.start_repair, '%d/%m/%Y') as start_repair, DATE_FORMAT(a.end_repair, '%d/%m/%Y') as end_repair, a.cost, a.note_repair");
        $this->datatables->from('repair as a');
        $this->datatables->join('assets as b', 'a.asset_id = b.id', 'left');
        $this->datatables->where('a.status', 'On Repair');
        $this->datatables->order_by('a.created_at', 'desc');
        // $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function listdata_repaired()
    {
        $this->load->library("datatables");
        $this->datatables->select("a.id, CONCAT(b.name, ' (', b.asset_code, ')') as asset_name, 
            a.repair_by, DATE_FORMAT(a.start_repair, '%d/%m/%Y') as start_repair, DATE_FORMAT(a.end_repair, '%d/%m/%Y') as end_repair, a.cost, a.note_repair");
        $this->datatables->from('repair as a');
        $this->datatables->join('assets as b', 'a.asset_id = b.id', 'left');
        $this->datatables->where('a.status', 'Repaired');
        $this->datatables->order_by('a.created_at', 'desc');
        // $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function listdata_lost()
    {
        $this->load->library("datatables");
        $this->datatables->select("id, name, asset_code, serial_number, DATE_FORMAT(date_purchase, '%d/%m/%Y') as date_purchase");
        $this->datatables->from('assets');
        $this->datatables->where('status', 'Lost');
        $this->datatables->order_by('created_at', 'desc');
        // $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }
}
