<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_management extends CI_Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            if (!$this->ion_auth->is_admin()) {
                show_404();
            } else {
                $this->user = $this->ion_auth->user()->row();
            }
        }
    }

    public function index()
    {
        $data['title'] = 'User Management';
        $data['page'] = 'user_management';
        $data['sub'] = false;
        $data['data_user'] = $this->ion_auth->users()->result();

        foreach ($data['data_user'] as $k => $usr) {
            $data['data_user'][$k]->groups = $this->ion_auth->get_users_groups($usr->id)->result();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('user_management/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function form($id = 0)
    {
        if (is_numeric($id)) {
            $data['title'] = (empty($id)) ? 'Add User' : 'Edit User';
            $data['page'] = 'user_management';
            $data['sub'] = true;
            $data['sub_breadcrumb'] = 'User Management';
            $data['url_sub'] = base_url('user_management');
            $data['back_url'] = base_url('user_management');

            if (empty($id)) {
                $data['form_url'] = base_url('user_management/save');
                $data['is_edit'] = false;
            } else {
                $data['form_url'] = base_url('user_management/save/') . $id;
                $data['is_edit'] = true;
                $data['data_user'] = $this->ion_auth->user($id)->row();
                $data['groups'] = $this->ion_auth->groups()->result_array();
                $data['currentGroups'] = $this->ion_auth->get_users_groups($id)->result_array();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('user_management/form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            show_404();
        }
    }

    public function save($id = 0)
    {
        if (is_numeric($id)) {
            $tables = $this->config->item('tables', 'ion_auth');
            $this->load->helper(array('form'));

            $this->form_validation->set_rules('first_name', 'Firstname', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Lastname', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|alpha_numeric');
            $this->form_validation->set_rules('company', 'Company', 'trim|alpha_numeric_spaces');

            if (empty($id)) {
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');
            } else {
                if ($this->input->post('password')) {
                    $this->form_validation->set_rules('password', 'Password', 'min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
                    $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');
                }
            }

            if ($this->form_validation->run() == FALSE) {
                empty($id) ? $this->form() : $this->form($id);
            } else {
                if (empty($id)) {
                    $email = strtolower($this->input->post('email'));
                    $identity = $email;
                    $password = $this->input->post('password');
                    $additional_data = [
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'company' => $this->input->post('company'),
                        'phone' => $this->input->post('phone'),
                    ];

                    if ($this->ion_auth->register($identity, $password, $email, $additional_data)) {
                        $this->session->set_flashdata('alert', 'success');
                        $this->session->set_flashdata('msg', 'Successfully creating users');
                    } else {
                        $this->session->set_flashdata('alert', 'fail');
                        $this->session->set_flashdata('msg', 'Failed to create user');
                    }
                } else {
                    if (isset($_POST) && !empty($_POST)) {
                        $data = [
                            'first_name' => $this->input->post('first_name'),
                            'last_name' => $this->input->post('last_name'),
                            'company' => $this->input->post('company'),
                            'phone' => $this->input->post('phone'),
                        ];
                        // update the password if it was posted
                        if ($this->input->post('password')) {
                            $data['password'] = $this->input->post('password');
                        }

                        // Only allow updating groups if user is admin
                        if ($this->ion_auth->is_admin()) {
                            // Update the groups user belongs to
                            $this->ion_auth->remove_from_group('', $id);

                            $groupData = $this->input->post('groups');
                            if (isset($groupData) && !empty($groupData)) {
                                foreach ($groupData as $grp) {
                                    $this->ion_auth->add_to_group($grp, $id);
                                }
                            }
                        }
                        // check to see if we are updating the user
                        if ($this->ion_auth->update($id, $data)) {
                            // redirect them back to the admin page if admin, or to the base url if non admin
                            $this->session->set_flashdata('alert', 'success');
                            $this->session->set_flashdata('msg', 'Successfully editing users');
                        } else {
                            // redirect them back to the admin page if admin, or to the base url if non admin
                            $this->session->set_flashdata('alert', 'fail');
                            $this->session->set_flashdata('msg', 'Failed to editing users');
                        }
                    }
                }
                redirect(base_url('user_management'));
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
                redirect(base_url('user_management'));
            } else {
                $data['deleted_at'] = date("Y-m-d H:i:s");
                $data['deleted_by'] = $this->user->id;
                $this->db->where('id', $id);
                $this->db->delete('users');
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', 'Data successfully deleted');
                redirect(base_url('user_management'));
            }
        } else {
            show_404();
        }
    }

    public function deactivate($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', ['active' => 0]);
        $this->session->set_flashdata('alert', 'success');
        $this->session->set_flashdata('msg', 'Successfully, the user has been disabled');
        redirect(base_url('user_management'));
    }

    public function activate($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', ['active' => 1]);
        $this->session->set_flashdata('alert', 'success');
        $this->session->set_flashdata('msg', 'Successfully, the user has been activated');
        redirect(base_url('user_management'));
    }
}
