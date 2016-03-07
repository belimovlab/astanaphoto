<?php
    
    class MainSiteConfig{
        private static $outer_config = array(
            'site_url'              => 'http://astanaphoto.cms/',
            'site_panel_url'        => 'http://astanaphoto.cms/panel/',
            'site_title'            => 'Астана Фото',
            'site_set_session_path' => './cache_sess',
            'encryption_key'        => 'Super_secret_key_5203',
            'db_host'               => 'localhost',
            'db_user'               => 'root',
            'db_password'           => 'pass',
            'db_name'               => 'astanaphoto.cms',
            'noreply_email'         => 'noreply@omskphoto.ru',
            'email_from_name'       => 'Администрация сервиса',
            'not_avatar_big'        => array(
                                            'male'=> '/assets/images/male_avatar.png',
                                            'female' => '/assets/images/female_avatar.png' 
                                       )
        );
        public static function get_item($key)
        {
            return self::$outer_config[$key];
        }
    }



     

