/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
 
  $(".news_list").owlCarousel({
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 3
  });
  
  

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
    
    
    $('.photo_list_item').click(function(){
        gallery.init();
        //alert('dfg');
    });
  

});