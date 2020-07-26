<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("room_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
         if ( !$this->session->userdata('user_logged')) {
            redirect('admin/login');
        }
        // $room = $this->room_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($room ->rules());

        // if ($validation->run()) {
        //     $room ->save();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        //     redirect(site_url('admin/rooms/'));
        // }

        $data["rooms"] = $this->room_model->getAll();
        $this->template->set('title','Room list');
        $this->template->load('main','contents','admin/room/list',$data);
        // $this->load->view("admin/room/list", $data);
    }

    public function add()
    {
        $room = $this->room_model; // objek model
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($room->rules()); // terapkan rules

        if ($validation->run()) { //melakukan validasi
            $room->save(); //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
            redirect(site_url('admin/rooms/'));
        }

        $this->load->view("admin/room/list"); 
    }

   public function edit($id = 0)
    {
        if (!isset($id)) redirect('admin/rooms/');
       
        $room = $this->room_model;
        $validation = $this->form_validation;
        $data['room'] = $room->getById($id);
        //$validation->set_rules($room->rules());

        //if ($validation->run()) {
                if ($this->input->post()) {
                   $room->update();
                $this->session->set_flashdata('success', 'Berhasil diupdate');
                redirect("admin/rooms/index");
                }

        //$data["room"] = $room->getById($id);
        //if (!$data["room"]) show_404();
        
        $this->load->view("admin/room/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->room_model->delete($id)) {
            redirect(site_url('admin/rooms'));
        }
    }
}
