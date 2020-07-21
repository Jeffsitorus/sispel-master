<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['judul'] = 'Homepage';
		$this->load->view('templates/home_templates/header',$data);
		$this->load->view('homepage');
		$this->load->view('templates/home_templates/footer');
	}
}
