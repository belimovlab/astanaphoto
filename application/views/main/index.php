<?php echo $header;?>
<div class="top_background">
    <div class="container_15">
        <div class="grid_15">
            <h1>ASTANAFOTO - сервис поиска &nbsp;&nbsp; исполнителей для ваших задач и идей.</h1>
            <h3>Найти хорошего исполнителя так же просто, как и нажать на кнопку.</h3>
        </div>
        <div class="clearfix"></div>
        <div class="top_background_content">
            <div class="left_block">
                <p class="title">
                    Я хочу найти исполнителя
                </p>
                <p class="text_align_center">
                    <a href="<?php echo base_url('/search')?>" class="left_link">Подобрать мне исполнителя</a>
                </p>
            </div>
            <div class="right_block">
                <p class="title">
                    Я хочу стать исполнителем
                </p>
                <p class="text_align_center">
                    <a href="<?php echo base_url('/account/registration')?>" class="right_link">Предложить свои услуги</a>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        
    </div>
    <div class="clearfix"></div>
    <div class="top_catalog">
        <div class="container_15">
            <?php foreach($user_types as $one):?>
            <div class="grid_3 padding_10px text_align_center">
                <a href="<?php echo base_url('/search/'.$one->url)?>"><i class="fa fa-<?php echo $one->icon?>"></i> <?php echo $one->names?></a>
            </div>
            <?php endforeach;?>
        </div>
        <div class="clearfix"></div>
    </div>
    
</div>

<div class="clearfix"></div>
    <div class="container_15">
        <div class="grid_15 text_align_center margin_top_20px">
            <h1 class="p_title">Лучшие исполнители</h1>
            <h3 class="subtitle">В каждом виде деятельности</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container_15">
        <div class="grid_5">
            <div class="top_users_bg">
                <div class="user_info">
                    <div class="user_avatar">
                        <img src="/assets/images/Hj576msaAB4.jpg">
                    </div>
                    <div class="user_name">
                        <div class="user_name_name_link">
                            <a href="#">Надежда Белимова</a>
                        </div>
                        <div class="user_name_type">
                            Фотограф
                        </div>
                    </div>
                    <div class="user_rating">
                        <p>
                            <span class="profi">PROFI</span>
                        </p>
                        <p>
                            <span class="rating_plus">+ 145</span>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="user_cost">
                    Стоимость услуг: от <strong>20 000</strong> <i class="fa fa-ruble"></i> / час
                </div>
            </div>
        </div>
        <div class="grid_5">
            <div class="top_users_bg">
                <div class="user_info">
                    <div class="user_avatar">
                        <img src="/assets/images/giUnGSt9-LA.jpg">
                    </div>
                    <div class="user_name">
                        <div class="user_name_name_link">
                            <a href="#">Святослав Белимов</a>
                        </div>
                        <div class="user_name_type">
                            Видеограф
                        </div>
                    </div>
                    <div class="user_rating">
                        <p>
                            <span class="profi">PROFI</span>
                        </p>
                        <p>
                            <span class="rating_minus">  - 233</span>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="user_cost">
                    Стоимость услуг: от <strong>20 000</strong> <i class="fa fa-ruble"></i> / проект
                </div>
            </div>
        </div>
        <div class="grid_5">
            <div class="top_users_bg">
                <div class="user_info">
                    <div class="user_avatar">
                        <img src="/assets/images/giUnGSt9-LA.jpg">
                    </div>
                    <div class="user_name">
                        <div class="user_name_name_link">
                            <a href="#">Святослав Белимов</a>
                        </div>
                        <div class="user_name_type">
                            Видеограф
                        </div>
                    </div>
                    <div class="user_rating">
                        <p>
                            <span class="profi">PROFI</span>
                        </p>
                        <p>
                            <span class="rating_minus">  - 233</span>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="user_cost">
                    Стоимость услуг: от <strong>20 000</strong> <i class="fa fa-ruble"></i> / проект
                </div> 
            </div>
        </div>
        <div class="grid_5">
            <div class="top_users_bg">
                <div class="user_info">
                    <div class="user_avatar">
                        <img src="/assets/images/giUnGSt9-LA.jpg">
                    </div>
                    <div class="user_name">
                        <div class="user_name_name_link">
                            <a href="#">Святослав Белимов</a>
                        </div>
                        <div class="user_name_type">
                            Видеограф
                        </div>
                    </div>
                    <div class="user_rating">
                        <p>
                            <span class="profi">PROFI</span>
                        </p>
                        <p>
                            <span class="rating_minus">  - 233</span>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="user_cost">
                    Стоимость услуг: от <strong>20 000</strong> <i class="fa fa-ruble"></i> / проект
                </div>
            </div>
        </div>
        <div class="grid_5">
            <div class="top_users_bg">
                <div class="user_info">
                    <div class="user_avatar">
                        <img src="/assets/images/giUnGSt9-LA.jpg">
                    </div>
                    <div class="user_name">
                        <div class="user_name_name_link">
                            <a href="#">Святослав Белимов</a>
                        </div>
                        <div class="user_name_type">
                            Видеограф
                        </div>
                    </div>
                    <div class="user_rating">
                        <p>
                            <span class="profi">PROFI</span>
                        </p>
                        <p>
                            <span class="rating_minus">  - 233</span>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="user_cost">
                    Стоимость услуг: от <strong>20 000</strong> <i class="fa fa-ruble"></i> / проект
                </div>
            </div>
        </div>
    </div>

<?php echo $footer;