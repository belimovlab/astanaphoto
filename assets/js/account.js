var StorageApp = new CreateApp({ 
    jq: '',
    items: [],
    gallery_list: [],
    options: [],
    pswpElement: '',
    bind_click: function(){
        var _th = this;
        _th.jq('.photo_list_item').click(function(){
            var ss = _th.jq(this).parent().attr('data-gal_id');
            _th.gallery_list[ss].listen('close', function(){
                _th.set_ps_gallery();
                _th.bind_click();
            });
            _th.gallery_list[ss].init();
        });

    },
    create_new_gallery: function(el){
        var _th = this;
        el.find('.photo_list_item').each(function(index1){
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
    check_main_element: function(){
        var _th = this;
        var tmp_el = $('body').has('.pswp');
        if(tmp_el.length === 0)
        {
            $('body').append('<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">'+
                    '<div class="pswp__bg"></div>'+'<div class="pswp__scroll-wrap">' +'<div class="pswp__container">' +
                    '<div class="pswp__item"></div>' +'<div class="pswp__item"></div>' +'<div class="pswp__item"></div>' +
                    '</div>' +'<div class="pswp__ui pswp__ui--hidden">' +'<div class="pswp__top-bar">' +
                    '<div class="pswp__counter"></div>' +'<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>' +
                    '<button class="pswp__button pswp__button--share" title="Share"></button>' +
                    '<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>' +
                    '<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>' +
                    '<div class="pswp__preloader">' +'<div class="pswp__preloader__icn">' +
                    '<div class="pswp__preloader__cut">' +'<div class="pswp__preloader__donut"></div>' +'</div>' +'</div>' +'</div>' +'</div>' +
                    '<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">' +'<div class="pswp__share-tooltip"></div>' +
                    '</div>' +'<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">' +
                    '</button>' +'<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">' +'</button>' +
                    '<div class="pswp__caption">' +'<div class="pswp__caption__center"></div>' +'</div>' +'</div>' +'</div>' +'</div>');
        }
        _th.pswpElement = document.querySelectorAll('.pswp')[0];
    },
    set_ps_gallery: function(){
        var _th = this;
        _th.jq('.photo_list').each(function(index){
            var tmp_gal = $(this);
            _th.items[tmp_gal.attr('data-gal_id')] = [];
            _th.create_new_gallery(tmp_gal);
            _th.gallery_list[tmp_gal.attr('data-gal_id')]= new PhotoSwipe( _th.pswpElement, PhotoSwipeUI_Default, _th.items[tmp_gal.attr('data-gal_id')],_th.options);
        });
    },
    init: function(jquery){ 
        this.jq = jquery; 
        this.check_main_element();
        this.set_ps_gallery();
        this.bind_click();
    } 
}); 




$(document).ready(function() {
    StorageApp.init($);
});