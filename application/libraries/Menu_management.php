<?php
	if (!defined('BASEPATH'))
    	exit('No direct script access allowed');

class Menu_management {

	public function core($id_user_group=''){
				$menu_all = $this->get_menu_all();
				$menu_parent = $this->get_menu_parent();
				$menu_child = $this->get_menu_child();

				$html_modul ='';
				foreach ($menu_all as $rows) {
					$menu[$rows->modul_id][$rows->id]='<li aria-haspopup="true" class=" "><a href="'.base_url().$rows->url_menu.'" class="nav-link  "><span class="glyphicon glyphicon-arrow-right"></span> '.$rows->label_menu.'</a></li>';
				}

				foreach ($menu_parent as $key) {
					$html_modul .= '<li class="'.$key->class.' menu-dropdown classic-menu-dropdown"><a href="javascript:;"><span class="arrow">'.$key->label_modul.'</span></a>';
					$id=$key->id;
					$html_modul .= '<ul class="dropdown-menu pull-left">';
					foreach ($menu_child as $key2) {
						if (isset($menu[$id][$key2->id])){
							$html_modul .= $menu[$id][$key2->id];
						}
					}
					$html_modul .= '</ul></li>';
				}

        return $html_modul;
    }

		function get_menu_all(){
				$CI = & get_instance();
				$CI->db->select('mo.*, me.*');
				$CI->db->join('sys_menu me', 'me.modul_id = mo.id');
				// $CI->db->join('sys_group gr', 'gr.id_menu = me.id');
				// $CI->db->join('tb_institusi ins', 'ins.levelinstitusi=gr.level');
				$query = $CI->db->get('sys_modul mo');

				return $query->result();
		}

		function get_menu_child(){
				$CI = & get_instance();
				$CI->db->select('*');
				$CI->db->where('status','1');
				$query = $CI->db->get('sys_menu');

				return $query->result();
		}

		function get_menu_parent(){
				$CI = & get_instance();
				$CI->db->distinct();
				$CI->db->select('mo.id,mo.label_modul,mo.class,mo.status');
				$CI->db->join('sys_menu me', 'me.modul_id = mo.id');
				// $CI->db->join('sys_group gr', 'gr.id_menu = me.id');
				// $CI->db->join('tb_institusi ins', 'ins.levelinstitusi=gr.level');
				$CI->db->where('mo.status', '1');
				$query = $CI->db->get('sys_modul mo');

				return $query->result();
		}
}
