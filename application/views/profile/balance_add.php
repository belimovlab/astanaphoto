<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/balance')?>">Баланс</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/balance_add/')?>"><?php echo $title;?></a>
        
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
                <div class="sub_title">1. Пополнение баланса</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="out_summ">Введите сумму пополнения вашего баланса.</label>
                    </p>
                    <p>
                    <form action="<?php echo base_url('/profile/balance_payment')?>" method="POST">
                        <div class="left_input">
                            <input type="text" required name="OutSum" id="out_summ" value="1000">
                        </div>
                        <div class="right_button">
                            <button class="btn btn_green click_btn" type="submit"><i class="fa fa-ruble"></i> Пополнить баланс</button>
                        </div>
                    </form>
                    </p>
                </div>
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