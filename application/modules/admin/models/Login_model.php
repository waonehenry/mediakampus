<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
		private $table = 'sys_user';

		public function get_data_by($where) {
				$this->db->select($this->table.'.*');
				$this->db->select('tb_person.name as person');
				$this->db->join('tb_person', 'tb_person.id = '.$this->table.'.profile_id');
				foreach ($where as $key => $value) {
					$this->db->where($key, $value);
				}
				$this->db->where($this->table.'.status', '1');

				return $this->db->get($this->table);
		}
}
