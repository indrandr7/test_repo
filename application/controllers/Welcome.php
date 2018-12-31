<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mwelcome', 'modelku');
		// $this->load->model('model_data');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getUsers(){
    $tabel = 'USERINFO';
    $urutan = 'Name';

    $data_user = $this->modelku->get_all();

    foreach ($data_user->result() as $key => $value) {
      echo "IDPengguna: ".$value->USERID.", ID Mesin: ".$value->Badgenumber.", Nama Lengkap: ".$value->Name."<br />";
    }
  }

	public function getUserOne(){
		$data_user = $this->modelku->get_userone()->row();

	}

	public function get_checkinout(){
		$userid = '7400';
		$data = $this->modelku->get_checkinout($userid)->result();
		
		foreach ($data as $key => $value) {
			echo "USERID: ".$value->USERID.", Nama: ".$value->Name.", Waktu: ".$value->CHECKTIME.", Type: ".$value->CHECKTYPE."<br />";
		}
	}
}
