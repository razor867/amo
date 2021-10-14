<?php

class LocationModel extends CI_Model
{
    public function insert($data, $id = 0)
    {
        if (empty($id)) {
            $this->db->insert('location', $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update('location', $data);
        }
    }

    public function delete($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('location', $data);
    }

    public function getAll()
    {
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get('location');
        return $query;
    }

    public function get($id = 0)
    {
        if (empty($id)) {
            //get all
        } else {
            $this->db->where(['id' => $id, 'deleted_at' => NULL]);
            $query = $this->db->get('location');
            return $query;
        }
    }
}
