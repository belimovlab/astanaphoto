<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/balance')?>">Баланс</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/balance_add/')?>">Пополнение баланса</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/balance_payment/')?>"><?php echo $title;?></a>
        
        <span class="balance_top"><a href="<?php echo base_url('/profile/balance')?>"><?php echo number_format($user_info->balance ? $user_info->balance : 0,2,'.',' ')?> <i class="fa fa-ruble"></i></a></span>
    </div>
</div>
<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title;?> </div>
        <div class="panel_content">
            <div class="sub_content_block">
                <div class="sub_title">1. <?php echo $title;?></div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="out_summ">Вам необходимо подтвердить платеж.</label>
                    </p>
                    <p>
                    <div class="payment_div">
                        <div class="payment_item">
                            <div class="payment_title">квитанция</div>
                            <div class="payment_from">
                                <p><strong>ФИО:</strong> <?php echo $user_info->first_name." ".$user_info->second_name?></p>
                                <p><strong>Email:</strong> <?php echo $user_info->email?></p>
                                <p><strong>Телефон:</strong> <?php echo $user_info->phone?></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="payment_item">
                            <p class="text_align_center payment_id_check">№ <?php echo $shp_item;?></p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="payment_item">
                            <table class="invoice">
                                <tr>
                                    <th>№</th>
                                    <th>Дата</th>
                                    <th>Название</th>
                                    <th>Сумма, руб.</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>04.04.2016</td>
                                    <td>Пополнение баланса пользователя</td>
                                    <td><?php echo number_format($out_summ,2,'.',' ');?></td>
                                </tr>
                            </table>
                        </div>
       
                    </div>
                        
                    <form action='https://auth.robokassa.ru/Merchant/Index.aspx' method=POST target="_blank">
                    <input type="hidden" name="MrchLogin" value="<?php echo $mrh_login?>">
                    <input type="hidden" name="OutSum" value="<?php echo $out_summ?>">
                    <input type="hidden" name="InvId" value="<?php echo $inv_id?>">
                    <input type="hidden" name="Desc" value="<?php echo $inv_desc?>">
                    <input type="hidden" name="SignatureValue" value="<?php echo $crc?>">
                    <input type="hidden" name="Shp_item" value="<?php echo $shp_item?>">
                    <input type="hidden" name="Culture" value="<?php echo $culture?>">
                    <input type="hidden" name="IsTest" value="1">
                    <p class='text_align_center'>
                        <button type='submit' class='btn btn_blue'>
                             Подтверждаю платеж <i class='fa fa-check'></i>
                        </button>
                    </p>
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