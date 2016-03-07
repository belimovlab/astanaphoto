<?php echo $header;?>

<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title;?></div>
        <div class="panel_content">
            <?php if($error):?>
            <p class="error_mess">
                <?php echo $error;?>
            </p>
            <?php endif;?>
            <?php if($success):?>
            <p class="success_mess">
                <?php echo $success;?>
            </p>
            <?php endif;?>
            <form action="<?php echo base_url('/account/try_login')?>" method="POST">
                <p>
                    <label for="email">Email</label>
                </p>
                <p>
                    <input type="email" required name="email" placeholder="Email..." id="email">
                </p>
                <p>
                    <label for="password">Пароль</label>
                </p>
                <p>
                    <input type="password" required name="password" placeholder="Пароль..." id="password">
                </p>
                <p style="text-align: center;">
                    <button class="btn btn_blue" type="submit">Войти в сервис</button>
                </p>
            </form>
        </div>
        <a class="show_all_button" href="<?php echo base_url('/account/forgot')?>">Я забыл пароль. Хочу восстановить свой пароль</a>
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Преимущества регистрации</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Зарегистрированному</strong> пользователю доступны все функции сервиса.</li>
                    <li><strong>Зарегистрированный</strong>  пользователь может предлагать свои услуги большому количеству пользователей.</li>
                    <li><strong>Зарегистрированному</strong>  пользователю доступны уведомления от исполнителей.</li>
                    <li><strong>Зарегистрированный</strong>  пользователь имеет возможность создать собственные списки необходимых ему исполнителей.</li>
                    <li><strong>Зарегистрированному</strong>  пользователю доступны уведомления от исполнителей.</li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/account/registration')?>">Зарегистрироваться</a>
        </p>
        </div>
    </div>

</div>
<?php echo $footer;