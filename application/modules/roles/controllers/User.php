<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

	function __construct()
    {
				parent::__construct();
				if ($this->session->userdata('login') == TRUE) {
							$this->user_id = $this->session->userdata('id');
				} else {
						redirect('admin/login/login');
				}
				$this->load->model('User_model');
				$this->load->model('Group_model');
				$this->load->model('masterdata/State_model');
				$this->load->model('register/Thesis_register_model');
				$this->load->model('register/Thesis_register_detail_model');
				$this->load->model('register/Person_model');
    }

	public function index()
	{
			$data['page'] = 'roles/user/index';
			$data['title'] = 'User';
			$data['group'] = $this->Group_model->get_data();
			$data['person'] = $this->Person_model->get_data();
			$data['modul'] = 'Roles';
			$data['role'] = '';

			$this->view($data);
	}

	public function store()
	{
			$data = $this->input->post('data');
			$data['user_id'] = $this->user_id;
			$data['password'] = md5('febi2019oke!'.$data['password']);

			$result = $this->User_model->insert($data);
			if ($result)
			{
				$response['status'] = 'success';
				$response['message'] = 'Congrulation! Data has been saved.';
			}
			else
			{
				$response['status'] = 'danger';
				$response['message'] = 'Sorry! Data has not been saved.';
			}

			echo json_encode($response);
	}

	public function edit($id)
	{
			$where['sys_user.id'] = $id;
			$data = $this->User_model->get_data_by($where)->row_array();

			echo json_encode($data);
	}

	public function profile($id)
	{
			$where['id'] = $id;
			$data['profile'] = $this->User_model->get_data_by($where)->row_array();

			$data['page'] = 'roles/user/index_2';
			$data['title'] = 'Profile';
			$data['modul'] = 'User';

			$this->view($data);
	}

	// $id is profile id
	public function history($id)
	{
			$where['id'] = $id;
			$data['profile'] = $this->Person_model->get_data_by($where)->row_array();

			$thesis_register = $this->Thesis_register_model->get_data_by(array('profile_id' => $id))->row_array();
			$data['history'] = $this->Thesis_register_detail_model->get_data_by(array('thesis_register_id' => $thesis_register['id']));

			$data['page'] = 'roles/user/index_3';
			$data['title'] = 'History';
			$data['modul'] = 'User';

			$progress = round((($this->Thesis_register_detail_model->count_progress($thesis_register['id'])/$this->State_model->count_all()) * 100), 2);
			$data['progress'] = $progress;

			$this->view($data);
	}

	public function update($id)
	{
			$data = $this->input->post('data');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = $this->user_id;

			if (isset($data['new_password'])) {
					if ($data['new_password'] != $data['confirm_password']) {
							$response['status'] = 'danger';
							$response['message'] = 'Sorry! Wrong confrim password.';

							echo json_encode($response);
							die();
					} else {
						 $where['id'] = $id;
						 $where['password'] = md5('febi2019oke!'.$data['password']);

						 $check = $this->User_model->get_data_by($where);
						 if ($check->num_rows() > 0) {
							 	 $password['password'] = md5('febi2019oke!'.$data['new_password']);
								 $password['updated_at'] = date('Y-m-d H:i:s');
					 			 $password['user_id'] = $this->user_id;
								 $result = $this->User_model->update($password, $id);
								 if ($result)
								 {
									 $response['status'] = 'success';
									 $response['message'] = 'Congrulation! Data has been updated.';
								 }
								 else
								 {
									 $response['status'] = 'danger';
									 $response['message'] = 'Sorry! Data has not been updated.';
								 }

								 echo json_encode($response);
								 die();
						 } else {
								 $response['status'] = 'danger';
								 $response['message'] = 'Sorry! Old password is not match.';

								 echo json_encode($response);
								 die();
						 }
					}
			}
			unset($data['password']);

			$result = $this->User_model->update($data, $id);
			if ($result)
			{
				$response['status'] = 'success';
				$response['message'] = 'Congrulation! Data has been updated.';
			}
			else
			{
				$response['status'] = 'danger';
				$response['message'] = 'Sorry! Data has not been updated.';
			}

			echo json_encode($response);
	}

	public function reset_pswd($id)
	{
			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = $this->user_id;
			$data['password'] = md5('febi2019oke!12345678');

			$result = $this->User_model->update($data, $id);
			if ($result)
			{
				$response['status'] = 'success';
				$response['message'] = 'Congrulation! Password has been reset.';
			}
			else
			{
				$response['status'] = 'danger';
				$response['message'] = 'Sorry! Password failed to reset.';
			}

			echo json_encode($response);
	}

	public function delete($id)
	{
			$data['status'] = '0';
			$data['deleted_at'] = date('Y-m-d H:i:s');
			$data['user_id'] = '1';

			$result = $this->User_model->delete($data, $id);
			if ($result)
			{
				$response['status'] = 'success';
				$response['message'] = 'Congrulation! Data has been removed.';
			}
			else
			{
				$response['status'] = 'danger';
				$response['message'] = 'Sorry! Data has not been removed.';
			}

			echo json_encode($response);
	}

	//server side list
	public function server_side_list()
  {
      $list = $this->User_model->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $field) {
          $no++;
          $row = array();
          $row[] = $no;
					$row[] = $field->person;
					$row[] = $field->username;
          $row[] = $field->group;
					$row[] = '<div class="btn-group">
							<button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Tools
									<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
									<li>
											<a href="'.base_url().'roles/user/edit/'.$field->id.'" class="btn-edit">
													<i class="fa fa-pencil"></i> Edit </a>
									</li>
									<li>
											<a href="'.base_url().'roles/user/reset_pswd/'.$field->id.'" class="btn-reset-password">
													<i class="fa fa-refresh"></i> Reset Pswd </a>
									</li>
									<li>
											<a href="'.base_url().'roles/user/delete/'.$field->id.'" class="btn-delete">
													<b>X</b> Delete </a>
									</li>
							</ul>
					</div>';
          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->User_model->count_all(),
                      "recordsFiltered" => $this->User_model->count_filtered(),
                      "data" => $data,
              );

      echo json_encode($output);
  }

	public function search()
	{
			// code here
	}

	public function view($data)
	{
			// $data['menu'] = $this->menu_management->core();

			$this->load->view('home/layout/head', $data);
			$this->load->view('home/layout/menu');
			$this->load->view($data['page'], $data);
			$this->load->view('home/layout/foot');
	}
}
?>
