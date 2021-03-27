<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class DataModel extends CI_Model{

    private $_table = "tbltest";

    public function rules()
    {
        return[
            
            ['field' => 'uraian',
             'label' => 'Uraian',
             'rules' => 'required'],            
        ];
    }

    public function getAll()
    {
        $sql = "SELECT * from tbltest ";
        return $this->db->query($sql)->result();
        //return $this->db->get($this->_table)->result();
    }

    public function getSum()
    {
        $sql = "SELECT sum(prognosa) as tot_prognosa, sum(rkap) as tot_rkap, sum(januari) as tot_januari, sum(februari) as tot_februari,
        sum(maret) as tot_maret, sum(april) as tot_april, sum(mei) as tot_mei, sum(juni) as tot_juni,
        sum(juli) as tot_juli, sum(agustus) as tot_agustus, sum(september) as tot_september, sum(oktober) as tot_oktober, sum(november) as tot_november,
        sum(desember) as tot_desember, sum(triwulan1) as tot_triwulan1, sum(triwulan2) as tot_triwulan2, sum(triwulan3) as tot_triwulan3,
        sum(triwulan4) as tot_triwulan4, sum(jumlah_setahun) as tot_jumlah_setahun
        from tbltest ";
        return $this->db->query($sql)->result();
        //return $this->db->get($this->_table)->result();
    }
        
    public function save()
    {
        $post = $this->input->post();
        $this->uraian = $post["uraian"];
        $this->prognosa = $post["prognosa"];
        $this->rkap = $post["rkap"];
        $this->januari = $post["januari"];
        $this->februari = $post["februari"];
        $this->maret = $post["maret"];
        $this->triwulan1 = $post["triwulan1"];
        $this->april = $post["april"];
        $this->mei = $post["mei"];
        $this->juni = $post["juni"];
        $this->triwulan2 = $post["triwulan2"];
        $this->juli = $post["juli"];
        $this->agustus = $post["agustus"];
        $this->september = $post["september"];
        $this->triwulan3 = $post["triwulan3"];
        $this->oktober = $post["oktober"];
        $this->november = $post["november"];
        $this->desember = $post["desember"];
        $this->triwulan4 = $post["triwulan4"];
        $this->jumlah_setahun = $post["jumlah_setahun"];
        // $this->tahun = $post["tahun"];
       
        $this->db->insert($this->_table, $this);
    }
        
  }

