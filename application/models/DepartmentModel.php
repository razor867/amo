<?php

class DepartmentModel extends CI_Model
{
    public function insert($data, $id = 0)
    {
        if (empty($id)) {
            $this->db->insert('department', $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update('department', $data);
        }
    }

    public function delete($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('department', $data);
    }

    public function getAll()
    {
        $this->db->select('
            a.id, a.name, a.location_id, b.name as location_name
        ');
        $this->db->from('department as a');
        $this->db->join('location as b', 'a.location_id = b.id', 'left');
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
            $query = $this->db->get('department');
            return $query;
        }
    }
}
