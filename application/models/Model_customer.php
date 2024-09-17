<?php
class Model_customer extends CI_Model
{
    public function tampil_customer()
    {
        return $this->db->get('tb_customer');
    }

    public function hapus_customer($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
