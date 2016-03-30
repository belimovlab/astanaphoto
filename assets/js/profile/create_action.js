var CreateActionApp = CreateApp({
    jq:'',
    flow: undefined,
    errors: {
        size_error   : "Размеры картинки не соответствуют заданным условиям.",
        unknonw_file : "Изображение не удалось сохранить."
    },
    upload_url: '/profile/upload_action',
    progressbar: '',
    allow_extensions: ['jpg','jpeg','png'],
    init_texarea_grow: function(){
        var _this = this;
        _this.jq('#text').autoGrow();
        _this.jq('#text').trumbowyg();
    },
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
                var response = JSON.parse(message);
                if(response.success === 1)
                {
                    _this.show_image(response.file_name);
                }else
                {
                    $.toast({
                        heading: 'Ошибка!',
                        text: _this.errors[response.error_message],
                        position: 'bottom-right',
                        stack: false,
                        bgColor: '#ff4081'
                    });
                    _this.flow.cancel();
                    _this.flow.removeFile(file);
                }
            });
            _this.flow.on('fileError', function(file, message){
                console.log(file, message);
            });
            _this.flow.on('filesSubmitted', function(file) {
                if(file.length > 1)
                {
                    $.toast({
                        heading: 'Ошибка!',
                        text: 'Загрузите только один файл!',
                        position: 'bottom-right',
                        stack: false,
                        bgColor: '#ff4081'
                    });
                    _this.flow.cancel();
                }
                else
                {
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
                            stack: false,
                            bgColor: '#ff4081'
                        });
                        _this.flow.cancel();
                        _this.flow.removeFile(file);
                    }
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
    show_image: function(filename){
        var _this = this;
        _this.jq('#big_show_image').attr('src','/content/user_action/740_'+filename);
        _this.jq('#small_show_image').attr('src','/content/user_action/200_'+filename);
        _this.jq('#show_image').css('display','block');
        _this.jq('#file_name_value').val(filename);
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
            singleFile: true,
            query:{
                upload_token:'Secret_key'
            }
        });
        if(!_this.flow.support) location.href = '/profile';
    },
    init: function(jquery){
        this.jq = jquery;
        this.init_texarea_grow();
        this.init_flow();
        this.bind_drop_area_and_button();
        this.bind_flow_events();
    }
});

$(document).ready(function() {
    CreateActionApp.init($);
});