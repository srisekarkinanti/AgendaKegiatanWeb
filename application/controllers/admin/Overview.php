<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("event_model");
		$this->load->model("note_model");
		$this->load->model("room_model");
		$this->load->model("participant_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
        // load view admin/overview.php 
		$data["event"] = $this->event_model->jumlah_event();
		$data["note"] = $this->note_model->jumlah_note();
		$data["room"] = $this->room_model->jumlah_room();
		$this->template->set('title','Agenda Kegiatan');	
        $this->template->load('main','contents','admin/overview', $data);
	}
}
