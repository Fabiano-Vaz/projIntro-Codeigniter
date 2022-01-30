<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function autenticar(){
		$this->load->model("usuarios_model");
		$email = $this->input->post('email');
		$senha = md5($this->input->post('senha'));

		$usuarios = $this->usuarios_model->logarUsuarios($email, $senha);
	
		if($usuarios){
			$this->session->set_userdata('usuario_logado', $usuarios);
			$this->session->set_flashdata('success', "Logado com sucesso!");
		}else{

			$this->session->set_flashdata('danger', "Usuário ou senha inválido!");

		}
		redirect(uri:'/');
	}

	public function logout(){
		$this->session->unset_userdata('usuario_logado');
		$this->session->set_flashdata('success', "Deslogado com sucesso!");
		redirect(uri:'/');
	}
}
