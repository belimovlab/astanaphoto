<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/edit_avatar/')?>">Обновление аватара</a>
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

            <div class="sub_content_block">
                <div class="sub_title">1. Редактирование фотографии</div>
                <div class="sub_content_block_content">
                    <p>
                        <label>Ваша текущая фотография</label>
                    </p>
                    <p>
                        <div class="main_info_block">
                            <div style="display: inline-block; width: 50%; float: left; text-align: center;">
                                <p>
                                    Большая фотография
                                </p>
                                <p>
                                    <img src="<?php echo $user_info->big_photo ? $user_info->big_photo : MainSiteConfig::get_item('not_avatar_big')[$user_info->sex]; ?>" id="now_big_avatar">
                                </p>
                            </div>
                            <div style="display: inline-block; width: 50%; text-align: center; vertical-align: middle;">
                                <p>
                                    Маленькая фотография
                                </p>
                                <p>
                                    <img style="vertical-align: middle; display: inline-block;" src="<?php echo $user_info->small_photo ? $user_info->small_photo : MainSiteConfig::get_item('not_avatar_small')[$user_info->sex]; ?>" id="now_small_avatar">
                                </p>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_content_block">
                <div class="sub_title">2. Загрузка новой фотографии</div>
                <div class="sub_content_block_content">
                    <p>
                        <label >Загрузите новую фотографию</label>
                    </p>
                    <p>
                    <div class="drozone" id="upload_dropzone">
                        <button class="btn btn_blue" id="upload_btn"><i class=" fa fa-upload"></i> Выберите изображение</button> или перетащите его сюда
                    </div>
                    </p>
                </div>
            </div>
             <div class="clearfix"></div>
            <div class="sub_content_block" id="new_avatar_block">
                <div class="sub_title">3. Сохранение новой фотографии</div>
                <div class="sub_content_block_content">
                    <p>
                        <label >Сохраните вашу новую фотографию</label>
                    </p>
                    <p>
                        <div class="main_info_block">
                            <div style="display: inline-block; width: 50%; float: left; text-align: center;">
                                <p>
                                    Большая фотография
                                </p>
                                <p>
                                    <img src="<?php echo $user_info->big_photo ? $user_info->big_photo : MainSiteConfig::get_item('not_avatar_big')[$user_info->sex]; ?>" id="tmp_avatar_big">
                                </p>
                            </div>
                            <div style="display: inline-block; width: 50%; text-align: center; vertical-align: middle;">
                                <p>
                                    Маленькая фотография
                                </p>
                                <p>
                                    <img style="vertical-align: middle; display: inline-block;" src="<?php echo $user_info->small_photo ? $user_info->small_photo : MainSiteConfig::get_item('not_avatar_small')[$user_info->sex]; ?>" id="tmp_avatar_small">
                                </p>
                            </div>
                        </div>
                    </p>
                    <div class="clearfix"></div>
                    <p class="text_align_center">
                        <button class="btn btn_blue" id="save_new_avatar"><i class=" fa fa-save"></i> Сохранить новую фотографию</button>
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
                    <li><strong>Аватар</strong> дает <strong><?php echo MainSiteConfig::get_rating_value('avatar')?></strong> баллов к рейтингу.</li>
                    <li><strong>Аватар</strong> будет состоять их двух версий: маленький, для верхнего отображения, и большого, для отображения в профиле пользователя.</li>
                    <li><strong>Аватар</strong> будет будет иметь размер в 260 пикселей в ширину.</li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/')?>"><i class="fa fa-angle-left"></i> Вернуться к профилю</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;