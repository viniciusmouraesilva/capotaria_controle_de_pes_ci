<?php
defined('BASEPATH') OR exit('Não foi possível carregar a base do script');

class PeSofa_model extends CI_Model {

	public function save($dados) {

		$this->db->insert('pe', $dados);
		
		if($this->db->count_all_results() == 1) {
			return true;
		}else {
			return false;
		}
	}
	
	public function select() {
	
		$this->db->select('*');
		$this->db->from('pe');
		$resu = $this->db->get()->result();
		
		return $resu;
	}
}