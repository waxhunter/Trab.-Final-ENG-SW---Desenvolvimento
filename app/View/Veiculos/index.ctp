<!-- File: /app/View/Posts/index.ctp -->

<h1>Veiculos</h1>
<p><?php echo $this->Html->link('Add Veiculo', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Modelo</th>
        <th>Placa</th>
       <!--  <th>CodCategoria</th>
        <th>Fabricante</th>
        <th>Marca</th>
        <th>Ano</th>        
        <th>CodSede</th>
        <th>Situacao</th> -->
    </tr>

<!-- Here's where we loop through our $veiculos array, printing out post info -->

    <?php foreach ($veiculos as $veiculo): ?>
    <tr>
        <td><?php echo $veiculo['Veiculo']['id']; ?></td>        
        <td><?php echo $veiculo['Veiculo']['modelo']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $veiculo['Veiculo']['placa'],
                    array('action' => 'view', $veiculo['Veiculo']['id'])
                );
            ?>
        </td>   
        <td>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $veiculo['Veiculo']['id'])
                );
            ?>
        </td>     
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $veiculo['Veiculo']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            
        </td>
       <!--  <td>
            <?php //echo $veiculo['Veiculo']['created']; ?>
        </td> -->
    </tr>
    <?php endforeach; ?>

</table>