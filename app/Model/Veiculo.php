<?php
class Veiculo extends AppModel {
	public $validate = array(
        'placa' => array(
            'rule' => 'notEmpty'
        ),
        'codCategoria' => array(
            'rule' => 'notEmpty'
        ),
        'fabricante' => array(
            'rule' => 'notEmpty'
        ),
        'marca' => array(
            'rule' => 'notEmpty'
        ),
        'ano' => array(
            'rule' => 'notEmpty'
        ),
        'modelo' => array(
            'rule' => 'notEmpty'
        ),
        'codSede' => array(
            'rule' => 'notEmpty'
        ),
        'situacao' => array(
            'rule' => 'notEmpty'
        ),
    );
}
?>