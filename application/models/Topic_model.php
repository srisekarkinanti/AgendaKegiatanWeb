<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Topic_model extends CI_Model
{
    private $_table = "topics";

    public $idtopic;
    public $topik;
           
    public function rules()
    {
        return [
            ['field' => 'topik',
            'label' => 'Topik',
            'rules' => 'required']
            ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idtopic" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        
        $this->topik = $post["topik"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idtopic = $post["id"];
        $this->topik = $post["topik"];
        $this->db->update($this->_table, $this, array('idtopic' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idtopic" => $id));
    }
}
