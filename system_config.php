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
                                            'male'=> '/assets/images/male_avatar_10.png',
                                            'female' => '/assets/images/female_avatar_10.png' 
                                       ),
            'not_avatar_small'      => array(
                                            'male'=> '/assets/images/male_avatar_10_small.png',
                                            'female' => '/assets/images/female_avatar_10_small.png' 
                                       ),
            'non_image_action'      => '/assets/images/non_image_action.png'
        );
        
        private static $profi_parametrs = array(
            'profi_about_length'          => 500,
            'non_profi_about_length'      => 300,
            'profi_photo_count'           => 20,
            'non_profi_photo_count'       => 10,
            'profi_personal_albums_count' => 5,
            'profi_best_photos'           => 10,
            'non_profi_best_photos'       => 5,
            'profi_actions'               => 6,
            'non_profi_actions'               => 3
            
        );
        


        private static $rating_value = array(
            'phone'      => 10,
            'skype'      => 10,
            'vk'         => 10,
            'facebook'   => 10,
            'twitter'    => 10,
            'ok'         => 10,
            'site'       => 15,
            'avatar'     => 25,
            'comment'    => 50,
            'bookmarks'  => 30,
            'actions'    => 25,
            'about'      => 10,
            'profi'      => 100,
            'profi_cost' => 100
        );

        public static function get_profi_parametrs($key)
        {
            return self::$profi_parametrs[$key];
        }
        
        
        public static function get_rating_value($key)
        {
            return self::$rating_value[$key];
        }

        public static function get_item($key)
        {
            return self::$outer_config[$key];
        }
    }



     

