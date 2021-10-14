<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('EmployeeModel');
        $this->load->model('PositionModel');
        $this->load->model('DepartmentModel');
        date_default_timezone_set('Asia/Jakarta');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $this->user = $this->ion_auth->user()->row();
        }
    }

    public function index()
    {
        $data['title'] = 'Employee';
        $data['page'] = 'employee';
        $data['sub'] = false;

        $this->load->view('templates/header', $data);
        $this->load->view('employee/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function listdata()
    {
        $this->load->library("datatables");
        $this->datatables->select('a.id, a.name, a.nip, a.position_id, b.name as position_name,
            a.department_id, c.name as department_name, CONCAT(a.place_of_birth, ", ", DATE_FORMAT(a.date_of_birth, "%d/%m/%Y")) as birth');
        $this->datatables->from('employee as a');
        $this->datatables->join('position as b', 'a.position_id = b.id', 'left');
        $this->datatables->join('department as c', 'a.department_id = c.id', 'left');
        $this->datatables->where('a.deleted_at', NULL);
        // $this->datatables->order_by('id', 'desc');
        $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function form($id = 0)
    {
        if (is_numeric($id)) {
            $data['title'] = 'Add Employee';
            $data['page'] = 'employee';
            $data['sub'] = true;
            $data['sub_breadcrumb'] = 'Employee';
            $data['url_sub'] = base_url('employee');
            $data['back_url'] = base_url('employee');
            $data['data_position'] = $this->PositionModel->getAll();
            $data['data_department'] = $this->DepartmentModel->getAll();

            if (empty($id)) {
                $data['form_url'] = base_url('employee/save');
                $data['is_edit'] = false;
            } else {
                $data['form_url'] = base_url('employee/save/') . $id;
                $data['is_edit'] = true;

                $getEdit = $this->EmployeeModel->get($id);
                foreach ($getEdit->result() as $r) {
                    $data['name'] = $r->name;
                    $data['nip'] = $r->nip;
                    $data['position_id'] = $r->position_id;
                    $data['department_id'] = $r->department_id;
                    $data['place_of_birth'] = $r->place_of_birth;
                    $data['date_of_birth'] = $r->date_of_birth;
                }
                $getPosition = $this->PositionModel->get($data['position_id']);
                foreach ($getPosition->result() as $r) {
                    $data['position_name'] = $r->name;
                }
                $getDepartment = $this->DepartmentModel->get($data['department_id']);
                foreach ($getDepartment->result() as $r) {
                    $data['department_name'] = $r->name;
                }
            }

            $this->load->view('templates/header', $data);
            $this->load->view('employee/form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            show_404();
        }
    }

    public function save($id = 0)
    {
        if (is_numeric($id)) {
            $this->load->helper(array('form'));

            $this->form_validation->set_rules('name', 'Employee name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
            $this->form_validation->set_rules('position_id', 'Position', 'required|numeric');
            $this->form_validation->set_rules('department_id', 'Department', 'required|numeric');
            $this->form_validation->set_rules('place_of_birth', 'Place of birth', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('date_of_birth', 'Date of birth', array('required', 'regex_match[/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/]'));

            if ($this->form_validation->run() == FALSE) {
                empty($id) ? $this->form() : $this->form($id);
            } else {
                $data['name'] = $this->input->post('name');
                $data['nip'] = $this->input->post('nip');
                $data['position_id'] = $this->input->post('position_id');
                $data['department_id'] = $this->input->post('department_id');
                $data['place_of_birth'] = $this->input->post('place_of_birth');
                $data['date_of_birth'] = $this->input->post('date_of_birth');

                if (empty($id)) {
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['created_by'] = $this->user->id;

                    $this->EmployeeModel->insert($data);
                } else {
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $data['updated_by'] = $this->user->id;

                    $this->EmployeeModel->insert($data, $id);
                }
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully saved');
                redirect(base_url('employee'));
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
                redirect(base_url('employee'));
            } else {
                $data['deleted_at'] = date("Y-m-d H:i:s");
                $data['deleted_by'] = $this->user->id;
                $this->EmployeeModel->delete($id, $data);
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully deleted');
                redirect(base_url('employee'));
            }
        } else {
            show_404();
        }
    }
}
