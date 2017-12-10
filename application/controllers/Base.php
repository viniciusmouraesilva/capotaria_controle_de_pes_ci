<?php
defined('BASEPATH') OR exit('Não foi possível carregar o script');

class Base extends CI_Controller {

	public function index() {
		
		if(isset($_COOKIE['salvou_imagem'])) {
			$data['mensagem'] = htmlentities($_COOKIE['salvou_imagem'], ENT_QUOTES);
			setcookie('salvou_imagem');
		}
		
		$data['erros'] = '';
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('cor_tecido','Cor tecido','trim|required|min_length[3]',array('min_length'=>'A cor do tecido precisa ter no minímo 3 caracteres.','required'=>'A cor do tecido é obrigatório'));
		$this->form_validation->set_rules('descricao','Descricao','trim|required|min_length[10]',array('min_length'=>'A descricao precisa ter no minímo 10 caracteres.','required'=>'Você precisa de uma descrição'));
		
		if($this->form_validation->run() == false) {
			$data['erros'] = validation_errors();
		}else{
			
			$resu = $this->upload();
			
			if($resu) {
				
				$this->load->model('PeSofa_model','PeSofa');

				$dados['cor_tecido'] = $this->input->post('cor_tecido');
				$dados['descricao'] = $this->input->post('descricao');
				$dados['imagem'] = $resu['orig_name'];
				
				$salvou = $this->PeSofa->save($dados);
				
				if($salvou) {
					setcookie('salvou_imagem','Pé de sofá salvo com sucesso');
					redirect();
				}else {
					$data['banco'] = 'Não foi possível salvar dados no banco.';
				}
			}else {
				$data['imagem'] = "Não foi possível salvar a sua imagem.". $this->upload->display_errors();
			}
		}
		
		$data['pes'] = $this->buscarPes();
			
		$this->load->view('home',$data);
	}
	
	public function upload() {
		
		$this->load->library('upload');
		
		$config['upload_path'] = 'assets/imagens_pes/';
		$config['allowed_types'] = 'jpg|png';
		$config['overwrite'] = false;
		$config['max_size'] = 2000;
		$config['detect_mime'] = true;
		
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('imagem')) {
			return $this->upload->data();
		}else {
			return '';
		}
	}
	
	public function buscarPes() {
		
		$this->load->model('PeSofa_model','PeSofa');
		
		return $resu = $this->PeSofa->select();
	}
}