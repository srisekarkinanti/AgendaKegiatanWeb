<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Participant_model extends CI_model {
	private $_table = 'participants';
	public $idevent;
	public $iduser;
	public $status;

	 public function rules()
    {
        return [
            ['field' => 'event',
            'label' => 'Event',
            'rules' => 'required'],

            ['field' => 'Peserta',
            'label' => 'Peserta',
            'rules' => 'required'],
            
            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']

              ];
    }

     public function getAll()
    {
        $this->db->select('participants.*, users.full_name, events.deskripsi');
        $this->db->from('participants');
        $this->db->join('events', 'events.idevent = participants.idevent');
        $this->db->join('users', 'users.iduser = participants.iduser');
        $query = $this->db->get();
        // echo "<pre>";
        // echo json_encode($query->result_array());
        // echo "</pre>";
        // exit;
        // print_r($query->result());
        // exit;
        return $query->result_array();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idparticipant" => $id])->row();
    }


	public function save($value, $id){
		$data = [];
		$data = [
			'idevent' => $id,
			'iduser' => $value,
			'status' => 0
		];

		$this->db->insert($this->_table, $data);
	}
	
   public function update()
    {
        $post = $this->input->post();
        $this->idparticipant = $post["id"];
        $this->idevent = isset($post["idevent"]) ? $post["idevent"] : null; 
        $this->iduser= isset($post["iduser"]) ? $post["iduser"] : null;
        $this->status = isset($post["status"]) ? $post["status"] : null;
        $this->db->update($this->_table, $this, array('idparticipant' => $post['id']));
    }
     public function delete($id)
    {
        return $this->db->delete($this->_table, array("idparticipant" => $id));
    }

}
