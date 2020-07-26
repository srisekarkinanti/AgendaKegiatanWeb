<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Topics extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("topic_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
         if ( !$this->session->userdata('user_logged')) {
            redirect('admin/login');
        }
        $topic = $this->topic_model;
        $validation = $this->form_validation;
        $validation->set_rules($topic ->rules());

        if ($validation->run()) {
            $topic ->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/topics/'));
        }

        $data["topics"] = $this->topic_model->getAll();
        $this->template->set('title','Topic List');
        $this->template->load('main','contents','admin/topic/list',$data);
        // $this->load->view("admin/topic/list", $data
    }

    public function add()
    {
        $topic = $this->topic_model;
        $validation = $this->form_validation;
        $validation->set_rules($topic->rules());

        if ($validation->run()) {
            $topic->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/topics/'));
        }

        $this->load->view("admin/topic/list");
    }

    public function edit($id = 0)
    {
        if (!isset($id)) redirect('admin/topics/');
       
        $topic = $this->topic_model;
        $validation = $this->form_validation;
        $validation->set_rules($topic->rules());

        if ($validation->run()) {
            $topic->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect(site_url('admin/topics/'));
        }

        $data["topic"] = $topic->getById($id);
        if (!$data["topic"]) show_404();
        
        $this->load->view("admin/topic/list", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->topic_model->delete($id)) {
            redirect(site_url('admin/topics'));
        }
    }
}
