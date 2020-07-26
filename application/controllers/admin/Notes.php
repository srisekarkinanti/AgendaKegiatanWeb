<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("note_model");
        $this->load->model("event_model");
        $this->load->library('form_validation');
    }

    public function index()
    {  

        if ( !$this->session->userdata('user_logged')) {
            redirect('admin/login');
        }
            $note = $this->note_model;
        $validation = $this->form_validation;
        $validation->set_rules($note ->rules());

        if ($validation->run()) {
            $note ->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/notes/'));
        }

        $data["notes"] = $this->note_model->getAll();
        $data["topics"] = $this->note_model->getTopic();
        $this->template->set('title','Note List');
        $this->template->load('main','contents','admin/note/list',$data);
        // $this->load->view("admin/note/list", $data);
    }

    public function add()
    {
        $note = $this->note_model;
        $data['topic'] = $this->event_model->getTopic();
        $data['list_pegawai'] = $this->listPegawai();

        // echo "<pre>";
        // echo json_encode($data['topic']);
        // echo "</pre>";
        if ($this->input->post()) {
           $note->save();
           $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/notes/'));
        }
        $this->load->view('admin/note/add',$data);
        // $note = $this->note_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($note->rules());

        // if ($validation->run()) {
        //     $note->save();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        //     redirect(site_url('admin/notes/'));
        // }
        // $data["events"] = $this->event_model->getTopic();
        // $this->load->view("admin/note/list",$data);
    }

   public function edit($id = 0)
    {
        if (!isset($id)) redirect('admin/notes/');

        $note = $this->note_model;
        $validation = $this->form_validation;
        // $validation->set_rules($note->rules());

        // if ($validation->run()) {
            $note->update();
                $this->session->set_flashdata('success', 'Berhasil diupdate');
                redirect("admin/notes/index");
            
            
        // }

        // $data["note"] = $note->getById($id);
        // if (!$data["note"]) show_404();
        
        // $this->load->view("admin/note/list", $data);
    }

    public function detail($id){
        
      
        $note = $this->note_model;
        $data["notes"] = $note->getDetail($id);
        $data["topics"] = $this->note_model->getTopic();
        /*$data['peserta'] = $this->note_model->getPeserta($data["notes"]);*/
      
        // if (!$data["events"]) show_404();
        
        $this->load->view("admin/note/detail", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->note_model->delete($id)) {
            redirect(site_url('admin/notes'));
        }
    }

    protected function listPegawai(){
        return $this->db->get_where('users',['role' => 'pegawai'])->result_array();
    }
}
