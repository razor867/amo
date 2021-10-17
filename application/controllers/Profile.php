<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $this->user = $this->ion_auth->user()->row();
        }
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['page'] = 'profile';
        $data['sub'] = false;
        $data['data_user'] = $this->user;

        $this->load->view('templates/header', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function form($id = 0)
    {
        if (is_numeric($id)) {
            $data['title'] = (empty($id)) ? 'Add Department' : 'Edit Department';
            $data['page'] = 'department';
            $data['sub'] = true;
            $data['sub_breadcrumb'] = 'Department';
            $data['url_sub'] = base_url('department');
            $data['back_url'] = base_url('department');
            $data['data_location'] = $this->LocationModel->getAll();

            if (empty($id)) {
                $data['form_url'] = base_url('department/save');
                $data['is_edit'] = false;
            } else {
                $data['form_url'] = base_url('department/save/') . $id;
                $data['is_edit'] = true;

                $getEdit = $this->DepartmentModel->get($id);
                foreach ($getEdit->result() as $r) {
                    $data['name'] = $r->name;
                    $data['location_id'] = $r->location_id;
                }
                $getLocation = $this->LocationModel->get($data['location_id']);
                foreach ($getLocation->result() as $r) {
                    $data['location_name'] = $r->name;
                }
            }

            $this->load->view('templates/header', $data);
            $this->load->view('department/form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            show_404();
        }
    }

    public function save($id = 0)
    {
        if (is_numeric($id)) {
            $this->load->helper(array('form'));

            $this->form_validation->set_rules('name', 'Department name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('location_id', 'Location name', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                empty($id) ? $this->form() : $this->form($id);
            } else {
                $data['name'] = $this->input->post('name');
                $data['location_id'] = $this->input->post('location_id');

                if (empty($id)) {
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['created_by'] = $this->user->id;

                    $this->DepartmentModel->insert($data);
                } else {
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $data['updated_by'] = $this->user->id;

                    $this->DepartmentModel->insert($data, $id);
                }
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully saved');
                redirect(base_url('department'));
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
                redirect(base_url('department'));
            } else {
                $data['deleted_at'] = date("Y-m-d H:i:s");
                $data['deleted_by'] = $this->user->id;
                $this->DepartmentModel->delete($id, $data);
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully deleted');
                redirect(base_url('department'));
            }
        } else {
            show_404();
        }
    }
}
