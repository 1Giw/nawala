<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_model extends CI_Model
{

    private $_table = "t_disposisi";

    public function rules()
    {
        return [
            [
                'field' => 'id_surat_masuk',
                'label' => 'Surat Masuk',
                'rules' => 'required'
            ],

            [
                'field' => 'instruksi',
                'label' => 'Instruksi',
                'rules' => 'required'
            ]
        ];
    }

    public function getJumlah()
    {
        return $this->db->count_all($this->_table);
    }

    public function getTerbaruBagian($id_user)
    {
        $this->db->order_by('TANGGAL_DISPOSISI', 'DESC');
        $this->db->limit(5);
        return $this->db->get_where($this->_table, ['ID_PENERIMA' => $id_user])->result();
    }

    public function getAllBagian($id_user)
    {
        $this->db->order_by('TANGGAL_DISPOSISI', 'DESC');
        return $this->db->get_where($this->_table, ['ID_PENERIMA' => $id_user])->result();
    }

    public function getAll()
    {
        $this->db->order_by('TANGGAL_DISPOSISI', 'DESC');
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['ID_DISPOSISI' => $id])->row();
    }

    public function getBySurat($id_surat)
    {
        $this->db->order_by('ID_DISPOSISI', 'DESC');
        return $this->db->get_where($this->_table, ['ID_SURAT_MASUK' => $id_surat])->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ID_SURAT_MASUK = $post["id_surat_masuk"];
        $this->STATUS = $post["status"];
        $this->NOMOR_SURAT = $post["nomor_surat"];
        $this->TANGGAL_DISPOSISI = $post["tanggal_disposisi"];
        $this->TANGGAL_SELESAI = $post["tanggal_selesai"];
        $this->PERIHAL = $post["perihal"];
        $this->ASAL = $post["asal"];
        $this->ID_PEMBERI = $post["id_pemberi"];
        $this->ID_PENERIMA = $post["id_penerima"];
        $this->INSTRUKSI = $post["instruksi"];
        $this->CATATAN = $post["catatan"];
        $this->IS_READ = $post["is_read"];
        $this->USER_ID = $post["user_id"];
        $this->db->insert($this->_table, $this);
    }

    public function jmlDisposisi($tahun)
    {
        $rekap_query = '
       SELECT
    EXTRACT(YEAR FROM t_disposisi."TANGGAL_DISPOSISI") AS TAHUN,
    EXTRACT(MONTH FROM t_disposisi."TANGGAL_DISPOSISI") AS BULAN,
    r_bulan."NM_BULAN",
    COUNT(t_disposisi."ID_DISPOSISI") AS JUMLAH
FROM 
    t_disposisi
LEFT JOIN
    r_bulan ON EXTRACT(MONTH FROM t_disposisi."TANGGAL_DISPOSISI") = CAST(r_bulan."KD_BULAN" AS INTEGER)
WHERE
    EXTRACT(YEAR FROM t_disposisi."TANGGAL_DISPOSISI") = ' . $tahun . '
GROUP BY
    EXTRACT(YEAR FROM t_disposisi."TANGGAL_DISPOSISI"),
    EXTRACT(MONTH FROM t_disposisi."TANGGAL_DISPOSISI"),
    r_bulan."NM_BULAN"
ORDER BY
    EXTRACT(MONTH FROM t_disposisi."TANGGAL_DISPOSISI") ASC;

        ';
        $query = $this->db->query($rekap_query)->result();
        return $query;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ['ID_DISPOSISI' => $id]);
    }
}
