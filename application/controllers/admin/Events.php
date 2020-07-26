<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("event_model");
        $this->load->model("participant_model");
        $this->load->model("reminder_model");
        $this->load->library('form_validation');

            // echo "<pre>";
            // echo json_encode($this->session->userdata['user_logged']['full_name']);
            // echo "</pre>";
            // exit;
    }

    public function index()
    {
        if ( !$this->session->userdata('user_logged')) {
            redirect('admin/login');
        }
            $event = $this->event_model;
        $validation = $this->form_validation;
        $validation->set_rules($event->rules());

        if ($validation->run()) {
            $event->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/events/'));
        }


        $data["events"] = $this->event_model->getAll();

        $data["topics"] = $this->event_model->getTopic();
        $data["rooms"] = $this->event_model->getRoom();
        $data["orangs"] = $this->event_model->getOrang();
        $this->template->set('title','Event List');
        $this->template->load('main','contents','admin/event/list',$data);

        
        
    }
    
    public function checkid(){
        $event = $this->event_model;
        print_r($event->last_id());
        exit;
    }
    public function add()
    {
        $event = $this->event_model;
        $validation = $this->form_validation;
        $validation->set_rules($event->rules());
        $post = $this->input->post();
        if ($post) {

            $event->save();
            $id = $this->db->insert_id();
            foreach ($post["peserta2"] as $key => $value) {
                $participant = $this->participant_model;
                $participant->save($value, $id);
            }
            $event->sendNotif($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/events/index');
        }
        $data["events"] = $this->event_model->getTopic();
        $data["rooms"] = $this->event_model->getRoom();
        $this->load->view("admin/event/list",$data);
    }

    public function edit($id = 0)
    {
        if (!isset($id)) redirect('admin/events/');
       
        $event = $this->event_model;
        $validation = $this->form_validation;
        $validation->set_rules($event->rules());

        if ($this->input->post()) {
            $event->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/events/'));

        }

        $data['getPeserta']= $this->event_model->getPesertaUpdate($id);
        $data["topic"] = $this->event_model->getTopic();
        $data["rooms"] = $this->event_model->getRoom();
        $data["event"] = $event->getById($id);
        if (!$data["event"]) show_404();
        
        $this->load->view("admin/event/edit", $data);
    }

    public function detail($id){
        
      
        $event = $this->event_model;
        $data["events"] = $event->getDetail($id);
        $data["rooms"] = $this->event_model->getRoom();
        $data['peserta'] = $this->event_model->getPeserta($data["events"]);
      
        // if (!$data["events"]) show_404();
        
        $this->load->view("admin/event/detail", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        $this->event_model->delete($id);
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect("admin/events/index");
        
    }

    public function check_reminder(){
        date_default_timezone_set('Asia/Jakarta');
        $id_event = $this->db->get('events')->result_array();
        $reminder = $this->reminder_model;
        $time_now = date("Y-m-d H:i");
        $id = [];
        
        foreach ($id_event as $key => $value) {
            $id[] = $value['idevent'];
        }

        foreach ($id as $key => $value) {
            
            $event = $this->db->get_where('events', ["idevent" => $value])->row_array();

            $time_reminder = date("Y-m-d H:i", strtotime($event['Tanggal'].' '.$event['reminder']));
            
            if ($time_now == $time_reminder) {
                $reminder->save($event['idevent'],$event['peserta']);
            }
        }

    }

    public function sendNotif(){

        $headers = array
        ('Authorization: key = AAAAsvlrAgQ:APA91bFZbo9KsNgVXscwYbw8mnvUYH9lo4tnMyKtUDI5RtBva7nLXoj8wf_YuEfEB14PdPeKas3P0TnnUQxwnx_2Bw3mg2NDzRzSQyLAjC0W_ajEYBvsfaxjMfTMVY-v1FhZ1xFn6HE6',
        'Content-Type: application/json'
        );
        $msg = array
        (
        'message'=> 'DATANG WOI',
        'title'=> 'TES NOTIF EVENT',
        'subtitle'=> 'This is a subtitle. subtitle',
        'tickerText'=> 'Ticker text here...Ticker text here...Ticker text here',
        'vibrate'=>1,
        'sound'=>1,
        'largeIcon'=>'large_icon',
        'smallIcon'=>'small_icon'
        );

        $fields = array
        ('registration_ids'=>["eIROfL2JwU8:APA91bEWJh_fZ5gKPB6xkJIOP03myG1EcajgYCCV_wCb4LMUt9lcphgkR9A0MnhcK8Rxl095JRpDS-2VALuldyoBHQz77hMEK2Fkeb6LvNYi8Y3ItZp75fRyDcAjpKrRDidr2t8fJHVR"],
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
        echo $result;
    }

    public function printPDF()
    {
        $bulan = $this->input->post('namaBulan');
        $topik = $this->input->post('topik');

        $topik_name = $this->db->get_where('topics',['idtopic' => $topik])->row_array();

        $mpdf = new \Mpdf\Mpdf();
        $data["events"] = $this->event_model->cetak($bulan, $topik);
        $data["bulan"] = $bulan;
        $data["topik"] = $topik_name['topik'];
        $html = $this->load->view('admin/event/laporan', $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function ganti_status(){
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_skrg = strtotime(date('Y-m-d H:i'));
        $event = $this->db->get('events')->result_array();
        foreach ($event as $key => $value) {
            $tanggal_event = strtotime(date('Y-m-d H:i', strtotime($value['Tanggal'].' '.$value['mulai'])));
            foreach (json_decode($value['peserta'], TRUE) as $k => $v) {
                $participant = $this->db->get_where('participants',['iduser' => $v, 'idevent' => $value['idevent'], 'status' => '0'])->row_array();
                if ($tanggal_skrg > $tanggal_event) {
                    $data = [
                        'iduser' => $participant['iduser'],
                        'idevent' => $value['idevent'],
                        'status' =>  '2'
                    ];
                    $this->db->update('participants', $data, ['iduser' => $participant['iduser'], 'idevent' => $participant['idevent']]);
                }
            }
        }

    }



    


}
