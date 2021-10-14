<?php

class EmployeeModel extends CI_Model
{
    public function insert($data, $id = 0)
    {
        if (empty($id)) {
            $this->db->insert('employee', $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update('employee', $data);
        }
    }

    public function delete($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('employee', $data);
    }

    public function getAll()
    {
        $this->db->select('a.id, a.name, a.nip, a.position_id, b.name as position_name,
            a.department_id, c.name as department_name, a.place_of_birth, a.date_of_birth');
        $this->db->from('employee as a');
        $this->db->join('position as b', 'a.position_id = b.id', 'left');
        $this->db->join('department as c', 'a.department_id = c.id', 'left');
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
            $query = $this->db->get('employee');
            return $query;
        }
    }
}
