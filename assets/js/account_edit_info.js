var EditApp = new CreateApp({ 
    jq: '',
    url: '/account/set_new_value',
    send_request: function(data_send,callback,url){
        var _th     = this; var tmp_url ='';
        if(url !== undefined){tmp_url = url;}else{tmp_url = _th.url;}
        _th.jq.ajax({type: "POST",url: tmp_url,data: data_send,success: function(ret_data){callback(ret_data);}});
    },
    get_value: function(data){
        alert(data+ "123123");
    },
    bind_buttons_click: function(){
        var _th = this;
        _th.jq('.update_ajax').click(function(e){
            e.preventDefault();
            _th.send_request({
                name: _th.jq(this).attr('data-name'),
                value: _th.jq('#'+_th.jq(this).attr('data-id_for_value')).val()
            },_th.get_value);
        });
    },
    init: function(jquery){ 
        this.jq = jquery; 
        this.bind_buttons_click();

    } 
}); 




$(document).ready(function() {
    EditApp.init($);
});