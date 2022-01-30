<?php
class Produtos_model extends CI_Model {
    public function buscaTodos(){
        return $this->db->get("produtos")->result_array();
    }

    public function salva($produto){
        $this->db->insert("produtos", $produto);
    }

    public function retorna($id){
        return $this->db->get_where("produtos", array(
            "id" => $id
            ))->row_array();
    }

    public function deletar_produto($id){
        $this->db->where('id', $id);
        $this->db->delete('produtos');
        return TRUE;
    }

    public function salvar(){
        $id = $this->input->post("id");

        $produto = array(
            "nome" => $this->input->post("nome"),
            "preco" => $this->input->post("preco"),
            "descricao" => $this->input->post("descricao")
        );

        $this->db->where('id', $id);
        return $this->db->update('produtos', $produto);
    }
}