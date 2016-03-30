/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        
 /*
    var pswpElement = document.querySelectorAll('.pswp')[0];
    
    var items = [

    ];
    
    var options = [

    ];

    $('.photo_list_item').each(function(index){
        items.push({
            src: $(this).find('img').attr('data-show_src'),
            h:   $(this).find('img').attr('data-show_h'),
            w:   $(this).find('img').attr('data-show_w')
        });
    });
    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items,options);
    
    
    $('.photo_list_item').click(function(e){
        e.preventDefault();
        gallery.init();
        //alert('dfg');
    });
  
*/

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
        this.pswpElement = document.querySelectorAll('.pswp')[0];
        this.set_ps_gallery();
        this.bind_click();
    } 
}); 




$(document).ready(function() {
    StorageApp.init($);
});