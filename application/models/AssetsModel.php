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
        $this->db->select('a.id, a.picture, a.name, a.detail, a.serial_number, a.price, a.date_purchase, a.supplier_id,
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
            $this->db->where(['id' => $id, 'deleted_at' => NULL]);
            $query = $this->db->get('assets');
            return $query;
        }
    }
}
