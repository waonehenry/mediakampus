<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model {
		private $table = 'tb_agenda';
    var $column_order = array(null, 'id'); //set column field database for datatable orderable
    var $column_search = array('title', 'description'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order

		public function insert($data) {

			return $this->db->insert($this->table, $data);
		}

		public function update($data, $id) {
			$this->db->where('id', $id);

			return $this->db->update($this->table, $data);
		}

		public function delete($data, $id) {
			$this->db->where('id', $id);

			return $this->db->update($this->table, $data);
		}

		public function get_data() {
			$this->db->where('status', '1');

			return $this->db->get($this->table);
		}

		public function get_data_by($where)
		{
				$this->db->where('status', '1');
				foreach ($where as $key => $value) {
					$this->db->where($key, $value);
				}

				return $this->db->get($this->table);
		}

		private function _get_datatables_query($type)
    {
				$this->db->where('type', $type);
				$this->db->where('status', '1');
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($type)
    {
        $this->_get_datatables_query($type);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($type)
    {
        $this->_get_datatables_query($type);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($type)
    {
				$this->db->where('type', $type);
    		$this->db->where('status', '1');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
