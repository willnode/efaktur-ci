<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		redirect('login');
	}

	public function login()
	{
		if (authenticate()) {
			redirect(issetor($this->input->get('redirect'), $this->session->role));
		} else {
			$this->load->view('static/header');
			$this->load->view('static/login');
			$this->load->view('static/footer');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect("login");
	}

	public function hash($password)
	{
		echo password_hash($password, PASSWORD_DEFAULT);
	}
}
