<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model
{
    private $_table = "rooms";

    public $idroom;
    public $ruangan;
    public $gambar;
    public $deskripsi;
    public $kapasitas;
        
    public function __construct() {
       parent::__construct();
       $this->load->helper(array('form', 'url'));
   }

    public function rules()
    {
        return [
            ['field' => 'ruangan',
            'label' => 'Ruangan',
            'rules' => 'required'],

            ['field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required'],

            ['field' => 'kapasitas',
            'label' => 'Kapasitas',
            'rules' => 'required']
            ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idroom" => $id])->row();
    }

    public function save()
    {

        // upload file
       $config['upload_path'] = 'upload/room';
       $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|csv|odt|gif|jpg|jpeg|png';
       $this->load->library('upload', $config);
       
       $this->upload->do_upload('file');
       $result1 = $this->upload->data();

       $result = array('file'=>$result1);
       $post = $this->input->post();

        $post = $this->input->post();
        
        $this->ruangan = $post["ruangan"];
        $this->gambar = $result['file']['file_name'];
        $this->deskripsi = $post["deskripsi"];
        $this->kapasitas = $post["kapasitas"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
       $this->idroom = $post["id"];
        $this->ruangan = isset($post["ruangan"]) ? $post["ruangan"] : null; 
        $this->gambar = isset($post["gambar"]) ? $post["gambar"] : null;
        $this->deskripsi = isset($post["deskripsi"]) ? $post["deskripsi"] : null;
        $this->kapasitas = isset($post["kapasitas"]) ? $post["kapasitas"] : null;
        $this->db->update($this->_table, $this, array('idroom' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idroom" => $id));
    }
    private function _uploadImage()
{
    $config['upload_path']          = './upload/room/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->idroom;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}

    public function jumlah_room(){

       $this->db->select('COUNT(*) as total_room');
        $this->db->from('rooms');
        $query = $this->db->get();
        return $query->row()->total_room;

        }

    
}
  