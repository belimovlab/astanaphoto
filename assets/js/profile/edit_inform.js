var EditInformApp = CreateApp({
    jq:'',
    about_legth: '',
    ad_gen: [],
    update_param: function(param_name,param_value){
        var _this = this;
        _this.jq.ajax({
            type: "POST",
            url: '/profile/update_param',
            data: {param_name: param_name, param_value:  param_value},
            success: function(data){
                var response = JSON.parse(data);
                if(response['status']=='success')
                {
                    $.toast({
                        heading: 'Готово!',
                        text: 'Информация успешно обновлена.',
                        position: 'bottom-right',
                        stack: false,
                        bgColor: '#009688'
                    });
                }
                else
                {
                    $.toast({
                        heading: 'Ошибка!',
                        text: 'Не удалось обновить информацию!',
                        position: 'bottom-right',
                        stack: false,
                        bgColor: '#ff4081'
                    });
                }
            }
        });
    },
    bind_button_click: function(){
        var _this = this;
        var param_value = undefined;
        var param_name  = undefined;
        
        _this.jq('.click_btn').click(function(){
            param_name  = _this.jq(this).attr('data-param_name');
            param_value = _this.jq('#'+param_name).val();
            if(param_name === 'about')
            {
                param_value = _this.get_trim_string(param_value);
            }
            if(param_name === 'ad_gen')
            {
                param_value = _this.ad_gen.join(";");
            }
            _this.update_param(param_name,param_value);
        });
    },
    get_trim_string: function(){
        var _this = this;
        var cnt = _this.jq('#about').val().trim();
        cnt = _this.my_trim(cnt).trim();
        return cnt;
    },
    count_symbols: function(){
        var _this = this;
        var tmp_str = _this.jq('#about').val();
        tmp_str = _this.get_trim_string(tmp_str);
        var cnt_tmp = _this.about_legth - tmp_str.length;
        if(cnt_tmp > 0)
        {
            _this.jq('#last_symbols').html(cnt_tmp);
        }
        else
        {
            _this.jq('#last_symbols').html(0);
            _this.jq('#about').val(tmp_str.substring(0,_this.about_legth));
        }
    },
    bind_textarea_change: function(){
        var _this = this;
        _this.jq('#about').on('keydown',function(){
            _this.count_symbols();
        });
        _this.jq('#about').on('change',function(){
            _this.count_symbols();
        });
        _this.jq('#about').on('keyup',function(){
            _this.count_symbols();
        });
        _this.jq('#about').on('click',function(){
            _this.count_symbols();
        });
        _this.jq('#about').on('touch',function(){
            _this.count_symbols();
        });
        
    },
    init_texarea_grow: function(){
        var _this = this;
        _this.jq('#about').autoGrow();
    },
    fill_ad_gen: function(){
        var _this = this;
        _this.ad_gen = window.ad_gen;
    },
    bind_checkbox: function(){
        var _this = this;
        _this.jq('.checkbox').click(function(){
            if(_this.jq(this).prop('checked'))
            {
                if(_this.ad_gen.length < 3)
                {
                    _this.ad_gen.push(_this.jq(this).attr("data-ad_gen_value"));
                }
                else
                {
                    _this.jq(this).prop("checked", false);
                    $.toast({
                        heading: 'Ошибка!',
                        text: 'Уже выбрано максимальное количество дополнительных специализаций',
                        position: 'bottom-right',
                        stack: false,
                        bgColor: '#ff4081'
                    });
                }
            }
            else
            {
                var i = _this.ad_gen.indexOf(_this.jq(this).attr("data-ad_gen_value"));
                if(i != -1) {
                    _this.ad_gen.splice(i, 1);
                }
            }
        });
    },
    init: function(jquery){
        this.jq = jquery;
        this.init_texarea_grow();
        this.bind_button_click();
        this.bind_textarea_change();
        this.bind_checkbox();
        this.fill_ad_gen();
        this.about_legth = window.profi_about_length;
    }
});

$(document).ready(function() {
    EditInformApp.init($);
});