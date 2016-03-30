<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/edit_actions')?>">Редактирование акций</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/create_action/')?>"><?php echo $title;?></a>
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
            <form action="<?php echo base_url('/profile/save_action')?>" method="POST">
            <div class="sub_content_block">
                <div class="sub_title">1. Название рекламной акции</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="title">Введите название вашей рекламной акции. Не более 255 символов.</label>
                    </p>
                    <p>
                        <input type="text"  required name="title" id="title" placeholder="Например: Скидки на все виды услуг...">
                    </p>
                    
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="sub_content_block">
                <div class="sub_title">2. Описание</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="text">Текст рекламной акции.</label>
                    </p>
                    <p>
                        <textarea id="text" name="text"></textarea>
                    </p>
                    
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            
            
            <div class="sub_content_block">
                <div class="sub_title">3. Изображение</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="text">Рекламный баннер вашей акции.</label>
                    </p>
                    <p>
                        <div class="drozone" id="upload_dropzone">
                            <a class="btn btn_blue" id="upload_btn"><i class=" fa fa-upload"></i> Выберите изображение</a> или перетащите его сюда
                        </div>
                    </p>
                    <div id="show_image">
                        <input type="hidden" name="file_name" id="file_name_value" value=""/>
                        <p class="text_align_center">Вариант отображения вашего большого рекламного баннера.</p>
                        <p class="big_show_image">
                            <img src="" id="big_show_image">
                        </p>
                        <p class="text_align_center">Вариант отображения вашего маленького рекламного баннера.</p>
                        <p class="small_show_image">
                            <img src="" id="small_show_image">
                        </p>
                    </div>
                    
                </div>
            </div>
            
            <div class="clearfix"></div>

            <p class="text_align_center">
                <button class="btn btn_green click_btn" type="submit" data-param_name="about"><i class="fa fa-save"></i> Сохранить и добавить новую акцию</button>
            </p>
            </form>
        </div>
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Информация и подсказки</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Название</strong> акции должно содержать не более 255 символов.</li>
                    <li><strong>Описание</strong> рекламной акции не должно быть "размытым". Подробно опишите все плюсы и минусы вашей реклманой акции.</li>
                    <li><strong>Изображение</strong> представляет собой рекламный баннер. Минимальные допустимые размеры изображения - <strong>(1000 x 250)</strong> пикселей.</li>
                    <li><strong>Акция</strong> допускает вид <strong>изображение</strong>,<strong>текс</strong> или <strong>изображение + текст</strong></li>
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