<?php
class Model_supplier extends CI_Model
{
    public function tampil_supplier()
    {
        return $this->db->get('tb_supplier');
    }

    public function tambah_supplier($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_supplier($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_supplier($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function hapus_supplier($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
