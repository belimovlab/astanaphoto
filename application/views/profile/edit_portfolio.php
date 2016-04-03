<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/edit_portfolio/')?>">Редактирование портфолио</a>
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
                <div class="sub_title">1. Ваши основные альбомы</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="phone">Основные альбомы состоят из специализаций вашего вида акканута.</label>
                    </p>
                    <div class="clearfix"></div>
                    <div class="album_list">
                            <?php foreach($ganres as $one):?>
                                <div class="album_item">
                                    <a href="<?php echo base_url('/profile/view_album/'.$one->id)?>" class="album_link">
                                    <div class="top_users_bg text_align_center">
                                        <?php echo $one->name?>
                                        <br/>
                                        <br/>
                                        <span class="album_photo_count"><?php echo $photo_cnt[$one->id] ? $photo_cnt[$one->id] : 0;?> <?php echo get_photo_count($photo_cnt[$one->id])?></span>
                                    </div>
                                    </a>
                                </div>
                            <?php endforeach;?>
                    </div>
                    <div class="clearfix"></div>
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            
            
            <?php if($user_info->profi):?>
            <div class="sub_content_block">
                <div class="sub_title">2. Ваши дополнительные альбомы</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="phone">Вы можете создать до <strong><?php echo MainSiteConfig::get_profi_parametrs('profi_personal_albums_count')?></strong> <?php echo get_album_count(MainSiteConfig::get_profi_parametrs('profi_personal_albums_count'))?></label>
                    </p>
                    <p>
                        <a href="<?php echo base_url('/profile/add_album')?>" class="btn btn_blue"><i class="fa fa-plus"></i> Добавить альбом</a>
                    </p>
                    
                    <div class="clearfix"></div>
                    <div class="album_list">
                            <?php foreach($personal_albums as $one):?>
                                <div class="album_item">
                                    <a href="<?php echo base_url('/profile/view_personal_album/'.$one->id)?>" class="album_link">
                                    <div class="top_users_bg text_align_center">
                                        <?php echo $one->name?>
                                        <br/>
                                        <br/>
                                        <span class="album_photo_count"><?php echo $personal_photo_cnt[$one->id] ? $personal_photo_cnt[$one->id] : 0;?> <?php echo get_photo_count($personal_photo_cnt[$one->id])?></span>
                                    </div>
                                    </a>
                                </div>
                            <?php endforeach;?>
                    </div>
                    <div class="clearfix"></div>
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            
            <?php endif;?>

        </div>
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Информация и подсказки</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Портфолио</strong> включает себя альбомы для каждого вида жанра вашего типа акканута.</li>
                    <li><strong>Количество</strong> фотографий в каждый альбом является ограниченным. Для пользователей с пометкой <strong>PROFI</strong> в альбом загружаются до <strong><?php echo MainSiteConfig::get_profi_parametrs('profi_photo_count')?></strong> фотографий и до <strong><?php echo MainSiteConfig::get_profi_parametrs('non_profi_photo_count')?></strong> фотографий для всех остальных пользователей.</li>
                    <li><strong>Дополнительные альбомы</strong> доступны только для пользователей с пометкой <strong>PROFI</strong></li>
                    <li><strong>Загрузка фотографий</strong> происходит в автоматическом режиме и нет ограничений на размер фотографии.</li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/')?>"><i class="fa fa-angle-left"></i> Вернуться к профилю</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;