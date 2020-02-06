<?php

function issetor(&$var, $default = false) {
    return isset($var) ? $var : $default;
}

function run_validation($config = []) {
	$ci = &get_instance();
	$ci->load->library('form_validation');
	foreach ($config as $conf) {
		$ci->form_validation->set_rules($conf[0], $conf[1], $conf[2]);
	}
	return $ci->form_validation->run();
}

function get_post_updates($vars = [], $default = []) {
	$ci = &get_instance();
	$updates = $default;
	foreach ($vars as $var) {
		if ($ci->input->post($var)) {
			$updates[$var] = $ci->input->post($var);
		}
	}
	return $updates;
}

function get_default_values($table) {
	$fields = get_instance()->db->list_fields($table);
	$values = [];
	foreach ($fields as $f) {
		$values[$f] = $f === $table.'_id' ? 0 : '';
	}
	return $values;
}

function control_file_delete($folder, $existing_value = '')
{
	$existing_file = "./uploads/$folder/$existing_value";
	if (is_file($existing_file)) {
		unlink($existing_file);
	}
}

function control_file_upload(&$updates, $name, $folder, $existing_value = '', $types = '*')
{
	$ci = &get_instance();
    if (is_uploaded_file($_FILES[$name]['tmp_name'])) {
        if (!is_dir("./uploads/$folder/")) {
            mkdir("./uploads/$folder/", 0777, true);
        }
        $ci->upload->initialize([
            'upload_path' => "./uploads/$folder/",
            'allowed_types' => $types
        ]);
        if ($ci->upload->do_upload($name)) {
			$updates[$name] = $ci->upload->file_name;
			control_file_delete($folder, $existing_value);
		}
    } elseif ($ci->input->post($name.'_delete')) {
		$updates[$name] = '';
		control_file_delete($folder, $existing_value);
	}
}

function control_password_update(&$updates, $field = 'password') {
	if (isset($updates[$field]) && !empty($updates[$field])) {
		$updates['password'] = password_hash($updates['password'], PASSWORD_BCRYPT);
		return TRUE;
	}
	return FALSE;
}

function set_error($str) {
	$ci = &get_instance();
	if (!empty($str)) {
		$ci->session->set_flashdata('error', $str);
		return TRUE;
	}
	return FALSE;
}

function set_message($str) {
	$ci = &get_instance();
	if (!empty($str)) {
		$ci->session->set_flashdata('message', $str);
		return TRUE;
	}
	return FALSE;
}

function catch_db_error() {
	$ci = &get_instance();
	$ci->db->db_debug = FALSE;
	error_reporting(0);
}

function check_db_error() {
	$ci = &get_instance();
	return set_error($ci->db->error()['message']);
}

function check_role($role) {
	$ci = &get_instance();
	if ($ci->session->role === $role) {
		return TRUE;
	} elseif ($ci->session->last_login_username === NULL) {
		redirect_to_login();
	} else {
		show_401();
	}
}

function show_401() {
	header("HTTP/1.1 401 Unauthorized");
	exit;
}

function load_json($data) {
	header('Content-Type: application/json');
	echo json_encode($data);
}

function load_view($mainview, $data = []) {
	$ci = &get_instance();
	if (isset($_GET['debug']) && ENVIRONMENT !== 'production') {
		load_json($data);
	} else {
		$ci->load->view('widget/header', $_SESSION);
		$ci->load->view($mainview, $data);
		$ci->load->view('widget/footer');
		$ci->session->unset_userdata('error');
	}
}

function get_id_login($table, $id_in_table) {
	$ci = &get_instance();
	return $ci->db->get_where($table, ["id_$table" => $id_in_table])->row()->id_login;
}

function rupiah($angka){
	return "Rp " . number_format($angka,2,',','.');
}

function ajax_table_driver($table, $filter = [], $searchable_columns = [], $select = '*') {
	$ci = &get_instance();
	$cursor = $ci->db->select($select)->from($table)->where($filter);
	$totalNotFiltered = $cursor->count_all_results('', FALSE);
	$search = $ci->input->get('search');
	$limit = $ci->input->get('limit');
	$offset = $ci->input->get('offset');
	if ($search && count($searchable_columns) > 0) {
		$cursor->group_start();
		foreach ($searchable_columns as $col) {
			$cursor->or_like($col, $search);
		}
		$cursor->group_end();
		$cursor->offset($ci->input->get('offset'));
		$total = $cursor->count_all_results('', FALSE);
	} else {
		$total = $totalNotFiltered;
	}

	if ($limit) $cursor->limit($limit);
	if ($offset) $cursor->offset($offset);

	return [
		'total' => $total,
		'totalNotFiltered' => $totalNotFiltered,
		'rows' => $cursor->get()->result()
	];
}

function redirect_to_login() {
	redirect('login?redirect='.urlencode(current_url()));
}
function authenticate(
	$table = 'login',
	$table_usernames = ['username'],
	$table_password_hash = 'password',
	$post_username = 'username',
	$post_password = 'password',
	$session_vars = ['login_id', 'username', 'name', 'role', 'avatar']
	) {

	$ci = &get_instance();

	if ($ci->input->method() === 'post') {
		if (!run_validation([
			[$post_username, 'Username', 'required'],
			[$post_password, 'Password', 'required'],
		])) {
			return FALSE;
		} else {
			$username = $ci->input->post($post_username);
			$password = $ci->input->post($post_password);
		}
	} else {
		$username = $ci->session->userdata('last_login_username');
		$password = $ci->session->userdata('last_login_password');
		if ($username === NULL) return FALSE;
	}

	$where = [];
	foreach ($table_usernames as $uname) {
		$where[$uname] = $username;
	}
	$login = $ci->db->from($table)->where($where)->limit(1)->get();
	$result = $login->result();
	if (count( $result ) > 0 && password_verify($password, $result[0]->{$table_password_hash})) {
		$user = $result[0];
		foreach ($session_vars as $var) {
			$ci->session->{$var} = $user->{$var};
		}
		$ci->session->set_userdata('last_login_username', $username);
		$ci->session->set_userdata('last_login_password', $password);
		return TRUE;
	} else {
		return FALSE;
	}
}