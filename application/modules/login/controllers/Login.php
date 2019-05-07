<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

		function __construct()
	    {
	        parent::__construct();
					$this->load->model('Login_model');
	    }

		public function index()
		{
				$this->load->view('login/login/index');
		}

		public function login() {

				// create the data object
				$data = new stdClass();

				// set validation rules
				$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
				$this->form_validation->set_rules('password', 'Password', 'required');

				if ($this->form_validation->run() == false) {

					// validation not ok, send validation errors to the view
					$this->load->view('login/login/index');

				} else {
							// set variables from the form
							$username = $this->input->post('username');
							$password = $this->input->post('password');

							if ($this->login_model->resolve_user_login($username, $password)) {

								$user_id = $this->login_model->get_user_id_from_username($username);
								$user    = $this->login_model->get_user($user_id);

								// set session user datas
								$_SESSION['user_id']      = (int)$user->id;
								$_SESSION['username']     = (string)$user->username;
								$_SESSION['logged_in']    = (bool)true;
								$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
								$_SESSION['is_admin']     = (bool)$user->is_admin;

								// user login ok
								$this->load->view('header');
								$this->load->view('user/login/login_success', $data);
								$this->load->view('footer');

							} else {

								// login failed
								$data->error = 'Wrong username or password.';

								// send error to the view
								$this->load->view('login/login/index', $data);

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

				// create the data object
				$data = new stdClass();

				if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

					// remove session datas
					foreach ($_SESSION as $key => $value) {
						unset($_SESSION[$key]);
					}

					// user logout ok
					$this->load->view('login/login/index', $data);

				} else {

					// there user was not logged in, we cannot logged him out,
					// redirect him to site root
					redirect('/dashboard');

				}

		}
}
?>
