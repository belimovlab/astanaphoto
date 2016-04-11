<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/edit_actions/')?>">Рекламные акции</a>
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
                <div class="sub_title">1. Ваши рекламные акции</div>
                <div class="sub_content_block_content">
                    <p>
                        <label>Вы можете добавить или удалить рекламную акцию.</label>
                    </p>
                    <div class="clearfix"></div>
                    <p>
                        <a href="<?php echo base_url('/profile/create_action')?>" class="btn btn_blue"><i class="fa fa-plus"></i> Добавить новую рекламную акцию</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="actions_list">
                        <?php foreach($all_actions as $one):?>
                        <div class="actions_list_item">
                            <a href="<?php echo base_url('/profile/view_action/'.$one->id)?>" class="album_link">
                                <div class="top_users_bg text_align_center">
                                    <?php echo $one->title?>
                                    <br/>
                                    <br/>
                                    <span class="album_photo_count"><i class="fa fa-eye"></i> Посмотреть</span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach;?>
                        
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
                    <li><strong>Акции</strong> исполнитель сам назначает для своих потенциоальных клиентов.</li>
                    <li><strong>Количество</strong> акций от одного исполнителя является ограниченным. Для пользователей с пометкой <strong>PROFI</strong> допускается до <strong><?php echo MainSiteConfig::get_profi_parametrs('profi_actions')?></strong> акций одновременно и до <strong><?php echo MainSiteConfig::get_profi_parametrs('non_profi_actions')?></strong> акций для всех остальных пользователей.</li>
                    <li><strong>Формат</strong> оформления акции допускает как просто <strong>изображение</strong> (рекламный баннер) так и <strong>изображение + текст</strong>.</li>
                    <li><strong>Загрузка фотографий</strong> происходит в автоматическом режиме и нет ограничений на размер фотографии.</li>
                    <li><strong>Размещение</strong> новых акций повышает ваш рейтинг на <strong><?php echo MainSiteConfig::get_rating_value('actions')?></strong> баллов.</li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/')?>"><i class="fa fa-angle-left"></i> Вернуться к профилю</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;