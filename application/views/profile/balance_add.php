<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/balance')?>">Баланс</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/balance_add/')?>"><?php echo $title;?></a>
    </div>
</div>
<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title;?> <span class="edit"><a href="<?php echo base_url('/profile/delete_action/'.$action->id)?>"><i class="fa fa-trash"></i> Удалить</a></span></div>
        <div class="panel_content">
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
            ывыв
            <?php
                $mrh_login = "yrk";
                $mrh_pass1 = "pjYWzQDC4qI896Q2ZAhK";
                $inv_id = 678678;
                $inv_desc = "Товары для животных";
                $out_summ = "100.00";
                $shp_item = 1;
                $culture = "ru";
                $encoding = "utf-8";
                $IsTest = 1;
                $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");
                print "<html><script language=JavaScript ".
                    "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormMS.js?".
                    "MerchantLogin=$mrh_login&OutSum=$out_summ&InvoiceID=$inv_id".
                    "&Description=$inv_desc&SignatureValue=$crc&IsTest=$IsTest'></script></html>";
                
                
                                


            ?>
            
        </div>
        
        <div class="panel_title">Автор: <?php echo $user_info->first_name." ".$user_info->second_name;?></div>
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Информация и подсказки</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Пополнение</strong> баланса происходит путем использования сервиса <strong>ROBOKASSA</strong>.</li>
                    <li><strong>Сумма</strong> пополнения баланса является произвольной.</li>
                    <li><strong>Напоминаем</strong> вам про <a href="<?php echo base_url('/terms')?>">условия использования</a> сервиса.</li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/balance')?>"><i class="fa fa-angle-left"></i> Вернуться к балансу</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;