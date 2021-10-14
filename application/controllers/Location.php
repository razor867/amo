<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Location extends CI_Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('LocationModel');
        date_default_timezone_set('Asia/Jakarta');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $this->user = $this->ion_auth->user()->row();
        }
    }

    public function index()
    {
        $data['title'] = 'Location';
        $data['page'] = 'location';
        $data['sub'] = false;

        $this->load->view('templates/header', $data);
        $this->load->view('location/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function listdata()
    {
        $this->load->library("datatables");
        $this->datatables->select('id, name, state, province, district, postcode');
        $this->datatables->from('location');
        $this->datatables->where('deleted_at', NULL);
        // $this->datatables->order_by('id', 'desc');
        $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function form($id = 0)
    {
        if (is_numeric($id)) {
            $data['title'] = 'Add Location';
            $data['page'] = 'location';
            $data['sub'] = true;
            $data['sub_breadcrumb'] = 'Location';
            $data['url_sub'] = base_url('location');
            $data['back_url'] = base_url('location');
            if (empty($id)) {
                $data['form_url'] = base_url('location/save');
                $data['is_edit'] = false;
            } else {
                $data['form_url'] = base_url('location/save/') . $id;
                $data['is_edit'] = true;

                $getEdit = $this->LocationModel->get($id);
                foreach ($getEdit->result() as $r) {
                    $data['name'] = $r->name;
                    $data['state'] = $r->state;
                    $data['province'] = $r->province;
                    $data['district'] = $r->district;
                    $data['postcode'] = $r->postcode;
                }
            }

            $this->load->view('templates/header', $data);
            $this->load->view('location/form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            show_404();
        }
    }

    public function save($id = 0)
    {
        if (is_numeric($id)) {
            $this->load->helper(array('form'));

            $this->form_validation->set_rules('name', 'Location name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('state', 'State', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('province', 'Province', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('district', 'District', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('postcode', 'Postcode', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                empty($id) ? $this->form() : $this->form($id);
            } else {
                $data['name'] = $this->input->post('name');
                $data['state'] = $this->input->post('state');
                $data['province'] = $this->input->post('province');
                $data['district'] = $this->input->post('district');
                $data['postcode'] = $this->input->post('postcode');

                if (empty($id)) {
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['created_by'] = $this->user->id;

                    $this->LocationModel->insert($data);
                } else {
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $data['updated_by'] = $this->user->id;

                    $this->LocationModel->insert($data, $id);
                }
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully saved');
                redirect(base_url('location'));
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
                redirect(base_url('location'));
            } else {
                $data['deleted_at'] = date("Y-m-d H:i:s");
                $data['deleted_by'] = $this->user->id;
                $this->LocationModel->delete($id, $data);
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully deleted');
                redirect(base_url('location'));
            }
        } else {
            show_404();
        }
    }
}
