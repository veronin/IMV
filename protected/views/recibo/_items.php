<?php foreach($items as $item): 
 /*@var $item ItemRecibo */   
 ?>
<div>
	<table>
            <td>
		<?php echo $item->idMatricula; ?> 
            </td>
            <td>
		<?php echo $item->importe; ?> 
            </td>
        </table>    
</div>
<?php endforeach; ?>

