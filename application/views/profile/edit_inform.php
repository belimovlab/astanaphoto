<?php echo $header;?>
<script>
    window.profi = <?php echo $user_info->profi ? 1: 0;?>;
    window.profi_about_length = <?php echo $user_info->profi ?  MainSiteConfig::get_profi_parametrs('profi_about_length'):  MainSiteConfig::get_profi_parametrs('non_profi_about_length');?>;
    window.ad_gen = <?php echo $ad_gen ? json_encode($ad_gen) :'[];';?>
</script>


<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title;?></div>
        <div class="panel_content">

            <div class="sub_content_block">
                <div class="sub_title">1. Вид аккаунта</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="account_type">Ваш вид аккаунта. Изменить его нельзя</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="text" required name="account_type" disabled="disabled"  id="account_type" value="<?php echo $user_types_id[$user_info->account_type]->name?>">
                        </div>
                        <div class="right_button">
                           
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            
            
            
            <div class="sub_content_block">
                <div class="sub_title">2. Специализация</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="favorite_genre">Любимый жанр в вашей профессии</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <select name="favorite_genre" id="favorite_genre" required>
                                <?php foreach($ganres as $one):?>
                                    <option value="<?php echo $one->id?>" <?php echo $user_info->favorite_genre == $one->id ? 'selected="select"' : '';?>><?php echo $one->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="right_button">
                           <button class="btn btn_green click_btn" data-param_name="favorite_genre"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            
            
            <div class="sub_content_block">
                <div class="sub_title">3. Опыт работы</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="expa">Количество лет, отданных любимому делу.</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="number" min="0" max="50" required name="expa" id="expa" value="<?php echo $user_info->expa ? $user_info->expa : 0;?>">
                        </div>
                        <div class="right_button">
                           <button class="btn btn_green click_btn" data-param_name="expa"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            
            
            <div class="sub_content_block">
                <div class="sub_title">4. Стоимость услуг</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="cost">Назначьте цену за свои услуги</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="cost" min="0" max="1000000" required name="cost" id="cost" value="<?php echo $user_info->cost ? $user_info->cost : 0;?>">
                        </div>
                        <div class="right_button">
                           <button class="btn btn_green click_btn" data-param_name="cost"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            
            
            
            <div class="sub_content_block">
                <div class="sub_title">5. Тип стоимости</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="type_cost">Стоимость услуг за проект или ввиде почасовой оплаты.</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <select name="type_cost" id="type_cost" required>
                                    <option value="per_project" <?php echo $user_info->per_project == 1 ? 'selected="select"' : '';?>>Проект</option>
                                    <option value="per_hour" <?php echo $user_info->per_hour == 1 ? 'selected="select"' : '';?>>Час</option>
                            </select>
                        </div>
                        <div class="right_button">
                           <button class="btn btn_green click_btn" data-param_name="type_cost"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            
            
            
            
            
            
            
            
            
            <div class="sub_content_block">
                <div class="sub_title">6. Дополнительная информация</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="about">Краткая информация для ваших потенциальных клиентов. (Осталось <span id="last_symbols">300</span> символов)</label>
                    </p>
                    <p>
                        <textarea id="about"><?php echo $user_info->about ? $user_info->about : '';?></textarea>
                    </p>
                    <p class="text_align_center">
                        <button class="btn btn_green click_btn" data-param_name="about"><i class="fa fa-save"></i> Сохранить изменения</button>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            
            <?php if($user_info->profi):?>
            <div class="sub_content_block">
                <div class="sub_title">7. Дополнительные специализации</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="ad_gen">Добавьте дополнительные специализации к своему профилю. Не более 3-х специализаций.</label>
                    </p>
                    <p>
                         <div  id="ad_gen_list">
                             <?php foreach($ganres_by_id as $one):?>
                                <?php  if($one->id != $user_info->favorite_genre):?>
                                    <label for="ad_gen">
                                        <input type="checkbox" class="checkbox" name="ad_gen[]" data-ad_gen_value="<?php echo $one->id?>" id="ad_gen_<?php echo $one->id?>" value="<?php echo $one->id?>" <?php echo in_array($one->id, $ad_gen) ? 'checked="checked"' : ''; ?>><?php echo $one->name?>
                                    </label>
                                <?php endif;?>
                             <?php endforeach;?>
                        </div>
                    </p>
                    <p class="text_align_center">
                        <button class="btn btn_green click_btn" data-param_name="ad_gen"><i class="fa fa-save"></i> Сохранить изменения</button>
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
                    <li><strong>Вид аккаунта</strong> - это вид вашего профиля. Он указыается при регистрации и изменить его нельзя.</li>
                    <li><strong>Специализация</strong> - это любимый жанр в вашей профессии.</li>
                    <li><strong>Опыт работы</strong> является одним из наиболее важных критериев при выборе исполнителя. Отнеситесь внимательно к заполнению его значения.</li>
                    <li><strong>Стоимость услуг</strong> определяется вами. Укажите значение для типа стоимости.</li>
                    <li><strong>Тип стоимости</strong>  - это возможные варианты оплаты за ваши услуги. Либо за проект, либо почасовая оплата.</li>
                    <li><strong>Дополнительная информация</strong> - это небольшая информация для ваших потенциальных клиентов. Ограничена <strong><?php echo MainSiteConfig::get_profi_parametrs('profi_about_length')?>-ми</strong> символами ( включая пробелы ) для профиля с пометкой <strong>PROFI</strong> и <strong><?php echo MainSiteConfig::get_profi_parametrs('non_profi_about_length')?>-ми</strong> символами для стандартных профилей.</li>
                    <li><strong>Дополнительные специализации</strong> увеличивают ваш шанс найти клиентов не по основной специализации. Дополнительные специализации доступны только для профиля с пометкой <strong>PROFI</strong>.</li>
                    
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/')?>"><i class="fa fa-angle-left"></i> Вернуться к профилю</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;