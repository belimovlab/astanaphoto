<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/edit_actions')?>">Редактирование акций</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/create_action/')?>"><?php echo $title;?></a>
        
        <span class="balance_top"><a href="<?php echo base_url('/profile/balance')?>"><?php echo number_format($user_info->balance ? $user_info->balance : 0,2,'.',' ')?> <i class="fa fa-ruble"></i></a></span>
    </div>
</div>
<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title;?> <span class="edit"><a href="<?php echo base_url('/profile/delete_action/'.$action->id)?>"><i class="fa fa-trash"></i> Удалить</a></span></div>
        <div class="panel_content">
            <h1 class="text_align_center action_title_new"><?php echo $action->title;?></h1>
            <?php if($action->image):?>
            <p class="text_align_center">
                <img src="/content/user_action/740_<?php echo $action->image;?>" class="action_big_image">
            </p>
            <?php endif;?>
            
            <?php if($action->text):?>
            <p class="action_text justify">
                <?php echo $action->text;?>
            </p>
            <?php endif;?>
        </div>
        
        <div class="panel_title">Автор: <?php echo $user_info->first_name." ".$user_info->second_name;?></div>
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Информация и подсказки</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Срок</strong> размещения акции до удаления - <strong>1 месяц</strong>.</li>
                    <li><strong>Размещение</strong> новых акций повышает ваш рейтинг на <strong><?php echo MainSiteConfig::get_rating_value('actions')?></strong> баллов.</li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/edit_actions')?>"><i class="fa fa-angle-left"></i> Вернуться к акциям</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;