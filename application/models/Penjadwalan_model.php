<?php

class Penjadwalan_model extends CI_Model
{
    public function getMatakuliah($kodemtk)
    {
        return $this->db->get_where('matakuliah', ['$kodemtk' => $kodemtk]);
    }
}
