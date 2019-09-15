<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
		private $table = 'sys_user';

		public function get_data_by($where) {
				foreach ($where as $key => $value) {
					$this->db->where($key, $value);
				}
				$this->db->where('status', '1');

				return $this->db->get($this->table);
		}
}
