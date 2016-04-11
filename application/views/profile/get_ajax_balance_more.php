<?php if(count($more_his) > 0):?>
<?php foreach($more_his as $one):?>
<tr class="viewed" data-history-id="<?php echo $one->id?>">
    <td class="<?php echo $one->plus ? 'td_plus' : 'td_minus'?>"><i class="fa fa-<?php echo $one->plus ? 'plus' : 'minus'?>"></i></td>
    <td><?php echo date("d.m.Y",  strtotime($one->create_date))?></td>
    <td><?php echo $one->plus ? 'Пополнение' : 'Списание'?></td>
    <td><strong><?php echo number_format($one->value,2,'.',' ')?> <i class="fa fa-ruble"></i></strong></td>
    <td><?php echo $one->descr?></td>
</tr>
<?php endforeach;?>
<?php else:?>not_more<?php endif;?>