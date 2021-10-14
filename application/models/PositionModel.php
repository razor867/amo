<?php

class PositionModel extends CI_Model
{
    public function insert($data, $id = 0)
    {
        if (empty($id)) {
            $this->db->insert('position', $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update('position', $data);
        }
    }

    public function delete($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('position', $data);
    }

    public function getAll()
    {
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get('position');
        return $query;
    }

    public function get($id = 0)
    {
        if (empty($id)) {
            //get all
        } else {
            $this->db->where(['id' => $id, 'deleted_at' => NULL]);
            $query = $this->db->get('position');
            return $query;
        }
    }
}
