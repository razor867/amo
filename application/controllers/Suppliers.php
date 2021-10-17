<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('SuppliersModel');
        date_default_timezone_set('Asia/Jakarta');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $this->user = $this->ion_auth->user()->row();
        }
    }

    public function index()
    {
        $data['title'] = 'Suppliers';
        $data['page'] = 'suppliers';
        $data['sub'] = false;

        $this->load->view('templates/header', $data);
        $this->load->view('suppliers/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function listdata()
    {
        $this->load->library("datatables");
        $this->datatables->select('id, name');
        $this->datatables->from('suppliers');
        $this->datatables->where('deleted_at', NULL);
        // $this->datatables->order_by('id', 'desc');
        $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function form($id = 0)
    {
        if (is_numeric($id)) {
            $data['title'] = (empty($id)) ? 'Add Supplier' : 'Edit Supplier';
            $data['page'] = 'suppliers';
            $data['sub'] = true;
            $data['sub_breadcrumb'] = 'Suppliers';
            $data['url_sub'] = base_url('suppliers');
            $data['back_url'] = base_url('suppliers');
            if (empty($id)) {
                $data['form_url'] = base_url('suppliers/save');
                $data['is_edit'] = false;
            } else {
                $data['form_url'] = base_url('suppliers/save/') . $id;
                $data['is_edit'] = true;

                $getEdit = $this->SuppliersModel->get($id);
                foreach ($getEdit->result() as $r) {
                    $data['name'] = $r->name;
                }
            }

            $this->load->view('templates/header', $data);
            $this->load->view('suppliers/form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            show_404();
        }
    }

    public function save($id = 0)
    {
        if (is_numeric($id)) {
            $this->load->helper(array('form'));

            $this->form_validation->set_rules('name', 'Supplier name', 'required|alpha_numeric_spaces');

            if ($this->form_validation->run() == FALSE) {
                empty($id) ? $this->form() : $this->form($id);
            } else {
                $data['name'] = $this->input->post('name');

                if (empty($id)) {
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['created_by'] = $this->user->id;

                    $this->SuppliersModel->insert($data);
                } else {
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $data['updated_by'] = $this->user->id;

                    $this->SuppliersModel->insert($data, $id);
                }
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully saved');
                redirect(base_url('suppliers'));
            }
        } else {
            show_404();
        }
    }

    public function delete($id = 0)
    {
        if (is_numeric($id)) {
            if (empty($id)) {
                $this->session->set_flashdata('alert', 'fail');
                $this->session->set_flashdata('msg', 'Errors occurred, failed to delete data');
                redirect(base_url('suppliers'));
            } else {
                $data['deleted_at'] = date("Y-m-d H:i:s");
                $data['deleted_by'] = $this->user->id;
                $this->SuppliersModel->delete($id, $data);
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully deleted');
                redirect(base_url('suppliers'));
            }
        } else {
            show_404();
        }
    }
}
