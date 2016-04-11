<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/balance')?>">Баланс</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/payment_good/')?>">Результат платежа</a>
        
        
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
                
                <p class="text_align_center">
                    Вы успешно пополнили свой баланс.
                </p>
             
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
                <a href="<?php echo base_url('/profile/balance')?>"><i class="fa fa-angle-left"></i> Вернуться к балансу</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;