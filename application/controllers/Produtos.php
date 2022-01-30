<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller
{

	public function index()
	{
		$this->load->model("Produtos_model");
		$lista = $this->Produtos_model->buscaTodos();
		$dados = array("produtos" => $lista);

		$this->load->view("templates/header", $dados);
		$this->load->view("templates/nav-top", $dados);
		$this->load->view("produtos/index", $dados);
		$this->load->view("templates/footer", $dados);
		$this->load->view("templates/js", $dados);
	}

	public function formulario()
	{

		$this->load->view("templates/header");
		$this->load->view("templates/nav-top");
		$this->load->view("produtos/formulario");
		$this->load->view("templates/footer");
		$this->load->view("templates/js");
	}

	public function novo()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("nome", "nome", "required|min_length[4]");
		$this->form_validation->set_rules("descricao", "descricao", "required");
		$this->form_validation->set_rules("preco", "preco", "required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");

		$sucesso = $this->form_validation->run();

		if ($sucesso) {

			$usuarioId = $this->session->userdata("usuario_logado");
			$produto = array(
				"nome" => $this->input->post("nome"),
				"preco" => $this->input->post("preco"),
				"descricao" => $this->input->post("descricao"),
				"usuario_id" => $usuarioId['id']
			);

			$this->load->model("produtos_model");
			$this->produtos_model->salva($produto);
			$this->session->set_flashdata("success", "Produtos Cadastrados com sucesso");
			redirect(uri: "/");

		} else {
			$this->load->view("templates/header");
			$this->load->view("templates/nav-top");
			$this->load->view("produtos/formulario");
			$this->load->view("templates/footer");
			$this->load->view("templates/js");
		}
	}

	public function detalhe(){
		$id = $this->input->get("id");
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->retorna($id);
		$dados = array("produto" => $produto);

		$this->load->view("templates/header");
		$this->load->view("templates/nav-top");
		$this->load->view("produtos/detalhe", $dados);
		$this->load->view("templates/footer");
		$this->load->view("templates/js");

	}

	public function delete($id) {
		$this->load->model("produtos_model");
		$this->produtos_model->deletar_produto($id);
		$this->session->set_flashdata('success', 'Produto deletado com sucesso!');
		redirect('/');
	}

	public function editar() {
		$id = $this->input->get("id");
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->retorna($id);
		$dados = array("produto" => $produto);

		$this->load->view("templates/header");
		$this->load->view("templates/nav-top");
		$this->load->view("produtos/editar", $dados);
		$this->load->view("templates/footer");
		$this->load->view("templates/js");
	}

	public function salvar($id){
		$this->load->model("produtos_model");
		$this->produtos_model->salvar($id);

		$this->session->set_flashdata("success", "Produto Alterado!");
		redirect('/');
	}
}
