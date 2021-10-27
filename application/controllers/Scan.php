<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Scan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AssetsModel');
        $this->load->model('DepartmentModel');
    }

    public function result_scan($id = 0)
    {
        if (is_numeric($id)) {
            if (empty($id)) {
                show_404();
            } else {
                $dataAsset = $this->AssetsModel->getDataJSON($id);
                foreach ($dataAsset->result() as $r) {
                    $data['asset_name'] = $r->name;
                    $data['asset_status'] = $r->status;
                    $data['asset_detail'] = $r->detail;
                    $data['asset_code'] = $r->asset_code;
                    $data['asset_serial_number'] = $r->serial_number;
                    $data['asset_price'] = $r->price;
                    $data['asset_date_purchase'] = $r->date_purchase;
                    $data['asset_supplier_name'] = $r->supplier_name;
                    $data['asset_image'] = $r->picture;
                }

                if ($data['asset_status'] == 'Lent') {
                    $borrower = $this->AssetsModel->getBorrower($id);
                    foreach ($borrower->result() as $r) {
                        $data['asset_lent_to'] = $r->borrowers;
                    }
                    $pattern = '/_n_/i';
                    $check = preg_match($pattern, $data['asset_lent_to']);
                    if (!empty($check)) {
                        $borrower_data = explode('_n_', $data['asset_lent_to']);
                        $department_name = $this->getDepartmentName($borrower_data[1]);
                        $data['asset_lent_to'] = $department_name . ' Department on behalf of ' . $borrower_data[0];
                    }
                } else {
                    $data['asset_lent_to'] = '';
                }
                $this->load->view('scan/index', $data);
            }
        } else {
            show_404();
        }
    }

    private function getDepartmentName($id)
    {
        $department = $this->DepartmentModel->get($id);
        foreach ($department->result() as $r) {
            return $r->name;
        }
    }
}
