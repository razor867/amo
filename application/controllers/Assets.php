<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Assets extends CI_Controller
{
    protected $user;
    protected $err_upload;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('AssetsModel');
        $this->load->model('SuppliersModel');
        date_default_timezone_set('Asia/Jakarta');
        $this->err_upload = '';

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $this->user = $this->ion_auth->user()->row();
        }
    }

    public function index()
    {
        $data['title'] = 'Assets';
        $data['page'] = 'assets';
        $data['sub'] = false;

        $this->load->view('templates/header', $data);
        $this->load->view('assets/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function listdata()
    {
        $this->load->library("datatables");
        $this->datatables->select('a.id, a.picture, a.name, a.detail, a.serial_number, a.price, a.date_purchase, a.supplier_id,
            b.name as supplier_name, a.status, a.picture');
        $this->datatables->from('assets as a');
        $this->datatables->join('suppliers as b', 'a.supplier_id = b.id', 'left');
        $this->datatables->where('a.deleted_at', NULL);
        $this->datatables->order_by('a.name', 'asc');
        $this->datatables->add_column('action', '');
        echo $this->datatables->generate();
    }

    public function form($id = 0)
    {
        if (is_numeric($id)) {
            $data['title'] = 'Add Asset';
            $data['page'] = 'assets';
            $data['sub'] = true;
            $data['sub_breadcrumb'] = 'Assets';
            $data['url_sub'] = base_url('assets');
            $data['back_url'] = base_url('assets');
            $data['data_supplier'] = $this->SuppliersModel->getAll();
            $data['err_upload'] = $this->err_upload;

            if (empty($id)) {
                $data['form_url'] = base_url('assets/save');
                $data['is_edit'] = false;
                $data['image_default'] = base_url() . '/img_up/assets/not_available.png';
            } else {
                $data['form_url'] = base_url('assets/save/') . $id;
                $data['is_edit'] = true;

                $getEdit = $this->AssetsModel->get($id);
                foreach ($getEdit->result() as $r) {
                    $data['name'] = $r->name;
                    $data['detail'] = $r->detail;
                    $data['picture'] = $r->picture;
                    $data['price'] = $r->price;
                    $data['date_purchase'] = $r->date_purchase;
                    $data['supplier_id'] = $r->supplier_id;
                    $data['serial_number'] = $r->serial_number;
                    $data['status'] = $r->status;
                }
                $data['image_display'] = base_url() . '/img_up/assets/' . $data['picture'];

                $getSupplier = $this->SuppliersModel->get($data['supplier_id']);
                foreach ($getSupplier->result() as $r) {
                    $data['supplier_name'] = $r->name;
                }
            }

            $this->load->view('templates/header', $data);
            $this->load->view('assets/form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            show_404();
        }
    }

    public function save($id = 0)
    {
        if (is_numeric($id)) {
            $is_success = true;
            $this->load->helper(array('form'));

            $this->form_validation->set_rules('name', 'Department name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('detail', 'Detail', 'alpha_numeric_spaces');
            $this->form_validation->set_rules('supplier_id', 'Supplier', 'required|numeric');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('serial_number', 'Serial number', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('date_purchase', 'Date purchase', array('required', 'regex_match[/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/]'));
            $this->form_validation->set_rules('status', 'status', 'required|alpha_numeric_spaces');

            if ($this->form_validation->run() == FALSE) {
                empty($id) ? $this->form() : $this->form($id);
            } else {
                $data['name'] = $this->input->post('name');
                $data['detail'] = $this->input->post('detail');
                $data['supplier_id'] = $this->input->post('supplier_id');
                $data['price'] = $this->input->post('price');
                $data['serial_number'] = $this->input->post('serial_number');
                $data['date_purchase'] = $this->input->post('date_purchase');
                $data['status'] = $this->input->post('status');

                if (empty($id)) {
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['created_by'] = $this->user->id;

                    if ($_FILES['picture']['size'] == 0) {
                        $data['picture'] = 'not_available.png';
                    } else {
                        $new_name = time() . str_replace(' ', '_', $_FILES["picture"]['name']);

                        $config['upload_path']          = './img_up/assets/';
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $config['max_size']             = 1024;
                        $config['file_name'] = $new_name;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('picture')) {
                            $is_success = false;
                        } else {
                            $data['picture'] = $new_name;
                        }
                    }
                    $this->AssetsModel->insert($data);
                } else {
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $data['updated_by'] = $this->user->id;

                    if ($_FILES['picture']['size'] == 0) {
                        // $data['picture'] = 'not_available.png';
                    } else {
                        $new_name = time() . str_replace(' ', '_', $_FILES["picture"]['name']);

                        $config['upload_path']          = './img_up/assets/';
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $config['max_size']             = 1024;
                        $config['file_name'] = $new_name;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('picture')) {
                            $is_success = false;
                        } else {
                            $data['picture'] = $new_name;
                        }

                        $getImageBefore = $this->AssetsModel->get($id);
                        foreach ($getImageBefore->result() as $r) {
                            $imgBefore = $r->picture;
                        }
                        $path = './img_up/assets/' . $imgBefore;
                        unlink($path);
                    }
                    $this->AssetsModel->insert($data, $id);
                }

                if ($is_success == true) {
                    $this->session->set_flashdata('alert', 'success');
                    $this->session->set_flashdata('msg', 'Data successfully saved');
                    redirect(base_url('assets'));
                } else {
                    $this->err_upload = $this->upload->display_errors();
                    $this->form();
                }
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
                redirect(base_url('assets'));
            } else {
                $data['deleted_at'] = date("Y-m-d H:i:s");
                $data['deleted_by'] = $this->user->id;
                $this->AssetsModel->delete($id, $data);
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully deleted');
                redirect(base_url('assets'));
            }
        } else {
            show_404();
        }
    }
}
