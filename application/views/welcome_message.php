<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo $title ? $title: SITE_TITLE;  ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="/assets/css/normalize.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/grid.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/common.css" rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=1200px">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/assets/js/jquery-2.1.3.min.js"></script>
    <link rel="icon" href="/icon.ico" type="image/x-icon"/>
</head>
<body>
    <header>
        <div class="container_15">
            <div class="grid_3 logo">
                <a href="<?php base_url('/')?>"><img src="/assets/images/logo.png"></a>
            </div>
            <div class="grid_10 navigation">
                <a href="<?php echo base_url('/ispolniteli')?>">Исполнители</a>
                <a href="<?php echo base_url('/projects')?>">Проекты</a>
                <a href="<?php echo base_url('/akcii')?>">Акции</a>
                <a href="<?php echo base_url('/contest')?>">Конкурсы</a>
                <a href="<?php echo base_url('/news')?>">Статьи</a>
                <a href="<?php echo base_url('/more')?>">Еще...</a>
            </div>
            <div class="grid_2 login_area">
                <a href="<?php echo base_url('/account/login')?>" class="button master"><i class="fa fa-key"></i> Войти</a>
            </div>
        </div>
    </header>
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
                        <a href="#" class="left_link">Подобрать мне исполнителя</a>
                    </p>
                </div>
                <div class="right_block">
                    <p class="title">
                        Я хочу стать исполнителем
                    </p>
                    <p class="text_align_center">
                        <a href="#" class="right_link">Предложить свои услуги</a>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="top_catalog">
            <div class="container_15">
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-camera"></i> Фотографы</a>
                </div>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-building"></i> Фотостудии</a>
                </div>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-video-camera"></i> Видеографы</a>
                </div>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-reddit-alien"></i> Аниматоры</a>
                </div>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-female"></i> Модели</a>
                </div>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-paint-brush"></i> Стилисты</a>
                </div>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-scissors"></i> Парикмахеры</a>
                </div>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-anchor"></i> TATOO мастера</a>
                </div>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-hand-paper-o"></i> Ногтевой сервис</a>
                </div>
                <div class="grid_3 padding_10px text_align_center">
                    <a href="#"><i class="fa fa-leaf"></i> Флористы</a>
                </div>
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

        <div class="clearfix"></div>
    </div>

</body>
</html>