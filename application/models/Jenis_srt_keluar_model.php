<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_srt_keluar_model extends CI_Model
{

    private $_table = "r_jenis_srt_keluar";

    public function rules()
    {
        return [
            [
                'field' => 'nm_jenis_srt_keluar',
                'label' => 'Nama Jenis Surat Keluar',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['ID_JENIS_SRT_KELUAR' => $id])->row();
    }

    public function cekPakai($id)
    {
        return $this->db->where('ID_JENIS_SRT_KELUAR', $id)
                        ->from('t_surat_keluar')
                        ->count_all_results();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = [
            'NM_JENIS_SRT_KELUAR' => $post["nm_jenis_srt_keluar"]
        ];
        $this->db->insert($this->_table, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = [
            'NM_JENIS_SRT_KELUAR' => $post["nm_jenis_srt_keluar"]
        ];
        $this->db->update($this->_table, $data, ['ID_JENIS_SRT_KELUAR' => $post["id_jenis_srt_keluar"]]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ['ID_JENIS_SRT_KELUAR' => $id]);
    }
}
