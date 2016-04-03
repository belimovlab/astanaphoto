<?php echo $header;?>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/view_portfolio_item/'.$album_id)?>">Просмотр альбома</a>
    </div>
</div>
<div class="container_15 margin_top_20px">
    <div class="grid_11">
        

        <div class="panel_item panel">
            <div class="panel_title"><?php echo $album_info_tmp->name?> </div>
            <div class="panel_content">
                <div class="photo_list" data-gal_id="1">
                    <?php if(count($album_photos) > 0):?>
                    <?php foreach($album_photos as $one):?>
                    <div class="photo_list_item">
                        <img src="/content/user_photos/140_<?php echo $one->filename?>" data-show_src="/content/user_photos/original_<?php echo $one->filename?>" data-show_h="<?php echo $one->height?>" data-show_w="<?php echo $one->width?>">
                    </div>
                    <?php endforeach;?>
                    <?php else:?>
                    <p class="text_align_center">Нет лучших работ.</p>
                    <?php endif;?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        
        
        <div class="clearfix"></div>

        
    </div>
    <div class="grid_4">
        <div class=" panel dark_blue_panel">
            <div class="panel_title text_align_center">
                <?php echo $user_info->first_name.' '.$user_info->second_name;?>
            </div>
            <div class="panel_content">
                <div class="rigth_panel_avatar">
                    <img src="<?php echo $user_info->big_photo ? $user_info->big_photo : MainSiteConfig::get_item('not_avatar_big')[$user_info->sex]; ?>">
                    <a href="<?php echo base_url('/profile/edit_avatar')?>">Редактировать аватар</a>
                    <a href="<?php echo base_url('/profile/profi')?>" class="profi">Купить <strong>PROFI</strong></a>
                    <a href="<?php echo base_url('/mailbox')?>"><i class="fa fa-send"></i> Отправить сообщение</a>
                </div>
            </div>
            <div class="panel_title"><strong>РЕЙТИНГ</strong></div>
            <div class="panel_content right_content_contacts">
                <div class="panel_content right_content_contacts text_align_center balance">
                    <span class="rating_value_main color_<?php echo get_rating_color($user_info->rating)?>"> <?php echo get_rating($user_info->rating)  ;?></span>
                 </div>
            </div>
            <div class="panel_title"><strong>Статистика</strong></div>
            <div class="panel_content right_content_contacts">
                <ul>
                    <li><i class="fa fa-comments"></i> Отзывы <span class="rating_value color_red"> - 23</span></li>
                    <li><i class="fa fa-star"></i> В избранном <span class="rating_value"> 121</span></li>
                    <li><i class="fa fa-eye"></i> Просмотры <span class="rating_value"> 3 805</span></li>
                </ul>
            </div>
            <div class="panel_title">Контакты<span class="edit"><i class="fa fa-pencil"></i> <a href="<?php echo base_url('/profile/edit_contacts')?>">Редактировать</a></span></div>
            <div class="panel_content right_content_contacts">
                <ul>

                    <?php if($user_info->phone):?>
                    <li><i class="fa fa-phone"></i> <?php echo $user_info->phone?></li>
                    <?php endif;?>
                    
                    <?php if($user_info->skype):?>
                    <li><i class="fa fa-skype"></i> <?php echo $user_info->skype?></li>
                    <?php endif;?>
                    
                    <?php if($user_info->email):?>
                    <li><i class="fa fa-envelope"></i> <?php echo $user_info->email?></li>
                    <?php endif;?>

                    <?php if($user_info->vk):?>
                    <li><a href="<?php echo $user_info->vk?>" target="_blank"><i class="fa fa-vk"></i> Вконтакте</a></li>
                    <?php endif;?>

                    
                    <?php if($user_info->facebook):?>
                    <li><a href="<?php echo $user_info->facebook?>" target="_blank"><i class="fa fa-facebook"></i> facebook</a></li>
                    <?php endif;?>
                    
                    <?php if($user_info->twitter):?>
                    <li><a href="<?php echo $user_info->twitter?>" target="_blank"><i class="fa fa-twitter"></i> twitter</a></li>
                    <?php endif;?>
                    
                    <?php if($user_info->ok):?>
                    <li><a href="<?php echo $user_info->ok?>" target="_blank"><i class="fa fa-odnoklassniki"></i> Одноклассники</a></li>
                    <?php endif;?>
                    
                    <?php if($user_info->site):?>
                    <li> <a href="<?php echo $user_info->site?>" target="_blank"><i class="fa fa-chain"></i> Сайт</a></li>
                    <?php endif;?>

                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class=" panel dark_blue_panel margin_top_20px">
            <div class="panel_title">Баланс</div>
            <div class="panel_content right_content_contacts text_align_center color_green balance">
               0 <i class="fa fa-ruble"></i>
            </div>
            <a class="show_all_button" href="<?php echo base_url('/profile/balance_add')?>"><i class="fa fa-money"></i> Пополнить баланс</a>
        </div>
    </div>

</div>

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>
</div>

<?php echo $footer;