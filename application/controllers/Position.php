<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Position extends CI_Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('PositionModel');
        date_default_timezone_set('Asia/Jakarta');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $this->user = $this->ion_auth->user()->row();
        }
    }

    public function index()
    {
        $data['title'] = 'Position';
        $data['page'] = 'position';
        $data['sub'] = false;

        $this->load->view('templates/header', $data);
        $this->load->view('position/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function listdata()
    {
        $this->load->library("datatables");
        $this->datatables->select('id, name, detail');
        $this->datatables->from('position');
        $this->datatables->where('deleted_at', NULL);
        // $this->datatables->order_by('id', 'desc');
        $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function form($id = 0)
    {
        if (is_numeric($id)) {
            $data['title'] = (empty($id)) ? 'Add Position' : 'Edit Position';
            $data['page'] = 'position';
            $data['sub'] = true;
            $data['sub_breadcrumb'] = 'Position';
            $data['url_sub'] = base_url('position');
            $data['back_url'] = base_url('position');

            if (empty($id)) {
                $data['form_url'] = base_url('position/save');
                $data['is_edit'] = false;
            } else {
                $data['form_url'] = base_url('position/save/') . $id;
                $data['is_edit'] = true;

                $getEdit = $this->PositionModel->get($id);
                foreach ($getEdit->result() as $r) {
                    $data['name'] = $r->name;
                    $data['detail'] = $r->detail;
                }
            }

            $this->load->view('templates/header', $data);
            $this->load->view('position/form', $data);
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
            $this->form_validation->set_rules('detail', 'Detail', 'alpha_numeric_spaces');

            if ($this->form_validation->run() == FALSE) {
                empty($id) ? $this->form() : $this->form($id);
            } else {
                $data['name'] = $this->input->post('name');
                $data['detail'] = $this->input->post('detail');

                if (empty($id)) {
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['created_by'] = $this->user->id;

                    $this->PositionModel->insert($data);
                } else {
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $data['updated_by'] = $this->user->id;

                    $this->PositionModel->insert($data, $id);
                }
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully saved');
                redirect(base_url('position'));
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
                redirect(base_url('position'));
            } else {
                $data['deleted_at'] = date("Y-m-d H:i:s");
                $data['deleted_by'] = $this->user->id;
                $this->PositionModel->delete($id, $data);
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully deleted');
                redirect(base_url('position'));
            }
        } else {
            show_404();
        }
    }
}
