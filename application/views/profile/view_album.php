<?php echo $header;?>
<script>
    window.is_personal = 0;
</script>
<div class="sub_top">
    <div class="content_top">
        <a href="<?php echo base_url('/profile')?>">Мой профиль</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/edit_portfolio')?>">Редактирование портфолио</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo base_url('/profile/view_album/'.$album_info->id)?>">Альбом: <?php echo $album_info->name;?></a>
        
        <span class="balance_top"><a href="<?php echo base_url('/profile/balance')?>"><?php echo number_format($user_info->balance ? $user_info->balance : 0,2,'.',' ')?> <i class="fa fa-ruble"></i></a></span>
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
            <span id="hidden_album_id" data-album-id="<?php echo $album_info->id?>"></span>
            <div class="sub_content_block">
                <div class="sub_title">1. Загрузка фотографий</div>
                <div class="sub_content_block_content">
                    <p>
                        <label>Выберите фотографию через диалоговое окно или просто перетащите их в поле ниже.</label>
                    </p>
                    <div class="clearfix"></div>
                    <div class="drozone" id="upload_dropzone">
                        <button class="btn btn_blue" id="upload_btn"><i class=" fa fa-upload"></i> Выберите изображение</button> или перетащите его сюда
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
            <div class="clearfix"></div>

            <div class="sub_content_block">
                <div class="sub_title">2. Текущие фотографии</div>
                <div class="sub_content_block_content">
                    <p>
                        <label>Фотографии, которые на данный момент размещены у вас в альбоме.</label>
                    </p>
                    <div class="clearfix"></div>
                    <div class="album_photo_list"  data-gal_id="<?php echo $album_info->id?>">
                        <?php foreach($albums_photos as $one):?>
                        <div class="album_photo_list_item">
                            <div class="sub_links">
                                <?php if(in_array($one->id, $best_photos)):?>
                                <a href="<?php echo base_url('/profile/unset_from_bests/'.$one->id)?>"><i class="fa fa-star-o"></i> Из лучшего</a>
                                <?php else:?>
                                <a href="<?php echo base_url('/profile/set_to_bests/'.$one->id)?>"><i class="fa fa-star"></i> В лучшие</a>
                                <?php endif;?>
                            </div>
                            <div class="clearfix"></div>
                            <img src="/content/user_photos/140_<?php echo $one->filename?>" data-show_src="/content/user_photos/original_<?php echo $one->filename?>" data-show_h="<?php echo $one->height?>" data-show_w="<?php echo $one->width?>"   data-gal_id_img="<?php echo $album_info->id?>">
                            <div class="clearfix"></div>
                            <div class="sub_links">
                                <a href="<?php echo base_url('/profile/delete_photo/'.$one->id)?>"><i class="fa fa-trash"></i> Удалить</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="clearfix"></div>
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
                    <li><strong>Загрузка фотографий</strong> максимаотна упрощена для вас.</li>
                    <li><strong>Количество</strong> фотографий в каждый альбом является ограниченным. Для пользователей с пометкой <strong>PROFI</strong> в альбом загружаются до <strong><?php echo MainSiteConfig::get_profi_parametrs('profi_photo_count')?></strong> фотографий и до <strong><?php echo MainSiteConfig::get_profi_parametrs('non_profi_photo_count')?></strong> фотографий для всех остальных пользователей.</li>
                    <li><strong>В лучшие</strong> работы вы можете добавить фотографии, которые вы сами считаете вашими лучшими работами. Ограничение на количество фотографий в разделе составдяет до <strong><?php echo MainSiteConfig::get_profi_parametrs('profi_best_photos')?></strong> для пользователей с пометкой <strong>PROFI</strong> и до <strong><?php echo MainSiteConfig::get_profi_parametrs('non_profi_best_photos')?></strong> фотографий для всех остальных пользователей. </li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/profile/edit_portfolio')?>"><i class="fa fa-angle-left"></i> Вернуться к портфолио</a>
            </p>
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