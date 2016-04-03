<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/add_album/')?>">Добавление альбома</a>
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
                <div class="sub_title">1. Название альбома</div>
                <div class="sub_content_block_content">
                    <form action="<?php echo base_url('/profile/save_album')?>" method="POST">
                    <p>
                        <label for="album_name">Введите название дополнительного альбома</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="text" required name="album_name" placeholder="Новый дополнительный альбом" id="album_name">
                        </div>
                        <div class="right_button">
                            <button class="btn btn_green click_btn" type="submit"><i class="fa fa-save"></i> Сохранить альбом</button>
                        </div>
                    
                    </p>
                    </form>
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
                    <li><strong>Название альбомы</strong> вы задаете самостоятельно. Не лишайте название смысловой нагрузки.</li>
                    <li><strong>Дополнительных альбомов</strong> вы можете создать не более <strong><?php echo MainSiteConfig::get_profi_parametrs('profi_personal_albums_count')?></strong></li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/edit_portfolio')?>"><i class="fa fa-angle-left"></i> Вернуться к портфолио</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;