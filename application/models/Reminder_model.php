<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder_model extends CI_Model
{
    private $_table = "reminder";

    public $idevent;
    public $status_reminder;
    

    public function save($idevent, $idpeserta)
    {

        $event = $this->db->get_where($this->_table, ['idevent' => $idevent])->row();
        if (!$event) {
            $post = $this->input->post();
        $this->idevent = $idevent;
        $this->status_reminder = 1;
        $this->db->insert($this->_table, $this);
        $this->sendReminder($idevent, $idpeserta);
        }
        
    }

    private function sendReminder($idevent, $idpeserta){
        $token = [];
          foreach(json_decode($idpeserta) as $key => $value){
            $user = $this->db->get_where('users',['iduser' => $value])->row_array();
            $token[] = $user['device_token'];
          }

        $headers = array
        ('Authorization: key = AAAAsvlrAgQ:APA91bFZbo9KsNgVXscwYbw8mnvUYH9lo4tnMyKtUDI5RtBva7nLXoj8wf_YuEfEB14PdPeKas3P0TnnUQxwnx_2Bw3mg2NDzRzSQyLAjC0W_ajEYBvsfaxjMfTMVY-v1FhZ1xFn6HE6',
        'Content-Type: application/json'
        );
        $msg = array
        (
        'message'=> 'EVENT REMINDER',
        'title'=> 'REMINDER EVENT ANDA',
        'vibrate'=>1,
        'sound'=>1,
        'idevent' => $idevent,
        'page' => 'reminder',
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

    
          
}
