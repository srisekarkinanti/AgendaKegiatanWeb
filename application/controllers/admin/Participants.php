<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Participants extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("participant_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
         if ( !$this->session->userdata('user_logged')) {
            redirect('admin/login');
        }
        $participant = $this->participant_model;
        $validation = $this->form_validation;
        $validation->set_rules($participant ->rules());

        if ($validation->run()) {
            $participant ->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/participants/'));
        }

        $data["participants"] = $this->participant_model->getAll();
        $this->template->set('title','Participant List');
        $this->template->load('main','contents','admin/participants/index',$data);
        // $this->load->view("admin/participants/index", $data);
    }

    public function add()
    {
        $participant = $this->participant_model;
        $validation = $this->form_validation;
        $validation->set_rules($participant->rules());

        if ($validation->run()) {
            $participant->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/participants/'));
        }

        $this->load->view("admin/participant/index");
    }

     public function edit($id = 0)
    {
        if (!isset($id)) redirect('admin/participants/');

        $participant = $this->partipant_model;
        $validation = $this->form_validation;
        // $validation->set_rules($note->rules());

        // if ($validation->run()) {
            $note->update();
                $this->session->set_flashdata('success', 'Berhasil diupdate');
                redirect("admin/participants/index");
            
            
        // }

        // $data["note"] = $note->getById($id);
        // if (!$data["note"]) show_404();
        
        // $this->load->view("admin/note/list", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->participant_model->delete($id)) {
            redirect(site_url('admin/participants'));
        }
    }
}

