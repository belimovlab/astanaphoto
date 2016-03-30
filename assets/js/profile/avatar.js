var AvatarApp = CreateApp({
    jq: '',
    flow: undefined,
    upload_url: '/profile/uploads',
    progressbar: '',
    allow_extensions: ['jpg','jpeg','png','gif','bmp'],
    bind_save_avatar: function(){
        var _this = this;
        var new_file_name = _this.jq('#tmp_avatar_small').attr('data-file_name');
        _this.jq('#save_new_avatar').click(function(){
            _this.jq.ajax({
            type: "POST",
            url: '/profile/save_avatar',
            data: {file_name: new_file_name},
            success: function(data){
                var response = JSON.parse(data);
                if(response['status']=='success')
                {
                    $.toast({
                        heading: 'Готово!',
                        text: 'Фотография успешно обновлена.',
                        position: 'bottom-right',
                        stack: false,
                        bgColor: '#009688'
                    });
                    _this.jq('#new_avatar_block').css('display','none');
                    _this.jq('#now_big_avatar').attr('src','/content/user_avatars/big_'+new_file_name);
                    _this.jq('#now_small_avatar').attr('src','/content/user_avatars/small_'+new_file_name);
                }
                else
                {
                    $.toast({
                        heading: 'Ошибка!',
                        text: 'Фотография не была обновлена.',
                        position: 'bottom-right',
                        stack: false,
                        bgColor: '#ff4081'
                    });
                }
            }
        });
            
        });
    },
    show_new_avatar: function(filename){
        var _this = this;
        _this.jq('#tmp_avatar_big').attr('src','/content/user_avatar_temp/260_'+filename);
        _this.jq('#tmp_avatar_small').attr('src','/content/user_avatar_temp/30_'+filename);
        _this.jq('#tmp_avatar_small').attr('data-file_name',filename);
        _this.jq('#new_avatar_block').css('display','block');
        _this.bind_save_avatar(filename);
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
                _this.jq('#new_avatar_block').css('display','none');
                console.log(file);
            });
            _this.flow.on('fileSuccess', function(file,message){
                console.log(file,message);
                $.toast({
                    heading: 'Готово!',
                    text: 'Файл успешно загружен.',
                    position: 'bottom-right',
                    stack: false,
                    bgColor: '#009688'
                });
                var response = JSON.parse(message);
                if(response.success === 1)
                {
                    _this.show_new_avatar(response.file_name);
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
        this.init_flow();
        this.bind_drop_area_and_button();
        this.bind_flow_events();

    }
});


$(document).ready(function() {
    AvatarApp.init($);
});