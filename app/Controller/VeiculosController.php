<?php
class VeiculosController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('veiculos', $this->Veiculo->find('all'));
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Veiculo Invalido'));
		}

		$veiculo = $this->Veiculo->findById($id);
		if (!$veiculo) {
			throw new NotFoundException(__('Veiculo Invalido'));
		}
		$this->set('veiculo', $veiculo);
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->Veiculo->create();
			if ($this->Veiculo->save($this->request->data)) {
				$this->Session->setFlash(__('Veiculo Cadastrado com Sucesso.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Nao foi possivel cadastrar seu veiculo.'));
		}
	}
	
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Veiculo Invalido'));
		}

		$veiculo = $this->Veiculo->findById($id);
		if (!$veiculo) {
			throw new NotFoundException(__('Veiculo Invalido'));
		}

		if ($this->request->is(array('veiculo', 'put'))) {
			echo $this->request;
			$this->Veiculo->id = $id;
			if ($this->Veiculo->save($this->request->data)) {
				$this->Session->setFlash(__('As informacoes do veiculo foram atualizadas com sucesso.'));				
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Nao foi possivel atualizar as informacoes do veiculo..'));
		}

		if (!$this->request->data) {
			$this->request->data = $veiculo;
		}				
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Veiculo->delete($id)) {
			$this->Session->setFlash(
				__('O veiculo de id: %s foi retirado do sistema.', h($id))
				);
			return $this->redirect(array('action' => 'index'));
		}
	}
	public function search(){

		$veiculo = null;
		if ($this->request->is('post')) {	
			$placa = $this->request->data['Veiculo']['placa']; 

			$veiculo = $this->Veiculo->find('first', array(
				'conditions' => array('Veiculo.placa' => $placa)));        	

//			if ($veiculo==null) {
//				echo "Placa não encontrada";
//			}		
			if ($veiculo==null) {
				$this->Session->setFlash(
						__('Não foi encontrado veiculo com placa: %s', h($placa))
						);
				return $this->redirect(array('action' => 'index'));
			}	
			else{
				$id = $veiculo['Veiculo']['id'];
				if ($this->Veiculo->delete($id)) {
					$this->Session->setFlash(
						__('O veiculo de placa: %s foi posto a venda, e retirado do sistema.', h($placa))
						);
					return $this->redirect(array('action' => 'index'));
				}
			}	



		}
	}
}
?>