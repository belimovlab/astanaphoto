<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=1200px">
    <link rel="icon" href="/assets/images/favicon_1.ico" type="image/x-icon"/>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="/assets/css/common/normalize.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/common/grid.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/common/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/common/common.css" rel="stylesheet" type="text/css"/>
    <?php if($meta_description):?>
    <meta name="description" content="<?php echo $meta_description;?>">
    <?php endif;?>
    <?php if($meta_keywords):?>
    <meta name="keywords" content="<?php echo $meta_keywords;?>">
    <?php endif;?>

    <?php foreach($css as $one):?>
        <?php if($one):?>
            <link href="/assets/css/<?php echo $one?>.css" rel="stylesheet" type="text/css"/>
        <?php endif;?>
    <?php endforeach;?>
    <script src="/assets/js/jquery-2.1.3.min.js"></script>
    
</head>
<body>
    <header>
        <div class="container_15">
            <div class="grid_3 logo">
                <a href="<?php echo base_url('/');?>"><img src="/assets/images/logo.png"></a>
            </div>
            <div class="grid_6 navigation">
                <a href="<?php echo base_url('/doer')?>">Исполнители</a>
                <a href="<?php echo base_url('/actions')?>">Акции</a>
                <a href="<?php echo base_url('/contest')?>">Конкурсы</a>
                <a href="<?php echo base_url('/news')?>">Статьи</a>
            </div>
            <div class="grid_6 login_area">
                <?php if(!$user_info->user_id):?>
                <a href="<?php echo base_url('/account/login')?>" class="btn btn_blue">Войти</a>
                <?php else:?>
                <div class="login_area_user">
                    <div class="user_name">
                        <a href="<?php echo base_url('/profile')?>"><img src="/assets/images/male_avatar_10_small.png"></a>
                        <a href="<?php echo base_url('/profile')?>">Святослав Белимов</a>
                    </div>
                    <div class="logout">
                        <a href="<?php echo base_url('/account/logout')?>" class="btn btn_red">Выйти</a>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </header>
    <section id="main_wrapper">
        
   