<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (check_role('user')) {
			$this->current_id = $this->session->login_id;
		}
	}

	public function index()
	{
		$this->dashboard();
	}

	public function dashboard()
	{
		load_view('user/dashboard', [
			'profile' => $this->db->get_where('login', ['login_id' => $this->session->login_id])->row(),
			]);
	}

	public function profil($action='edit')
	{
		if ($action == 'edit') {
			load_view('user/profil', [
				'data' => $this->db->from('login')
				->where(["login.login_id" => $this->current_id])
				->get()->row(),
			]);
		} else if ($action == 'update') {
			if (run_validation([
				['name', 'Nama', 'required'],
				['hp', 'HP', 'required'],
				['password', 'Password', $this->input->post('password') ? 'required' : ''],
				['passconf', 'Password Confirmation', $this->input->post('password') ? 'matches[password]' : '']
			])) {
				$data = get_post_updates(['name', 'hp']);
				control_file_upload($data, 'avatar', 'avatar',
					$this->db->get_where('login', ['login_id' => $this->current_id])->row()->avatar,
					'jpg|jpeg|png|bmp');
				$this->db->update('login', $data, ['login_id' => $this->current_id]);
				$login = get_post_updates(['password']);
				if (control_password_login($login)) {
					$this->db->update('login', $login, ['id_login' => $this->current_id]);
				}
				redirect_to_login(); // to update session caches
			} else {
				$this->profil();
			}
		}
	}

	public function dokumen($action='list', $id=0)
	{
		if ($action == 'list') {
			load_view('user/list/dokumen');
		} else if ($action == 'get') {
			load_json(ajax_table_driver('dokumen', ['login_id' => $this->current_id], ['dokumen_nama', 'dokumen_file']));
		} else {
			show_404();
		}
	}
}
