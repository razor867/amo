<?php

class AssetsModel extends CI_Model
{
    public function insert($data, $id = 0)
    {
        if (empty($id)) {
            $this->db->insert('assets', $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update('assets', $data);
        }
    }

    public function delete($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('assets', $data);
    }

    public function getAll()
    {
        $this->db->select('a.id, a.picture, a.name, a.asset_code, a.detail, a.serial_number, a.price, a.date_purchase, a.supplier_id,
            b.name as supplier_name, a.status, a.picture');
        $this->db->from('assets as a');
        $this->db->join('suppliers as b', 'a.supplier_id = b.id', 'left');
        $this->db->where('a.deleted_at', NULL);
        $query = $this->db->get();
        return $query;
    }

    public function get($id = 0)
    {
        if (empty($id)) {
            //get all
        } else {
            $this->db->select('a.id, a.picture, a.name, a.asset_code, a.detail, a.serial_number, a.price, a.date_purchase, a.supplier_id,
            b.name as supplier_name, a.status, a.picture');
            $this->db->from('assets as a');
            $this->db->join('suppliers as b', 'a.supplier_id = b.id', 'left');
            $this->db->where(['a.id' => $id, 'a.deleted_at' => NULL]);
            $query = $this->db->get();
            return $query;
        }
    }

    public function getDataJSON($id = 0)
    {
        if (empty($id)) {
            //get all
        } else {
            $this->db->select('a.id, a.picture, a.name, a.asset_code, a.detail, a.serial_number, a.price, DATE_FORMAT(a.date_purchase, "%d/%m/%Y") as date_purchase, a.supplier_id,
            b.name as supplier_name, a.status, a.picture');
            $this->db->from('assets as a');
            $this->db->join('suppliers as b', 'a.supplier_id = b.id', 'left');
            $this->db->where(['a.id' => $id, 'a.deleted_at' => NULL]);
            $query = $this->db->get();
            return $query;
        }
    }

    public function dupLent($id)
    {
        $this->db->select('asset_id');
        $this->db->from('lent');
        $this->db->where(['asset_id' => $id, 'status' => 'Lent', 'deleted_at' => NULL]);
        $query = $this->db->get();
        return $query;
    }

    public function lentAsset($data)
    {
        $this->db->insert('lent', $data);
    }

    public function getBorrower($id)
    {
        $this->db->select("(CASE WHEN a.department_id = 6 THEN CONCAT(b.name, ' (NIP : ', b.nip, ')') ELSE CONCAT(CONCAT(b.name, ' (NIP : ', b.nip, ')'), '_n_', c.name) END) as borrowers");
        $this->db->from('lent as a');
        $this->db->join('employee as b', 'a.employee_id = b.id', 'left');
        $this->db->join('department as c', 'a.department_id = c.id', 'left');
        $this->db->where(['a.asset_id' => $id, 'a.status' => 'Lent', 'a.deleted_at' => NULL]);
        $query = $this->db->get();
        return $query;
    }

    public function getLent($asset_id)
    {
        $this->db->where(['asset_id' => $asset_id, 'status' => 'Lent', 'deleted_at' => NULL]);
        $query = $this->db->get('lent');
        return $query;
    }

    public function return_asset($asset_id, $data)
    {
        $this->db->where(['asset_id' => $asset_id, 'status' => 'Lent', 'deleted_at' => NULL]);
        $this->db->update('lent', $data);
    }

    public function status_repair($data, $asset_id = 0)
    {
        if (empty($asset_id)) {
            $this->db->insert('repair', $data);
        } else {
            $this->db->where(['asset_id' => $asset_id, 'status' => 'On Repair', 'deleted_at' => NULL]);
            $this->db->update('repair', $data);
        }
    }

    public function total_asset()
    {
        $this->db->select('COUNT(*) as total_asset');
        $this->db->where(['deleted_at' => NULL]);
        $query = $this->db->get('assets')->result_array();
        return $query;
    }

    public function total_lent()
    {
        $this->db->select('COUNT(*) as total_lent');
        $this->db->where(['deleted_at' => NULL, 'status' => 'Lent', 'YEAR(updated_at)' => date('Y')]);
        $query = $this->db->get('lent')->result_array();
        return $query;
    }

    public function total_returned()
    {
        $this->db->select('COUNT(*) as total_returned');
        $this->db->where(['deleted_at' => NULL, 'status' => 'Returned', 'YEAR(updated_at)' => date('Y')]);
        $query = $this->db->get('lent')->result_array();
        return $query;
    }

    public function total_broken()
    {
        $this->db->select('COUNT(*) as total_broken');
        $this->db->where(['deleted_at' => NULL, 'status' => 'Broken']);
        $query = $this->db->get('assets')->result_array();
        return $query;
    }

    public function total_repair()
    {
        $this->db->select('COUNT(*) as total_repair');
        $this->db->where(['deleted_at' => NULL, 'status' => 'On Repair']);
        $query = $this->db->get('repair')->result_array();
        return $query;
    }

    public function total_lost()
    {
        $this->db->select('COUNT(*) as total_lost');
        $this->db->where(['deleted_at' => NULL, 'status' => 'Lost']);
        $query = $this->db->get('assets')->result_array();
        return $query;
    }

    public function getLentByCurrentYear()
    {
        // get lent and returned by current year
        $this->db->select('id, updated_at, status');
        $this->db->where(['deleted_at' => NULL, 'YEAR(updated_at)' => date('Y')]);
        $query = $this->db->get('lent');
        return $query;
    }
}
