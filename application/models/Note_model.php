<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Note_model extends CI_Model
{
    private $_table = "notes";

    public $idnote;
    public $idtopic;
    public $tanggal;
    public $deskripsi;
    public $mulai;
    public $selesai;
    public $catatan;
    public $oleh_admin;
    public $iduser;
        
    public function rules()
    {
        return [
           
    
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'idtopic',
            'label' => 'Topik',
            'rules' => 'required'],
            
            ['field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required'],

            ['field' => 'mulai',
            'label' => 'Mulai',
            'rules' => 'required'],

            ['field' => 'selesai',
            'label' => 'Selesai',
            'rules' => 'required'],
            
            ['field' => 'catatan',
            'label' => 'Catatan',
            'rules' => 'required']

            ];
    }

    public function getAll()
    {
        //return $this->db->get($this->_table)->result();
        $this->db->select('*');
        $this->db->from('notes');
        $this->db->join('topics', 'notes.idtopic = topics.idtopic');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTopic()
    {
        $query = $this->db->get('topics');
        return $query->result_array();
    }
    
    public function getById($id)
    {
        // return $this->db->get_where($this->_table, ["idnote" => $id])->row();
        $this->db->select('*');
        $this->db->from('notes');
        $this->db->join('topics', 'notes.idtopic = topics.idtopic');
        $this->db->where('idnote = '.$id.' ');
        $query = $this->db->get();
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $role = $this->session->userdata['user_logged']['role'];
        if ($role == "admin") {
            foreach ($post['pegawai'] as $key => $value) {
                $this->idtopic = $post["idtopic"];
                $this->tanggal = $post["tanggal"];
                $this->deskripsi = $post["deskripsi"];
                $this->mulai = $post["mulai"];
                $this->selesai = $post["selesai"];
                $this->catatan = $post["catatan"];
                $this->iduser = $value;
                $this->oleh_admin = '1';
                $this->db->insert($this->_table, $this);

            }

        }
        else{
            $this->idtopic = $post["idtopic"];
            $this->tanggal = $post["tanggal"];
            $this->deskripsi = $post["deskripsi"];
            $this->mulai = $post["mulai"];
            $this->selesai = $post["selesai"];
            $this->catatan = $post["catatan"];
            $this->iduser = $this->session->userdata['user_logged']['iduser'];
            $this->db->insert($this->_table, $this);
        }
        
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idnote = $post["id"];
        $this->idtopic = isset($post["idtopic"]) ? $post["idtopic"] : null; 
        $this->tanggal = isset($post["tanggal"]) ? $post["tanggal"] : null;
        $this->deskripsi = isset($post["deskripsi"]) ? $post["deskripsi"] : null;
        $this->mulai = isset($post["mulai"]) ? $post["mulai"] : null;
        $this->selesai = isset($post["selesai"]) ? $post["selesai"] : null;
        $this->catatan = isset($post["catatan"]) ? $post["catatan"] : null;
        $this->iduser = isset($post["iduser"]) ? $post["iduser"] : null;
        $this->oleh_admin = '1';
        $this->db->update($this->_table, $this, array('idnote' => $post['id']));
    }

    public function getDetail($id)
    {
        // return $this->db->get($this->_table)->result();
        $this->db->select('notes.idnote, notes.tanggal, topics.topik, notes.mulai, notes.selesai, notes.deskripsi, notes.catatan ');
        $this->db->from('notes');
        $this->db->join('topics', 'notes.idtopic = topics.idtopic');
        $this->db->where(["idnote" => $id]);
        $query = $this->db->get();
        $data = $query->row();
        
        return $data;

       
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idnote" => $id));
    }
     public function jumlah_note(){

       $this->db->select('COUNT(*) as total_note');
        $this->db->from('notes');
        $query = $this->db->get();
        return $query->row()->total_note;

        }
          
}
