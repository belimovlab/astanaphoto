var AlbumApp = CreateApp({
    jq: '',
    album_id: '',
    items: [],
    gallery_list: [],
    options: [],
    pswpElement: '',
    flow: undefined,
    errors: {
        error_count       : 'Превышено количетсво фотографий в альбоме',
        error_album_exist : 'Такого альбома не существует',
        unknown_error     : 'Неизвестная ошибка'
    },
    upload_url: '/profile/albums_uploads',
    progressbar: '',
    allow_extensions: ['jpg','jpeg','png','gif','bmp'],
    bind_flow_events: function(){
        var _this = this;
        var options = {
            id: 'top-progress-bar',
            color: '#03a9f4', 
            height: '2px', 
            duration: 0.2
        };
        _this.progressbar = new ToProgress(options);
        if(_this.flow !== undefined)
        {
            _this.flow.on('fileAdded', function(file, event){
                console.log(file);
            });
            _this.flow.on('fileSuccess', function(file,message){
                console.log(file,message);
                if(JSON.parse(message).success === 1)
                {
                    _this.reload_photo_list(JSON.parse(message));
                    $.toast({
                        heading: 'Готово!',
                        text: 'Фоторгафия успешно загружена',
                        position: 'bottom-right',
                        stack: true,
                        bgColor: '#009688'
                    });
                }
                else
                {
                    $.toast({
                        heading: 'Ошибка!',
                        text: _this.errors[JSON.parse(message).error_type],
                        position: 'bottom-right',
                        stack: true,
                        bgColor: '#ff4081'
                    });
                }
            });
            _this.flow.on('fileError', function(file, message){
                console.log(file, message);
            });
            _this.flow.on('complete', function(file, message){
                _this.flow.cancel();
            });
            _this.flow.on('filesSubmitted', function(file) {

                if(_this.allow_extensions.indexOf(file[0].name.substr((~-file[0].name.lastIndexOf(".") >>> 0) + 2).toLowerCase()) !== -1)
                {
                    _this.flow.upload();
                }
                else
                {
                    $.toast({
                        heading: 'Ошибка!',
                        text: 'Неправильное расширение файла! Файл должен иметь расширение одно из '+_this.allow_extensions.toString(),
                        position: 'bottom-right',
                        stack: true,
                        bgColor: '#ff4081'
                    });
                    _this.flow.cancel();
                }
            });
            _this.flow.on('fileProgress', function(file){
               _this.progressbar.increase(Math.floor(file.progress()*100));
            });
            _this.flow.on('complete', function(){
                _this.progressbar.finish();
            });
        }

    },
    bind_drop_area_and_button: function(){
        var _this = this;
        _this.flow.assignBrowse(document.getElementById('upload_btn'));
        _this.flow.assignDrop(document.getElementById('upload_dropzone'));
    },
    init_flow: function(){
        var _this = this;
        _this.flow = new Flow({
            target: _this.upload_url,
            chunkSize: 1024*1024,
            testChunks: false,
            query:{
                upload_token: 'Secret_key',
                album_id: _this.album_id
            }
        });
        if(!_this.flow.support) location.href = '/profile';
    },
    reload_photo_list: function(response){
        var _this = this;
        var is_personal = '';
        if(window.is_personal)
        {
            is_personal = '_personal';
        }
        else
        {
            is_personal = "";
        }
        
        var new_div =   '<div class="album_photo_list_item">' + 
                            '<div class="sub_links">' +
                                '<a href="/profile/set_to_bests'+is_personal+'/'+ response.file_id  +'"><i class="fa fa-star"></i> В лучшие</a>' +
                            '</div>' +
                            '<div class="clearfix"></div>' +
                                '<img src="/content/user_photos/140_'+response.file_name +'" data-show_src="/content/user_photos/original_' + response.file_name + '" data-show_h="' + response.height + '" data-show_w="' + response.width + '">' +
                                '<div class="clearfix"></div>' +
                                '<div class="sub_links">' +
                                    '<a href="/profile/delete_photo'+is_personal+'/' + response.file_id + '"><i class="fa fa-trash"></i> Удалить</a>' +
                                '</div>' +
                            '<div class="clearfix"></div>' +
                        '</div>';
        _this.jq('.album_photo_list').append(new_div);
        _this.items = [];
        _this.re_init_photoswipe();
        
    },
    bind_click: function(){
        var _th = this;
        _th.jq('.album_photo_list_item img').unbind('click');
        _th.jq('.album_photo_list_item img').click(function(){
            var ss = _th.jq(this).attr('data-gal_id_img');
            _th.gallery_list[ss].listen('close', function(){
                _th.set_ps_gallery();
                _th.bind_click();
            });
            _th.gallery_list[ss].init();
        });

    },
    create_new_gallery: function(el){
        var _th = this;
        
        el.find('.album_photo_list_item').each(function(index1){
            var tmp_ell = _th.jq(this);
            if(tmp_ell.find('img').attr('data-show_src') !== undefined && tmp_ell.find('img').attr('data-show_h') !== undefined &&  tmp_ell.find('img').attr('data-show_w') !== undefined)
            {
                
                _th.items[el.attr('data-gal_id')].push({
                    src: tmp_ell.find('img').attr('data-show_src'),
                    h:   tmp_ell.find('img').attr('data-show_h'),
                    w:   tmp_ell.find('img').attr('data-show_w')
                });
            }
        });
    },
    set_ps_gallery: function(){
        var _th = this;
        _th.jq('.album_photo_list').each(function(index){
            var tmp_gal = $(this);
            _th.items[tmp_gal.attr('data-gal_id')] = [];
            _th.create_new_gallery(tmp_gal);
            _th.gallery_list[tmp_gal.attr('data-gal_id')]= new PhotoSwipe( _th.pswpElement, PhotoSwipeUI_Default, _th.items[tmp_gal.attr('data-gal_id')],_th.options);
        });
    },
    re_init_photoswipe: function(){
        this.pswpElement = document.querySelectorAll('.pswp')[0];
        this.set_ps_gallery();
        this.bind_click();
    },
    init: function(jquery){
        this.jq = jquery;
        this.album_id = this.jq('#hidden_album_id').attr('data-album-id');
        this.init_flow();
        this.bind_drop_area_and_button();
        this.bind_flow_events();
        this.re_init_photoswipe();
    }
});


$(document).ready(function() {
    AlbumApp.init($);
});