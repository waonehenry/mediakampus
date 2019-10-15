<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MX_Controller {

	function __construct()
    {
				parent::__construct();
				if ($this->session->userdata('login') == TRUE) {
							$this->user_id = $this->session->userdata('id');
				} else {
						redirect('admin/login/login');
				}
				$this->load->model('Group_model');
				$this->load->model('Modul_model');
				$this->load->model('Menu_model');
				$this->load->model('Role_model');
    }

	public function index()
	{
			$data['page'] = 'roles/group/index';
			$data['title'] = 'Group';
			$data['modul'] = 'Roles';
			$data['role'] = '';

			$this->view($data);
	}

	public function store()
	{
			$data = $this->input->post('data');
			$data['create_time'] = date('Y-m-d H:i:s');
			$data['user_id'] = $this->user_id;

			$result = $this->Group_model->insert($data);
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
			$where['id'] = $id;
			$data = $this->Group_model->get_data_by($where)->row_array();

			echo json_encode($data);
	}

	public function update($id)
	{
			$data = $this->input->post('data');
			$data['update_time'] = date('Y-m-d H:i:s');
			$data['user_id'] = $this->user_id;

			$result = $this->Group_model->update($data, $id);
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

	public function delete($id)
	{
			$data['status'] = '0';
			$data['delete_time'] = date('Y-m-d H:i:s');
			$data['user_id'] = '1';

			$result = $this->Group_model->delete($data, $id);
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
      $list = $this->Group_model->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $field) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $field->name;
          $row[] = $field->description;
					$row[] = '<div class="btn-group pull-right">
							<button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Tools
									<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
									<li>
											<a href="'.base_url().'roles/group/edit/'.$field->id.'" class="btn-edit">
													<i class="fa fa-pencil"></i> Edit </a>
									</li>
									<li>
											<a href="'.base_url().'roles/group/delete/'.$field->id.'" class="btn-delete">
													<b>X</b> Delete </a>
									</li>
									<li>
											<a href="'.base_url().'roles/group/role/'.$field->id.'" class="btn-role">
													<i class="fa fa-list"></i> Role </a>
									</li>
							</ul>
					</div>';
          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->Group_model->count_all(),
                      "recordsFiltered" => $this->Group_model->count_filtered(),
                      "data" => $data,
              );

      echo json_encode($output);
  }

	public function search()
	{
			// code here
	}

	public function role($group_id)
	{
			$data['page'] = 'roles/group/index_2';
			$data['title'] = 'Detail';
			$data['modul'] = 'Roles';
			$data['modul_list'] = $this->Modul_model->get_data();
			$data['menu_list'] = $this->Menu_model->get_data();
			$data['roles'] = $this->Role_model->get_data_by(array('group_id' => $group_id));
			$data['role'] = '';
			$data['group_id'] = $group_id;

			$this->view($data);
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
