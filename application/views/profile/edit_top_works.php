<?php echo $header;?>
<script>
    window.is_personal = 0;
</script>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/edit_top_works')?>">Редактирование лучших работ</a>
        
        <span class="balance_top"><a href="<?php echo base_url('/profile/balance')?>"><?php echo number_format($user_info->balance ? $user_info->balance : 0,2,'.',' ')?> <i class="fa fa-ruble"></i></a></span>
    </div>
</div>
<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title;?></div>
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
            <div class="sub_content_block">
                <div class="sub_title">1. Список фотографий в разделе лучших работ</div>
                <div class="sub_content_block_content">
                    <p>
                        <label>Фотографии, которые на данный момент размещены у вас в списке лучших работ.</label>
                    </p>
                    <div class="clearfix"></div>
                    <div class="album_photo_list">
                        <?php if(count($best_photos) > 0):?>
                        <?php foreach($best_photos as $one):?>
                        <div class="album_photo_list_item">
                            <div class="sub_links">
                                <a href="<?php echo base_url('/profile/unset_from_bests_edit/'.$one->photo_id)?>"><i class="fa fa-star-o"></i> Из лучшего</a>
                            </div>
                            <div class="clearfix"></div>
                            <img src="/content/user_photos/140_<?php echo $one->filename?>">
                            <div class="clearfix"></div>
                        </div>
                        <?php endforeach;?>
                        <?php else:?>
                        <p class="text_align_center">У вас нет лучших работ.</p>
                        <p class="text_align_center color_777">Добавить фотографии в этот раздел можно из вашего портфолио.</p>
                        <p class="text_align_center"><a href="<?php echo base_url('/profile/edit_portfolio')?>" class="btn btn_blue">Заполнить портфолио</a></p>
                        <?php endif;?>
                    </div>
                    <div class="clearfix"></div>
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
                    <li><strong>Загрузка фотографий</strong> максимальна упрощена для вас.</li>
                    <li><strong>Количество</strong> фотографий в каждый альбом является ограниченным. Для пользователей с пометкой <strong>PROFI</strong> в альбом загружаются до <strong><?php echo MainSiteConfig::get_profi_parametrs('profi_photo_count')?></strong> фотографий и до <strong><?php echo MainSiteConfig::get_profi_parametrs('non_profi_photo_count')?></strong> фотографий для всех остальных пользователей.</li>
                    <li><strong>В лучшие</strong> работы вы можете добавить фотографии, которые вы сами считаете вашими лучшими работами. Ограничение на количество фотографий в разделе составдяет до <strong><?php echo MainSiteConfig::get_profi_parametrs('profi_best_photos')?></strong> для пользователей с пометкой <strong>PROFI</strong> и до <strong><?php echo MainSiteConfig::get_profi_parametrs('non_profi_best_photos')?></strong> фотографий для всех остальных пользователей. </li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/edit_portfolio')?>"><i class="fa fa-angle-left"></i> Вернуться к портфолио</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;