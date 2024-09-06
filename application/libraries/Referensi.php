<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referensi
{
    private $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function nmPegawai($id)
    {
        $where = array(
            'ID_PEGAWAI' => $id
        );
        $hasil = $this->ci->db->get_where('t_pegawai', $where)->row();
        return $hasil ? $hasil->NM_PEGAWAI : '';
    }

    function nmBagian($id)
    {
        $where = array(
            'ID_BAGIAN' => $id
        );
        $hasil = $this->ci->db->get_where('r_bagian', $where)->row();
        return $hasil ? $hasil->NM_BAGIAN : '';
    }

    function nmJenisSuratKeluar($id)
    {
        $where = array(
            'ID_JENIS_SRT_KELUAR' => $id
        );
        $hasil = $this->ci->db->get_where('r_jenis_srt_keluar', $where)->row();
        return $hasil ? $hasil->NM_JENIS_SRT_KELUAR : '';
    }

    function jmlSuratMasuk($bulan, $tahun)
    {
        $tanggal = $tahun . "-" . str_pad($bulan, 2, '0', STR_PAD_LEFT) . "%";
        $this->ci->db->where("TO_CHAR(\"TGL_SURAT\", 'YYYY-MM-DD') LIKE", $tanggal);
        return $this->ci->db->from('t_surat_masuk')->count_all_results();
    }
    
    function jmlSuratDisposisi($bulan, $tahun)
    {
        $tanggal = $tahun . "-" . str_pad($bulan, 2, '0', STR_PAD_LEFT) . "%";
        $this->ci->db->where("TO_CHAR(\"TANGGAL_DISPOSISI\", 'YYYY-MM-DD') LIKE", $tanggal);
        return $this->ci->db->from('t_disposisi')->count_all_results();
    }
    
    function jmlSuratKeluar($bulan, $tahun)
    {
        $tanggal = $tahun . "-" . str_pad($bulan, 2, '0', STR_PAD_LEFT) . "%";
        $this->ci->db->where("TO_CHAR(\"TGL_SURAT\", 'YYYY-MM-DD') LIKE", $tanggal);
        $this->ci->db->where('STATUS', '2');
        return $this->ci->db->from('t_surat_keluar')->count_all_results();
    }
    

    function fileSuratMasuk($id)
    {
        $where = array(
            'ID_SURAT_MASUK' => $id
        );
        $hasil = $this->ci->db->get_where('t_surat_masuk', $where)->row();
        return $hasil ? $hasil->FILE_SURAT : '';
    }
}
