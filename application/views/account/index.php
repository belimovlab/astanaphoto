<?php echo $header;?>
    <div class="clearfix"></div>
    <div class="container_15 margin_top_20px">
        <div class="grid_11">
            
            <div class="panel">
                <div class="panel_title">Информация <span class="edit"><i class="fa fa-pencil"></i> <a href="<?php echo base_url('/account/edit_info')?>">Редактировать</a></span></div>
                <div class="panel_content">
                    <div class="main_info_block">
                        <div class="left_content_block">
                            <div class="info_item">
                                <span class="item_name">Специализация:</span>
                                <span class="item_value">Фотограф</span>
                            </div>
                            <div class="info_item">
                                <span class="item_name">Любимый жанр:</span>
                                <span class="item_value">Портретная съемка</span>
                            </div>
                            <div class="info_item">
                                <span class="item_name">Опыт работы:</span>
                                <span class="item_value">от 10 лет</span>
                            </div>
                            <div class="info_item">
                                <span class="item_name">Доп. жанры:</span>
                                <span class="item_value">
                                    asdasds<br/>
                                </span>
                            </div>
                        </div>
                        <div class="right_content_block">
                            <div class="info_item">
                                <span class="item_name"></span>
                                <span class="item_value">
                                    5 000  <i class="fa fa-ruble"></i>
                                    <span class="sub_cost">/ час</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="main_info_block">
                        <div class="more_info">
                            <div class="title">Дополнительная информация:</div>
                            <div class="content">
                                asdsadas asd asd
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>


                </div>
            </div>
            
            <div class="panel margin_top_20px">
                <div class="panel_title">Лучшие работы<span class="edit"><i class="fa fa-pencil"></i> <a href="<?php echo base_url('/account/edit_top_works')?>">Редактировать</a></span></div>
                <div class="panel_content">
                    <div class="photo_list" data-gal_id="1">
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg" data-show_src="http://www.zooclub.ru/attach/5356.jpg" data-show_h="2666" data-show_w="4000">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            
            <div class="panel margin_top_20px">
                <div class="panel_title">Лучшие работы<span class="edit"><i class="fa fa-pencil"></i> <a href="<?php echo base_url('/account/edit_top_works')?>">Редактировать</a></span></div>
                <div class="panel_content">
                    <div class="photo_list" data-gal_id="2">
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg" data-show_src="http://funday.com.ua/uploads/posts/2009-06/1245320765_5-funday-wide-wallpack-1.jpg" data-show_h="1650" data-show_w="2560">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg" data-show_src="http://www.zastavki.com/pictures/1920x1200/2011/Nature_Other_Large_stones_029977_.jpg" data-show_h="1200" data-show_w="1920">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg">
                        </div>
                        <div class="photo_list_item">
                            <img src="http://cs633629.vk.me/v633629567/697b/GDNw-gRVVe8.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="grid_4">
            <div class="panel_dark">
                <div class="panel_title"><?php echo $user_info->first_name.' '.$user_info->second_name;?></div>
                <div class="panel_content">
                    <div class="user_avatar">
                        <img src="/assets/images/x_e135da5d.jpg">
                        <p>
                            <a href="<?php echo base_url('/account/edit_avatar')?>">Редактировать фотографию</a>
                        </p>
                        <p>
                            <a href="<?php echo base_url('/account/buy_profi')?>" class="profi">Купить PROFI</a>
                        </p>
                        <p>
                            <span class="now_free">Свободен</span>
                        </p>
                        <p>
                            <span class="now_busy">Занят</span>
                        </p>
                    </div>
                </div>
                <div class="panel_title">Контакты <span class="edit"><i class="fa fa-pencil"></i> <a href="<?php echo base_url('/account/edit_contacts')?>">Редактировать</a></span></div>
                <div class="panel_content">
                    <div class="contacts_item">
                        <i class="fa fa-phone"></i> 8-965-974-74-74
                    </div>
                    <div class="contacts_item">
                        <i class="fa fa-skype"></i> swat_online
                    </div>
                    <div class="contacts_item">
                        <i class="fa fa-envelope"></i> sbelimov@gmail.com
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="panel_title">Рейтинг</div>
                <div class="panel_content">
                    <div class="rating_item">
                        <div class="rating_item_title">
                            <i class="fa fa-line-chart"></i> Рейтинг
                        </div>
                        <div class="rating_item_content">
                            <?php echo $user_info->rating >= 0 ?  '<span class="green">'.$user_info->rating.'</span>' : '<span class="red">'.$user_info->rating.'</span>';?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="rating_item">
                        <div class="rating_item_title">
                            <i class="fa fa-comments"></i> Отзывы
                        </div>
                        <div class="rating_item_content">
                            <span class="green">10</span> / <span class="red">-8</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="rating_item">
                        <div class="rating_item_title">
                            <i class="fa fa-star"></i> В избраном
                        </div>
                        <div class="rating_item_content">
                            <span class="green">10</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="rating_item">
                        <div class="rating_item_title">
                            <i class="fa fa-eye"></i> Просмотры
                        </div>
                        <div class="rating_item_content">
                            <span class="green">3 410</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="panel_dark margin_top_20px">
                <div class="panel_title">Баланс</div>
                <div class="panel_content rating_right">
                    <span class="green"><?php echo $user_info->balance?> <i class=" fa fa-ruble"></i></span>
                </div>
                <a href="<?php echo base_url('/account/balance_add')?>">
                <div class="show_all_button">
                    <i class="fa fa-money"></i> Пополнить баланс
                </div>
                </a>
            </div>
        </div>
    </div>
    
    
    <div class="clearfix"></div>
<?php echo $footer;