<?php echo $header;?>
<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title ?  $title : 'Войти в сервис';?></div>
        <div class="panel_content">
            <p>
                <div class="grid_2 font_weight_bold edit_item">Любимый жанр</div>
                <div class="grid_5">
                    <select id="favorite_ganre" name="favorite_ganre">
                        <?php foreach($photo_ganres as $one):?>
                        <option value="<?php echo $one->id?>" <??>><?php echo $one->name?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="grid_2 text_align_center edit_item_button">
                    <button class="button ok update_ajax" data-id_for_value="favorite_ganre" data-name="favganre"><i class="fa fa-save"></i> Сохранить</button>
                </div>
            </p>
            <div class="clearfix"></div>
            <p>
                <div class="grid_2 font_weight_bold edit_item">Опыт работы: </div>
                <div class="grid_5">
                    <input type="text" name="experience" id="experience">
                </div>
                <div class="grid_2 text_align_center edit_item_button">
                    <button class="button ok update_ajax" data-id_for_value="experience" data-name="experience"><i class="fa fa-save"></i> Сохранить</button>
                </div>
            </p>
            <div class="clearfix"></div>
        </div>
      
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Информация</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Дополнительные жанры</strong> могут добавить себе исполнители с пометкой <span class="profi_span">PROFI</span></li>
                    <li><strong>Дополнительная информация</strong> ограничевается <strong>300</strong> знаками и <strong>600</strong> для исполнителей с пометкой <span class="profi_span">PROFI</span></li>
                    <li><strong>Каждый</strong> заполненый пункт информации добавляет к рейтингу баллы.</li>
                </ul>
            </div>
        </div>
        <p class="btn_more">
            <a href="<?php echo base_url('/account')?>"><i class="fa fa-angle-left"></i> Вернуться к аккаунту</a>
        </p>
    </div>
</div>

<?php echo $footer;