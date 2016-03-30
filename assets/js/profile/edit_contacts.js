var EditContacts = new CreateApp({ 
    jq: '',
    update_param: function(param_name,param_value){
        var _th = this;
        _th.jq.ajax({
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
    bind_btn_click: function(){
        var _th = this;
        var param_value = undefined;
        var param_name  = undefined;
        _th.jq('.click_btn').click(function(){
            param_name  = _th.jq(this).attr('data-param_name');
            param_value = _th.jq('#'+param_name).val();
            _th.update_param(param_name,param_value);
        });
    },
    init: function(jquery){ 
        this.jq = jquery; 
        this.bind_btn_click();
    } 
}); 




$(document).ready(function() {
    EditContacts.init($);
});