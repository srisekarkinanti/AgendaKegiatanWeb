<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{
    private $_table = "events";

    public $idevent;
    public $tanggal;
    public $mulai;
    public $selesai;
    
    public $deskripsi;
    public $peserta;
    public $idroom; 
    public $idtopic;
    public $reminder;
    public function rules()
    {
        return [
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'mulai',
            'label' => 'Mulai',
            'rules' => 'required'],
            
            ['field' => 'selesai',
            'label' => 'Selesai',
            'rules' => 'required'],

            ['field' => 'deskripsi',
            'label' => 'deskripsi',
            'rules' => 'required'],
            
            ['field' => 'peserta',
            'label' => 'Peserta'],

            ['field' => 'idroom',
            'label' => 'idroom',
            'rules' => 'required'],

            ['field' => 'idtopic',
            'label' => 'Topik',
            'rules' => 'required'],

            ['field' => 'reminder',
            'label' => 'reminder',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        // return $this->db->get($this->_table)->result();
        $this->db->select('events.idevent, events.Tanggal, events.mulai, events.selesai, events.deskripsi AS desc, events.peserta, topics.*, rooms.* ');
        $this->db->from('events');
        $this->db->join('topics', 'events.idtopic = topics.idtopic');
        $this->db->join('rooms', 'events.idroom = rooms.idroom');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTopic()
    {
        $query = $this->db->get('topics');
        return $query->result_array();
    }


    public function getOrang()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }
    public function getRoom()
    {
        $query = $this->db->get('rooms');
        return $query->result_array();
    }
    
    public function getDetail($id)
    {
        // return $this->db->get($this->_table)->result();
        $this->db->select('events.idevent, events.Tanggal, events.mulai, events.selesai, events.deskripsi, events.peserta, topics.topik, rooms.ruangan ');
        $this->db->from('events');
        $this->db->join('topics', 'events.idtopic = topics.idtopic');
        $this->db->join('rooms', 'events.idroom = rooms.idroom');
        $this->db->where(["idevent" => $id]);
        $query = $this->db->get();
        $data = $query->row();
        
        return $data;

       
    }

    public function getPesertaUpdate($id){
        $event = $this->db->get_where($this->_table, ['idevent' => $id])->row();

        $idpeserta = str_replace(array('[',']') , ''  ,$event->peserta);

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where_in('iduser',$idpeserta, FALSE);

        $query = $this->db->get();
        return $query->result();

    }
    public function getPeserta($data){
        $idpeserta = str_replace(array('[',']') , ''  ,$data->peserta);

        $id = array(1,2);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where_in('iduser',$idpeserta, FALSE);
        $query = $this->db->get();
        $peserta = $query->result();
        return $peserta;
    }
    public function getById($id)
    {
        // $this->db->select("*");
        // $this->db->from("events");
        // $this->db->join("topics","events.idtopic = topics.idtopic");
        // $this->db->where("idevent = ".$id." ");

        // $query = $this->db->get();
        // return $query->row();
        return $this->db->get_where($this->_table, ["idevent" => $id])->row();
    }
    // public function getDetail($id)
    // {
    //     return $this->db->get_where($this->_table, ["idevent" => $id])->row();
    // }

    public function save()
    {
        $post = $this->input->post();


        // $peserta =implode( ",",$post["peserta2"]);
        $peserta = json_encode($post["peserta2"], TRUE);

        $reminder = 10 * 60;
        $jam_reminder = strtotime($post["mulai"]) - $reminder;
        
        $this->tanggal = $post["tanggal"];
        $this->mulai = $post["mulai"];
        $this->selesai = $post["selesai"];
        $this->deskripsi = $post["deskripsi"];
        $this->peserta = $peserta;
        $this->idroom = $post["idroom"];
        $this->idtopic = $post["idtopic"];
        $this->reminder = date("H:i", $jam_reminder);
        $this->db->insert($this->_table, $this);
        // $id = $this->db->insert_id();
        // $this->last_id($id);

    }

    public function update()
    {
        $post = $this->input->post();

        $peserta = json_encode($post["peserta2"], TRUE);

        $this->idevent = $post["id"];
        $this->tanggal = $post["tanggal"];
        $this->mulai = $post["mulai"];
        $this->selesai = $post["selesai"];
        $this->idtopic = $post["topik"];
        $this->deskripsi = $post["deskripsi"];
        $this->peserta = $peserta;
        $this->idroom = $post["ruangan"];
        $this->db->update($this->_table, $this, array('idevent' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idevent" => $id));
    }
    public function jumlah_event(){

       $this->db->select('COUNT(*) as total_event');
        $this->db->from('events');
        $query = $this->db->get();
        return $query->row()->total_event;

        }

    public function last_id($id){
        return $id;
    }

    public function sendNotif($id){
        $token = [];
        $data = $this->db->get_where($this->_table, ['idevent' => $id])->row_array();
        foreach (json_decode($data['peserta']) as $key => $value) {
            $user = $this->db->get_where('users',['iduser' => $value])->row_array();
            $token[] = $user['device_token'];
        }
        $headers = array
        ('Authorization: key = AAAAsvlrAgQ:APA91bFZbo9KsNgVXscwYbw8mnvUYH9lo4tnMyKtUDI5RtBva7nLXoj8wf_YuEfEB14PdPeKas3P0TnnUQxwnx_2Bw3mg2NDzRzSQyLAjC0W_ajEYBvsfaxjMfTMVY-v1FhZ1xFn6HE6',
        'Content-Type: application/json'
        );
        $msg = array
        (
        'message'=> 'EVENT BARU',
        'title'=> 'EVENT BARU HADIR UNTUK ANDA',
        'idevent' => $id,
        'page' => 'second',
        'vibrate'=>1,
        'sound'=>1,
        'largeIcon'=>'large_icon',
        'smallIcon'=>'small_icon'
        );

        $fields = array
        ('registration_ids'=>$token,
        'data'=>$msg
        );


        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
       
    }

    public function cetak($bulan, $topik = null)
    {
        // return $this->db->get($this->_table)->result();
        $this->db->select('events.idevent, events.Tanggal, events.mulai, events.selesai, events.deskripsi AS desc, events.peserta, topics.topik, rooms.ruangan ');
        $this->db->from('events');
        $this->db->join('topics', 'events.idtopic = topics.idtopic');
        $this->db->join('rooms', 'events.idroom = rooms.idroom');
        $this->db->where('MONTHNAME(events.Tanggal)', $bulan);
        if($topik != null){
        $this->db->where('events.idtopic', $topik);
        }

        $query = $this->db->get();

        $dataCetak = [];
        $dataPeserta = [];

        

        foreach ($query->result() as $key => $value) {
           
            foreach (json_decode($value->peserta, true) as $k => $v) {
                $peserta = $this->db->get_where('users',['iduser' => $v])->row();
                $dataPeserta[] = $peserta->full_name;
            }
            $dataCetak[] = [
                'Tanggal' => $value->Tanggal,
                'topik' => $value->topik,
                'mulai' => $value->mulai,
                'selesai' => $value->selesai,
                'desc' => $value->desc,
                'jumlah_peserta' => count(json_decode($value->peserta, true)),
                'peserta' => $dataPeserta,
                'ruangan' => $value->ruangan
            ];
            unset($dataPeserta);
        }
        
         return $dataCetak;
        
        }
          
}
