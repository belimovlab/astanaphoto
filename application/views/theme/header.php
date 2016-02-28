<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo $title ? $title: SITE_TITLE;  ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="/assets/css/normalize.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/grid.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/common.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/owl.theme.css" rel="stylesheet" type="text/css"/>
    <?php foreach($css as $one):?>
        <?php if($one):?>
            <link href="/assets/css/<?php echo $one?>.css" rel="stylesheet" type="text/css"/>
        <?php endif;?>
    <?php endforeach;?>
    <meta name="viewport" content="width=1200px">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/assets/js/jquery-2.1.3.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/main_app.js"></script>
    <link rel="icon" href="/assets/images/favicon_1.ico" type="image/x-icon"/>
</head>
<body>
    <header>
        <div class="container_15">
            <div class="grid_3 logo">
                <a href="<?php echo base_url('/')?>"><img src="/assets/images/logo.png"></a>
            </div>
            <div class="grid_6 navigation">
                <a href="<?php echo base_url('/doer')?>">Исполнители</a>
                <a href="<?php echo base_url('/actions')?>">Акции</a>
                <a href="<?php echo base_url('/contest')?>">Конкурсы</a>
                <a href="<?php echo base_url('/news')?>">Статьи</a>
            </div>
            <div class="grid_6 login_area">
                <?php if($user_info->id):?>
                <a href="<?php echo base_url('/account')?>" class="my_profile1"> <img src="/content/user_avatars/small_photo.png"> <?php echo $user_info->first_name." ".$user_info->second_name?></a>
                <a href="<?php echo base_url('/profile/signout')?>" class="my_profile button red"><i class="fa fa-power-off"></i> Выйти</a>
                <?php else:?>
                <a href="<?php echo base_url('/profile/signin')?>" class="button master"><i class="fa fa-key"></i> Войти</a>
                <?php endif;?>
            </div>
        </div>
    </header>