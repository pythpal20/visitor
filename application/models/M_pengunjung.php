<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengunjung extends CI_Model
{
    public function getDataPengunjung()
    {
        $this->db->select('*')
            ->from('tb_visitors')
            ->order_by('date_created', 'DESC');

        $query = $this->db->get();
        return $query;
    }
}
