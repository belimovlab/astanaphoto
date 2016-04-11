var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}};


var BalanceApp = CreateApp({
    jq: '',
    sended_url: '/profile/get_ajax_balance_more',
    errors: {
        not_ajax : 'Это не AJAX запрос',
        not_view:  'Информации для отображения отсутствует'
    },
    last_history_id: undefined,
    get_min_id: function(){
        var _this = this;
        var tmp_mas = [];
        _this.jq('.viewed').each(function(index){
            tmp_mas.push(_this.jq(this).attr('data-history-id'));
            
        });
        tmp_mas.sort();
        if(tmp_mas[0] !== undefined)
        {
            _this.last_history_id = tmp_mas[0];
        }
    },
    bind_click: function(){
        var _this = this;
        _this.jq('#tbody_balance_btn').click(function(){
            var iii = _this.jq(this).find('i');
            iii.addClass(" fa-spin");
            _this.get_min_id();
            _this.jq.ajax({
                type: "POST",
                url: _this.sended_url,
                data: {last_id: _this.last_history_id},
                success: function(data){
                    iii.removeClass("fa-spin");
                    var ddd = JSON.parse(data);
                    ddd = Base64.decode(ddd.text);
                    if(ddd === "not_more")
                    {
                        _this.jq('#btn_text').html('Записей в истории больше нет');
                    }
                    else
                    {
                        _this.jq('#tbody_balance').html(_this.jq('#tbody_balance').html() + ddd);
                    }
                }
            });
        });
    },
    init: function(jquery){
        this.jq = jquery;
        this.bind_click();
    }
});


$(document).ready(function() {
    BalanceApp.init($);
});