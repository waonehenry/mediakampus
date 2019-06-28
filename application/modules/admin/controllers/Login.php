<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

		function __construct()
    {
        parent::__construct();
				$this->load->model('admin/Login_model');
    }

		public function index()
		{
				$this->load->view('admin/login/index');
		}

		public function login() {

				// create the data object
				$data = new stdClass();

				// set validation rules
				$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
				$this->form_validation->set_rules('password', 'Password', 'required');

				if ($this->form_validation->run() == false) {

					// validation not ok, send validation errors to the view
					$this->load->view('admin/login/index');

				} else {
							// set variables from the form
							$key['username'] = $this->input->post('username');
							$key['password'] = md5($this->input->post('password'));

							$check = $this->Login_model->get_data_by($key);

							if ($check->num_rows() > 0) {

								$data = $check->row_array();
								$data['login'] = TRUE;
								$this->session->set_userdata($data);

								redirect('home/dashboard');

							} else {

								// login failed
								$data->error = 'Wrong username or password.';

								// send error to the view
								$this->load->view('admin/login/index', $data);

							}
					}
		}

		/**
	 * logout function.
	 *
	 * @access public
	 * @return void
	 */
		public function logout() {
				$this->session->sess_destroy();

				redirect('admin/login');
		}
}
?>
