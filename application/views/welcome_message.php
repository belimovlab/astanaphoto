<?php echo $header;?>
    <div class="clearfix"></div>
    <div class="top_background">
        <div class="container_15">
            <div class="grid_15">
                <h1>ASTANAFOTO - сервис подбора исполнителей для ваших задач и идей.</h1>
                <h3>Найти хорошего исполнителя так же просто, как и нажать на кнопку.</h3>
            </div>
            <div class="clearfix"></div>
            <div class="top_background_content">
                <div class="left_block">
                    <p class="title">
                        Я хочу найти исполнителя
                    </p>
                    <p class="text_align_center">
                        <a href="<?php echo base_url('/search/')?>" class="left_link">Подобрать мне исполнителя</a>
                    </p>
                </div>
                <div class="right_block">
                    <p class="title">
                        Я хочу стать исполнителем
                    </p>
                    <p class="text_align_center">
                        <a href="<?php echo base_url('/profile/signup')?>" class="right_link">Предложить свои услуги</a>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="top_catalog">
            <div class="container_15">
                <?php foreach($ganres as $one):?>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="<?php echo base_url('/search/'.$one->link)?>"><i class="<?php echo $one->icon?>"></i> <?php echo $one->name?></a>
                </div>
                <?php endforeach;?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container_15">
        <div class="grid_15 text_align_center">
            <p class="p_title padding_10px">Лучшие исполнители</p>
        </div>
        <div class="clearfix"></div>

        <div class="top_user_list">
        
        
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/giUnGSt9-LA.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Святослав Белимов</a>
                    </div>
                    <div class="user_info_name_proff">
                        Фотограф
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_plus">+8456</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 20 000 руб. (проект)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/tcw6AnUhCao.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Антон Рыжков</a>
                    </div>
                    <div class="user_info_name_proff">
                        TATOO-мастер
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_minus">-45</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 20 000 руб. (см)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/Hj576msaAB4.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Надежда Белимова</a>
                    </div>
                    <div class="user_info_name_proff">
                        Стилист
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_plus">+20</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 500 руб. (час)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/giUnGSt9-LA.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Святослав Белимов</a>
                    </div>
                    <div class="user_info_name_proff">
                        Фотограф
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_plus">+8456</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 20 000 руб. (проект)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/tcw6AnUhCao.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Антон Рыжков</a>
                    </div>
                    <div class="user_info_name_proff">
                        TATOO-мастер
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_minus">-45</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 20 000 руб. (см)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/Hj576msaAB4.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Надежда Белимова</a>
                    </div>
                    <div class="user_info_name_proff">
                        Стилист
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_plus">+20</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 500 руб. (час)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/giUnGSt9-LA.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Святослав Белимов</a>
                    </div>
                    <div class="user_info_name_proff">
                        Фотограф
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_plus">+8456</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 20 000 руб. (проект)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/tcw6AnUhCao.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Антон Рыжков</a>
                    </div>
                    <div class="user_info_name_proff">
                        TATOO-мастер
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_minus">-45</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 20 000 руб. (см)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/Hj576msaAB4.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Надежда Белимова</a>
                    </div>
                    <div class="user_info_name_proff">
                        Стилист
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_plus">+20</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 500 руб. (час)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/giUnGSt9-LA.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Святослав Белимов</a>
                    </div>
                    <div class="user_info_name_proff">
                        Фотограф
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_plus">+8456</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 20 000 руб. (проект)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/tcw6AnUhCao.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Антон Рыжков</a>
                    </div>
                    <div class="user_info_name_proff">
                        TATOO-мастер
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_minus">-45</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 20 000 руб. (см)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>
        <div class="grid_5 top_user_item">
            <div class="user_info">
                <div class="user_info_avatar">
                    <a href="#"><img src="/assets/images/Hj576msaAB4.jpg"></a>
                </div>
                <div class="user_info_name">
                    <div class="user_info_name_name">
                        <a href="#">Надежда Белимова</a>
                    </div>
                    <div class="user_info_name_proff">
                        Стилист
                    </div>
                </div>
                <div class="user_info_name_rating">
                    <div class="user_info_name_rating_profi">
                        <span>PROFI</span>
                    </div>
                    <div class="user_info_name_rating_rating">
                        <span class="rating_plus">+20</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="user_cost">
                <strong>Цена:</strong> от 500 руб. (час)
            </div>
            <div class="clearfix"></div>
            <div class="user_skills padding_10px">
                <ul>
                    <li>Портретная съемка</li>
                    <li>Порно съмка</li>
                    <li>Портретная съемка</li>
                    <li>Портретная съемка</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="user_descr">
                <ul>
                    <li><span>Делаю качественно, как могу и даже лучше не смотря ни на что!</span></li>
                </ul>
            </div>
        </div>

            </div>
        <div class="clearfix"></div>
        <p class="btn_more">
            <a href="#">Показать всех исполнителей <i class="fa fa-eye"></i></a>
        </p>
        
    </div>
    <div class="clearfix"></div>
    <div class="top_recomended">
        <div class="container_15">
            <div class="grid_15 text_align_center">
                <p class="p_title padding_10px">Акции от исполнителей</p>
            </div>
            <div class="clearfix"></div>
            <div class="action_list">
                <div class="action_list_row">
                    <div class="action_list_item">
                        <div class="panel">
                            <div class="panel_title">Фотосет за рекомендацию!</div>
                            <div class="panel_content">
                                Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                            </div>
                        </div>
                    </div>
                    <div class="action_list_item">
                        <div class="panel">
                            <div class="panel_title">Фотосет за рекомендацию!</div>
                            <div class="panel_content">
                                Красивые условия акций! 
                            </div>
                        </div>
                    </div>
                    <div class="action_list_item">
                        <div class="panel">
                            <div class="panel_title">Фотосет за рекомендацию!</div>
                            <div class="panel_content">
                                Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                            </div>
                        </div>
                    </div>
                </div>
                <div class="action_list_row">
                    <div class="action_list_item">
                        <div class="panel">
                            <div class="panel_title">Фотосет за рекомендацию!</div>
                            <div class="panel_content">
                                Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                            </div>
                        </div>
                    </div>
                    <div class="action_list_item">
                        <div class="panel">
                            <div class="panel_title">Фотосет за рекомендацию!</div>
                            <div class="panel_content">
                                Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                            </div>
                        </div>
                    </div>
                    <div class="action_list_item">
                        <div class="panel">
                            <div class="panel_title">Фотосет за рекомендацию!</div>
                            <div class="panel_content">
                                Красивые условия акций! asjk dsadsljflkdsj fklj sdklfj ksldjf kldsjfkljsdklfj klsdjfklsdjklfj klsdjfklsjd klfjdskljf lksdj klfjsdklfj sdkljf lksdj fklsdjf kldsj fkldsj fkl jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="btn_more">
                <a href="#">Посмотреть все акции <i class="fa fa-eye"></i></a>
            </p>
            <div class="clearfix"></div>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="container_15">
        <div class="grid_15 text_align_center">
            <p class="p_title padding_10px">Новостная лента</p>
        </div>
        <div class="clearfix"></div>
        <div class="news_list">
            <div class="grid_5 news_list_item">
                <div class="panel">
                    <div class="panel_title">Фотосет за рекомендацию!</div>
                    <div class="panel_content">
                        Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                    </div>
                </div>
            </div>
            <div class="grid_5 news_list_item">
                <div class="panel">
                    <div class="panel_title">Фотосет за рекомендацию!</div>
                    <div class="panel_content">
                        Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                    </div>
                </div>
            </div>
            <div class="grid_5 news_list_item">
                <div class="panel">
                    <div class="panel_title">Фотосет за рекомендацию!</div>
                    <div class="panel_content">
                        Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                    </div>
                </div>
            </div>
            <div class="grid_5 news_list_item">
                <div class="panel">
                    <div class="panel_title">Фотосет за рекомендацию!</div>
                    <div class="panel_content">
                        Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                    </div>
                </div>
            </div>
            <div class="grid_5 news_list_item">
                <div class="panel">
                    <div class="panel_title">Фотосет за рекомендацию!</div>
                    <div class="panel_content">
                        Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                    </div>
                </div>
            </div>
            <div class="grid_5 news_list_item">
                <div class="panel">
                    <div class="panel_title">Фотосет за рекомендацию!</div>
                    <div class="panel_content">
                        Красивые условия акций! asjk dsad jkash djkashjkd hask hdkjashk jdjsakh dkjash djkhasjkd jkash djkash kjdhasjkdh kajsh djkashd jkash dkj
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </div>
        <p class="btn_more">
            <a href="#">Посмотреть всю новостную ленту <i class="fa fa-eye"></i></a>
        </p>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
<?php echo $footer;