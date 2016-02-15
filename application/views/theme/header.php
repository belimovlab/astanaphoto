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
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon"/>
</head>
<body>
    <header>
        <div class="container_15">
            <div class="grid_3 logo">
                <a href="<?php base_url('/')?>"><img src="/assets/images/logo.png"></a>
            </div>
            <div class="grid_10 navigation">
                <a href="<?php echo base_url('/doer')?>">Исполнители</a>
                <a href="<?php echo base_url('/projects')?>">Проекты</a>
                <a href="<?php echo base_url('/actions')?>">Акции</a>
                <a href="<?php echo base_url('/contest')?>">Конкурсы</a>
                <a href="<?php echo base_url('/news')?>">Статьи</a>
                <a href="<?php echo base_url('/more')?>">Еще...</a>
            </div>
            <div class="grid_2 login_area">
                <a href="<?php echo base_url('/profile/signin')?>" class="button master"><i class="fa fa-key"></i> Войти</a>
            </div>
        </div>
    </header>