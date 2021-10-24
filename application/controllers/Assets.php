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
        $this->load->model('EmployeeModel');
        $this->load->model('DepartmentModel');
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
        $this->datatables->select('a.id, a.picture, a.name, a.asset_code, a.detail, a.serial_number, a.price, a.date_purchase, a.supplier_id,
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
            $data['title'] = (empty($id)) ? 'Add Asset' : 'Edit Asset';
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
                    $data['asset_code'] = $r->asset_code;
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
            $this->form_validation->set_rules('asset_code', 'Asset code', 'required|alpha_numeric');
            $this->form_validation->set_rules('detail', 'Detail', '');
            $this->form_validation->set_rules('supplier_id', 'Supplier', 'required|numeric');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('serial_number', 'Serial number', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('date_purchase', 'Date purchase', array('required', 'regex_match[/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/]'));

            if ($this->form_validation->run() == FALSE) {
                empty($id) ? $this->form() : $this->form($id);
            } else {
                $data['name'] = $this->input->post('name');
                $data['asset_code'] = $this->input->post('asset_code');
                $data['detail'] = $this->input->post('detail', TRUE);
                $data['supplier_id'] = $this->input->post('supplier_id');
                $data['price'] = $this->input->post('price');
                $data['serial_number'] = $this->input->post('serial_number');
                $data['date_purchase'] = $this->input->post('date_purchase');

                if (empty($id)) {
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['created_by'] = $this->user->id;
                    $data['Status'] = 'Ready';

                    if (!isset($_FILES['picture']) || $_FILES['picture']['error'] == UPLOAD_ERR_NO_FILE) {
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

                    if (!isset($_FILES['picture']) || $_FILES['picture']['error'] == UPLOAD_ERR_NO_FILE) {
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
                            $getImageBefore = $this->AssetsModel->get($id);
                            foreach ($getImageBefore->result() as $r) {
                                $imgBefore = $r->picture;
                            }
                            $path = './img_up/assets/' . $imgBefore;
                            unlink($path);
                        }
                    }
                    $this->AssetsModel->insert($data, $id);
                }

                if ($is_success == true) {
                    $this->session->set_flashdata('alert', 'success');
                    $this->session->set_flashdata('msg', 'Data successfully saved');
                    redirect(base_url('assets'));
                } else {
                    $this->err_upload = $this->upload->display_errors();
                    empty($id) ? $this->form() : $this->form($id);
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

    public function getDataJSON()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $id = $this->input->post('id');
            $dataAsset = $this->AssetsModel->getDataJSON($id);
            $data = $dataAsset->result();

            foreach ($dataAsset->result() as $r) {
                $status = $r->status;
            }
            if ($status == 'Lent') {
                $borrower = $this->AssetsModel->getBorrower($id);
                foreach ($borrower->result() as $r) {
                    $data[1] = $r->borrowers;
                }
                $pattern = '/_n_/i';
                $check = preg_match($pattern, $data[1]);
                if (!empty($check)) {
                    $borrower_data = explode('_n_', $data[1]);
                    $department_name = $this->getDepartmentName($borrower_data[1]);
                    $data[1] = $department_name . ' Department on behalf of ' . $borrower_data[0];
                }
            } else {
                $data[1] = '';
            }
        }

        echo json_encode($data);
    }

    public function form_lent($id = 0, $title = '')
    {
        $is_empty = false;
        if (is_numeric($id)) {
            if (empty($id)) {
                $is_empty = true;
            } else {
                if (empty($title)) {
                    $is_empty = true;
                } else {
                    $data['asset_id'] = $id;
                    $data['asset_name'] = str_replace('_', ' ', $title);
                    $data['title'] = 'Lent Asset';
                    $data['page'] = 'assets';
                    $data['sub'] = true;
                    $data['sub_breadcrumb'] = 'Assets';
                    $data['url_sub'] = base_url('assets');
                    $data['back_url'] = base_url('assets');
                    $data['form_url'] = base_url('assets/lent/') . $id . '/' . $title;
                    $data['data_employee'] = $this->EmployeeModel->getAll();
                    $data['data_department'] = $this->DepartmentModel->getAll();
                }
            }
        } else {
            $is_empty = true;
        }

        if ($is_empty) {
            show_404();
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('assets/form_lent', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function lent($id = 0, $title = '')
    {
        $is_error = false;
        if (is_numeric($id)) {
            if (empty($id)) {
                show_404();
            } else {
                if (empty($title)) {
                    show_404();
                } else {
                    $this->load->helper(array('form'));
                    if (isset($_POST['individualis'])) {
                        $individualis = $this->input->post('individualis');
                    } else {
                        $individualis = 'no';
                    }

                    if ($individualis == 'yes') {
                        $this->form_validation->set_rules('employee_id', 'Employee', 'required|numeric');
                    } else {
                        $this->form_validation->set_rules('employee_id', 'Employee', 'required|numeric');
                        $this->form_validation->set_rules('department_id', 'Department', 'required|numeric');
                    }
                    $this->form_validation->set_rules('asset_id', 'Asset ID', 'required|numeric');
                    $this->form_validation->set_rules('note_lent', 'Note', '');
                    $this->form_validation->set_rules('date_lent', 'Date lent', array('required', 'regex_match[/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/]'));
                    $this->form_validation->set_rules('date_lent_returned', 'Date returned', array('required', 'regex_match[/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/]'));

                    if ($this->form_validation->run() == FALSE) {
                        $this->form_lent($id, $title);
                    } else {
                        $data['asset_id'] = $this->input->post('asset_id');
                        $data['employee_id'] = $this->input->post('employee_id');
                        if ($individualis == 'yes') {
                            $data['department_id'] = 0;
                        } else {
                            $data['department_id'] = $this->input->post('department_id');
                        }
                        $data['note_lent'] = ($this->input->post('note_lent', TRUE) != '') ? $this->input->post('note_lent', TRUE) : NULL;
                        $data['date_lent'] = $this->input->post('date_lent');
                        $data['date_lent_returned'] = $this->input->post('date_lent_returned');
                        $data['status'] = 'Lent';
                        $data['created_at'] = date("Y-m-d H:i:s");
                        $data['created_by'] = $this->user->id;
                        //cek apakah ada id nya di asset.
                        $check_dup = $this->AssetsModel->dupLent($data['asset_id']);
                        //kalo ada baru di save.
                        if ($check_dup->result()) {
                            $this->session->set_flashdata('alert', 'fail');
                            $this->session->set_flashdata('msg', 'The asset failed to lent, because this asset has not been returned');
                            $this->form_lent($id, $title);
                        } else {
                            $title = str_replace('_', ' ', $title);
                            $this->AssetsModel->lentAsset($data);
                            $this->AssetsModel->insert(['status' => 'Lent'], $data['asset_id']);
                            $this->session->set_flashdata('alert', 'success');
                            $this->session->set_flashdata('msg', '<b>' . $title . '</b>' . ' successfully lent');
                            redirect(base_url('assets'));
                        }
                    }
                }
            }
        } else {
            show_404();
        }
    }

    public function getDepartmentName($id)
    {
        $department = $this->DepartmentModel->get($id);
        foreach ($department->result() as $r) {
            return $r->name;
        }
    }

    public function form_return($id = 0, $title = '')
    {
        $is_empty = false;
        if (is_numeric($id)) {
            if (empty($id)) {
                $is_empty = true;
            } else {
                if (empty($title)) {
                    $is_empty = true;
                } else {
                    $data['asset_id'] = $id;
                    $data['asset_name'] = str_replace('_', ' ', $title);
                    $data['title'] = 'Return Asset';
                    $data['page'] = 'assets';
                    $data['sub'] = true;
                    $data['sub_breadcrumb'] = 'Assets';
                    $data['url_sub'] = base_url('assets');
                    $data['back_url'] = base_url('assets');
                    $data['form_url'] = base_url('assets/return_asset/') . $id . '/' . $title;

                    $data_lent = $this->AssetsModel->getLent($id);
                    foreach ($data_lent->result() as $r) {
                        $data['scheduled_asset_return'] = $r->date_lent_returned;
                    }
                }
            }
        } else {
            $is_empty = true;
        }

        if ($is_empty) {
            show_404();
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('assets/form_return', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function return_asset($id = 0, $title = '')
    {
        $is_empty = false;
        if (is_numeric($id)) {
            if (empty($id)) {
                show_404();
            } else {
                if (empty($title)) {
                    show_404();
                } else {
                    //add returned
                    $this->form_validation->set_rules('asset_id', 'Asset ID', 'required|numeric');
                    $this->form_validation->set_rules('note_returned', 'Note', '');
                    $this->form_validation->set_rules('date_returned', 'Date returned', array('required', 'regex_match[/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/]'));
                    $this->form_validation->set_rules('fine', 'Fine', 'required|numeric');

                    if ($this->form_validation->run() == FALSE) {
                        $this->form_return($id, $title);
                    } else {
                        $asset_id = $this->input->post('asset_id');
                        $data['date_returned'] = $this->input->post('date_returned');
                        $data['note_returned'] = ($this->input->post('note_returned', TRUE) != '') ? $this->input->post('note_returned', TRUE) : NULL;
                        $data['fine'] = $this->input->post('fine');
                        $data['status'] = 'Returned';
                        $data['updated_at'] = date("Y-m-d H:i:s");
                        $data['updated_by'] = $this->user->id;

                        $this->AssetsModel->return_asset($asset_id, $data);
                        //Update Status Assets
                        $this->AssetsModel->insert(['updated_at' => $data['updated_at'], 'updated_by' => $data['updated_by'], 'status' => 'Ready'], $asset_id);

                        $this->session->set_flashdata('alert', 'success');
                        $this->session->set_flashdata('msg', '<b>' . $title . '</b>' . ' successfully returned');
                        redirect(base_url('assets'));
                    }
                }
            }
        } else {
            show_404();
        }
    }
}
