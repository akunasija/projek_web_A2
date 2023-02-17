<?php

class Auth extends CI_Controller
{
	public function index()
	{
		show_404();
	}

	public function login()
	{
		$this->load->model('auth_model');
		if ($this->auth_model->current_user()) {
			redirect(base_url('menu'));
		}
		$this->load->library('form_validation');

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('v_login');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->auth_model->login($username, $password)) {
			redirect(base_url('menu'));
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}

		$this->load->view('v_login');
	}

	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(base_url('auth/login'));
	}
}
