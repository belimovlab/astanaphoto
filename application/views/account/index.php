<?php echo $header;?>
    <div class="clearfix"></div>
    <div class="container_15 margin_top_20px">
        <div class="grid_11 panel">
            <div class="panel_title">Информация <span class="edit"><i class="fa fa-pencil"></i> <a href="<?php echo base_url('/account/edit_info')?>">Редактировать</a></span></div>
            <div class="panel_content">
                <div class="info_item">
                    sad
                </div>
            </div>
        </div>
        <div class="grid_4">
            
            <div class="panel">
                <div class="panel_title"><?php echo $user_info->first_name.' '.$user_info->second_name;?></div>
                <div class="panel_content">
                    <div class="user_avatar">
                        <img src="/assets/images/edqcrVf5-fM.jpg">
                        <p>
                            <a href="<?php echo base_url('/account/edit_avatar')?>"><i class="fa fa-pencil"></i> Изменить</a>
                        </p>
                    </div>
                </div>
                
            </div>
            
            <div class="panel margin_top_20px">
                <div class="panel_title">Рейтинг</div>
                <div class="panel_content rating_right">

                    <?php echo $user_info->rating >= 0 ?  '<span class="green">'.$user_info->rating.'</span>' : '<span class="red">'.$user_info->rating.'</span>';?>
                </div>
            </div>
            
            <div class="panel margin_top_20px">
                <div class="panel_title">Баланс</div>
                <div class="panel_content rating_right">
                    <span class="green"><?php echo $user_info->balance?></span>
                </div>
                <div class="show_all_button">
                    <a href="<?php echo base_url('/account/balance_add')?>"><i class="fa fa-plus"></i> Пополнить баланс</a>
                </div>
            </div>

            
        </div>
    </div>
    <div class="clearfix"></div>
<?php echo $footer;