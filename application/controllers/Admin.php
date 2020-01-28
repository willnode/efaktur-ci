<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->role !== 'admin') {
			redirect('login');
		} else {
			$this->current_id = $this->session->id_admin;
		}
	}

	public function index()
	{
		$this->dashboard();
	}

	public function dashboard()
	{
		load_view('admin/dashboard', [
			'profile' => $this->db->get_where('admin', ['id_admin' => $this->current_id])->row(),
		]);
	}

	public function user($action='list', $id=0)
	{
		if ($action == 'list') {
			load_view('admin/list/user');
		} else if ($action == 'get') {
			load_json(ajax_table_driver('user', [], ['name_user', 'email_user']));
		} else if ($action == 'create') {
			load_view('admin/edit/user', [
				'data' => (object)[
					'id_user' => 0,
					'name_user' => '',
					'email_user' => '',
					'username' => '',
					'password' => '',
				]
			]);
		} else if ($action == 'edit') {
			load_view('admin/edit/user', [
				'data' => $this->db->from('login')
					->where(["login.id_login" => $id])
					->get()->row(),
			]);
		} else if ($action == 'delete') {
			$this->db->delete('login', ['id_login' => $id]);
			redirect('admin/user/');
		} else if ($action == 'update') {
			if (run_validation([
				['name', 'Nama', 'required'],
				['hp', 'HP', 'required'],
				['username', 'Username', 'required|min_length[3]'],
				['password', 'Password', $id == 0 ? 'required' : '']
			])) {
				$data = get_post_updates(['name', 'hp', 'username', 'password']);
				if (isset($data['password']))
					$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
				if ($id == 0) {
					$this->db->insert('login', $data);
				} else {
					$this->db->update('login', $data, ['id_login' => $id]);
				}
				redirect('admin/user/');
			} else {
				$this->user($id == 0 ? 'create' : 'edit', $id);
			}
		}
	}
}
