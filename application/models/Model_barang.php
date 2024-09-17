<?php
class Model_barang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_produk');
    }

    public function tampil_kategori()
    {
        $query = $this->db->query(" SELECT * FROM tb_kategori ORDER BY kategori ");

        return $query;
    }

    public function tampil_supplier()
    {
        $query = $this->db->query("SELECT * FROM tb_supplier ORDER BY nama");

        return $query;
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('tb_produk');
    }

    public function find($id)
    {
        $result = $this->db->where('id_produk', $id)
            ->limit(1)
            ->get('tb_produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_produk($id_produk)
    {
        $result = $this->db->where('id_produk', $id_produk)->get('tb_produk');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
