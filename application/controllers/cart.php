<?php

class cart extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('hello_model', 'bal');
	}

	public function index() {
 	$this->load->view('customer');
	}



	
}
