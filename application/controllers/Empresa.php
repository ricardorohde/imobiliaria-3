<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class Empresa extends MY_Controller {	
	public function __construct(){
		parent::__construct();
		$this->load->model('Imovel_model', 'ObjImovel');
		$this->load->model('Quarto_model', 'ObjQuarto');
		$this->load->model('Tipo_model', 'ObjTipo');
		$this->load->model('Opcao_model', 'ObjOpcao');
		$this->load->model('Finalidade_model', 'ObjFinalidade');
		$this->load->model('Vaga_model', 'ObjVaga');
		$this->load->model('Setor_model', 'ObjSetor');	
	}
	public function index()
	{	
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Imobiliaria',
			'descricao' => 'Imobiliaria',
			'palavras_chave' => 'Imobiliaria',	
		);	
		$dados['opcoes']		= $this->ObjOpcao->listar();
		$dados['finalidade']	= $this->ObjFinalidade->listar();
		$dados['tipos']			= $this->ObjTipo->listar();
		$dados['cidades']		= $this->ObjImovel->cidade_imovel_distinct();
		$dados['quartos']		= $this->ObjQuarto->listar();	
		

		$this->load->view('view_header_html', $dados_header);
      	$this->load->view('view_menu_topo',$dados); 
      	$this->load->view('view_banner_busca');
      	$this->load->view('view_quem_somos'); 
      	$this->load->view('view_rodape'); 
      	$this->load->view('view_footer_html');
	}

}