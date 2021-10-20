<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    protected $user;
    protected $err_upload;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ProfileModel');
        $this->err_upload = '';

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
            $data['title'] = 'Edit Profile';
            $data['page'] = 'profile';
            $data['sub'] = true;
            $data['sub_breadcrumb'] = 'Profile';
            $data['url_sub'] = base_url('profile');
            $data['back_url'] = base_url('profile');
            $data['data_user'] = $this->ion_auth->user()->row();
            $data['err_upload'] = $this->err_upload;

            if (empty($id)) {
                redirect(base_url('profile'));
            } else {
                $data['form_url'] = base_url('profile/save/') . $id;
                $data['is_edit'] = true;

                $this->load->view('templates/header', $data);
                $this->load->view('profile/form', $data);
                $this->load->view('templates/footer', $data);
            }
        } else {
            show_404();
        }
    }

    public function save($id = 0)
    {
        if (is_numeric($id)) {
            $is_success = true;
            $this->load->helper(array('form'));

            $this->form_validation->set_rules('first_name', 'Firstname', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('last_name', 'Lastname', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('about', 'About', 'required');
            // $this->form_validation->set_message('customAlpha', 'The About field may only contain customAlpha characters and spaces.');

            if (empty($id)) {
                redirect(base_url('profile'));
            } else {
                if ($this->form_validation->run() == FALSE) {
                    $is_success = false;
                } else {
                    $data['first_name'] = $this->input->post('first_name');
                    $data['last_name'] = $this->input->post('last_name');
                    $data['about'] = $this->input->post('about', TRUE);

                    if (!isset($_FILES['picture']) || $_FILES['picture']['error'] == UPLOAD_ERR_NO_FILE) {
                        //...
                    } else {
                        $new_name = time() . str_replace(' ', '_', $_FILES["picture"]['name']);
                        $config['upload_path']          = './dist_web/images/users/';
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $config['max_size']             = 1024;
                        $config['file_name'] = $new_name;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('picture')) {
                            $is_success = false;
                            $this->err_upload = $this->upload->display_errors();
                        } else {
                            $data['picture'] = $new_name;
                            $getImageBefore = $this->ProfileModel->get($id);
                            foreach ($getImageBefore->result() as $r) {
                                $imgBefore = $r->picture;
                            }
                            $path = './dist_web/images/users/' . $imgBefore;
                            unlink($path);
                        }
                    }
                }
                if ($is_success) {
                    $this->ProfileModel->insert($data, $id);
                    $this->session->set_flashdata('alert', 'success');
                    $this->session->set_flashdata('msg', 'Data successfully saved');
                    redirect(base_url('profile'));
                } else {
                    $this->form($id);
                }
            }
        } else {
            show_404();
        }
    }

    public function customAlpha($str)
    {
        if (!preg_match('/^[a-z .,\-]+$/i', $str)) {
            return false;
        }
    }
}
