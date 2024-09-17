<?php

class Model_kategori extends CI_Model
{

    //Tampil Data
    public function tampil_kategori()
    {
        return $this->db->get('tb_kategori');
    }

    public function tampil_barang($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->order_by($id_kategori);
        return $this->db->get()->row();
    }

    // Makanan Kering
    public function data_makanan_kering()
    {
        return $this->db->get_where("tb_produk", array('id_kategori' => '5'));
    }

    // Makanan Kaleng
    public function data_makanan_kaleng()
    {
        return $this->db->get_where("tb_produk", array('id_kategori' => '6'));
    }

    // Obat Kucing
    public function data_obat_kucing()
    {
        return $this->db->get_where("tb_produk", array('id_kategori' => '9'));
    }

    // Vitamin Kucing
    public function data_vitamin_kucing()
    {
        return $this->db->get_where("tb_produk", array('id_kategori' => '11'));
    }

    // Vitamin Kucing
    public function data_susu_kucing()
    {
        return $this->db->get_where("tb_produk", array('id_kategori' => '10'));
    }

    // Shampo Kucing
    public function data_shampo_kucing()
    {
        return $this->db->get_where("tb_produk", array('id_kategori' => '8'));
    }

    // Peralatan Kucing
    public function data_peralatan_kucing()
    {
        return $this->db->get_where("tb_produk", array('id_kategori' => '7'));
    }

    //Tambah Kategori
    public function tambah_kategori($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //Edit Kategori
    public function edit_kategori($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_kategori($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_kategori($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
