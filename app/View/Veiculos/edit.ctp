<!-- File: /app/View/Posts/edit.ctp -->

<h1>Atualizar Informacoes do Carro</h1>
<?php
echo $this->Form->create('Veiculo');
echo $this->Form->input('placa');
echo $this->Form->input('codCategoria');
echo $this->Form->input('fabricante');
echo $this->Form->input('marca');
echo $this->Form->input('ano');
echo $this->Form->input('modelo' );
echo $this->Form->input('codSede');
echo $this->Form->input('situacao' );
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar Carro');
?>