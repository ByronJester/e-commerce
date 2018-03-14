<?php

class home extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('hello_model', 'bal');
	}

	public function index() {
 	$this->load->view('home_p');
	}
/*
	public function edit_account(){

		$where = array('id' => $this->input->post('acc'));

		$data = array(
			'uid' => $this->input->post('uid'),
			'pwd' => $this->input->post('pwd'),
			'em' => $this->input->post('em')
			);

		$this->hello_model->edit_account($where, $data);


	}*/


	
}
