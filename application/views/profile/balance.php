<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/balance')?>">Баланс</a>
        
        <span class="balance_top"><a href="<?php echo base_url('/profile/balance')?>"><?php echo number_format($user_info->balance ? $user_info->balance : 0,2,'.',' ')?> <i class="fa fa-ruble"></i></a></span>
    </div>
</div>
<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title;?> </div>
        <div class="panel_content">
            <div class="sub_content_block">
                <?php if($error):?>
                <p class="error_mess">
                    <?php echo $error;?>
                </p>
                <?php endif;?>
                <?php if($success):?>
                <p class="success_mess">
                    <?php echo $success;?>
                </p>
                <?php endif;?>
                <div class="sub_title">1. Текущий баланс пользователя</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="out_summ">Сумма баланса, доступная вам на данный момент.</label>
                    </p>
                    <p class="text_align_center balance_main">
                        <?php echo number_format($user_info->balance ? $user_info->balance : 0,2,'.',' ')?> <i class="fa fa-ruble"></i>
                    </p>
                    <p class="text_align_center balance_main">
                        <a href="<?php echo base_url('/profile/balance_add')?>" class="btn btn_blue"><i class="fa fa-money"></i> Пополнить баланс</a>
                    </p>
                </div>
                <div class="clearfix"></div>
                <div class="sub_title">2. История операций</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="out_summ">История операций с балансом пользователя.</label>
                    </p>
                    <div class="clearfix"></div>
                    <div style="width: 100%; display: block">
                    <table class="payment_history">
                        <tbody id="tbody_balance">
                        <tr>
                            <th>№</th>
                            <th>Дата</th>
                            <th>Тип</th>
                            <th>Сумма</th>
                            <th>Описание</th>
                        </tr>
                        <?php if(count($history) > 0):?>
                        <?php foreach($history as $one):?>
                        <tr class="viewed" data-history-id="<?php echo $one->id?>">
                            <td class="<?php echo $one->plus ? 'td_plus' : 'td_minus'?>"><i class="fa fa-<?php echo $one->plus ? 'plus' : 'minus'?>"></i></td>
                            <td><?php echo date("d.m.Y",  strtotime($one->create_date))?></td>
                            <td><?php echo $one->plus ? 'Пополнение' : 'Списание'?></td>
                            <td><strong><?php echo number_format($one->value,2,'.',' ')?> <i class="fa fa-ruble"></i></strong></td>
                            <td><?php echo $one->descr?></td>
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <td colspan="5">
                                <p>У вас нет истории операций с балансом пользователя.</p>
                            </td>
                        </tr>
                        <?php endif;?>
                        </tbody>
                    </table>
                        <p class="text_align_center">
                                <button class="btn btn_blue" id="tbody_balance_btn"><i class="fa fa-refresh"></i> <span id="btn_text">Показать предыдущие операции...</span></button>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Информация и подсказки</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Пополнение</strong> баланса происходит путем использования сервиса <strong>ROBOKASSA</strong>.</li>
                    <li><strong>Сумма</strong> пополнения баланса является произвольной.</li>
                    <li><strong>Напоминаем</strong> вам про <a href="<?php echo base_url('/terms')?>" class="right_terms">условия использования</a> сервиса.</li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/')?>"><i class="fa fa-angle-left"></i> Вернуться к профилю</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;