<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/edit_contacts/')?>">Редактирование контактной информации</a>
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
                <div class="sub_title">1. Телефон</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="phone">Ваш номер телефона</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="text" required name="phone" placeholder="Например: 8 (123) 456 78 90 " id="phone" value="<?php echo $user_info->phone ? $user_info->phone : '';?>">
                        </div>
                        <div class="right_button">
                            <button class="btn btn_green click_btn" data-param_name="phone"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_content_block">
                <div class="sub_title">2. Skype</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="skype">Ваш Skype контакт</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="text" required name="skype" placeholder="Например: user_name " id="skype" value="<?php echo $user_info->skype ? $user_info->skype : '';?>">
                        </div>
                        <div class="right_button">
                            <button class="btn btn_green click_btn" data-param_name="skype"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_content_block">
                <div class="sub_title">3. Вконтакте</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="vk">Ваш аккаунт в Вконтакте</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="text" required name="vk" placeholder="Например: http://vk.com/id1234567890 или http://vk.com/user_name " id="vk" value="<?php echo $user_info->vk ? $user_info->vk : '';?>">
                        </div>
                        <div class="right_button">
                            <button class="btn btn_green click_btn" data-param_name="vk"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_content_block">
                <div class="sub_title">4. Facebook</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="facebook">Ваш аккаунт в Facebook</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="text" required name="facebook" placeholder="Например: https://www.facebook.com/user.name " id="facebook" value="<?php echo $user_info->facebook ? $user_info->facebook : '';?>">
                        </div>
                        <div class="right_button">
                            <button class="btn btn_green click_btn" data-param_name="facebook"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_content_block">
                <div class="sub_title">5. Twitter</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="twitter">Ваш аккаунт в Twitter</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="text" required name="twitter" placeholder="Например: https://twitter.com/belimovlab " id="twitter" value="<?php echo $user_info->twitter ? $user_info->twitter : '';?>">
                        </div>
                        <div class="right_button">
                            <button class="btn btn_green click_btn" data-param_name="twitter"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_content_block">
                <div class="sub_title">6. Одноклассники</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="ok">Ваш аккаунт в Одноклассники</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="text" required name="ok" placeholder="Например: http://ok.ru/username" id="ok" value="<?php echo $user_info->ok ? $user_info->ok : '';?>">
                        </div>
                        <div class="right_button">
                            <button class="btn btn_green click_btn" data-param_name="ok"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_content_block">
                <div class="sub_title">7. WEB сайт</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="site">Ваш личный web сайт</label>
                    </p>
                    <p>
                        <div class="left_input">
                            <input type="text" required name="site" placeholder="Например: http://sitename.ru " id="site" value="<?php echo $user_info->site ? $user_info->site : '';?>">
                        </div>
                        <div class="right_button">
                            <button class="btn btn_green click_btn" data-param_name="site"><i class="fa fa-save"></i> Сохранить изменения</button>
                        </div>
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
                    <li>
                        <strong>Телефон</strong> для связи с исполнителем.
                        <br/>
                        Дополнительно + <strong><?php echo MainSiteConfig::get_rating_value('phone')?></strong> баллов к рейтингу.
                    </li>
                    <li>
                        <strong>Skype</strong> контакт для связи.
                        Дополнительно + <strong><?php echo MainSiteConfig::get_rating_value('skype')?></strong> баллов к рейтингу.
                    </li>
                    <li>
                        <strong>Вконтакте</strong> ссылка на ваш профиль или вашу группу.
                        <br/>
                        Дополнительно + <strong><?php echo MainSiteConfig::get_rating_value('vk')?></strong> баллов к рейтингу.
                    </li>
                    <li>
                        <strong>Facebook</strong>  ссылка на ваш профиль или вашу группу.
                        <br/>
                        Дополнительно + <strong><?php echo MainSiteConfig::get_rating_value('facebook')?></strong> баллов к рейтингу.
                    </li>
                    <li>
                        <strong>Twitter</strong> ссылка на ваш профиль или вашу группу.
                        <br/>
                        Дополнительно + <strong><?php echo MainSiteConfig::get_rating_value('twitter')?></strong> баллов к рейтингу.
                    </li>
                    <li>
                        <strong>Одноклассники</strong>  ссылка на ваш профиль или вашу группу.
                        <br/>
                        Дополнительно + <strong><?php echo MainSiteConfig::get_rating_value('ok')?></strong> баллов к рейтингу.
                    </li>
                    <li>
                        <strong>WEB сайт</strong> ссылка на ваш личный web сайт.
                        <br/>
                        Дополнительно + <strong><?php echo MainSiteConfig::get_rating_value('site')?></strong> баллов к рейтингу.
                    </li>
                    <li>
                        <strong>Рейтинг</strong> имеет огромную роль при поиске и выборе исполнителя. Помните об этом.
                    </li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/')?>"><i class="fa fa-angle-left"></i> Вернуться к профилю</a>
            </p>
        </div>
    </div>

</div>
<?php echo $footer;