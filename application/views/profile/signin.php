<?php echo $header;?>
<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title ?  $title : 'Войти в сервис';?></div>
        <div class="panel_content">
            <form action="<?php echo base_url('/profile/try_signin')?>" method="POST">
            <?php if($error):?>
                <p class="error_mess"><?php echo $error;?></p>
            <?php endif;?>
            <p>
                <label for="email">Email</label>
            </p>
            <p>
                <input type="text" required name="email" placeholder="Email..." id="email" value="<?php echo $email ? $email : '';?>">
            </p>
            <p>
                <label for="password">Пароль</label>
            </p>
            <p>
                <input type="password" required name="password" placeholder="Пароль..." id="password" value="<?php echo $password ? $password : '';?>">
            </p>
            <p style="text-align: center;">
                <button class="button master" type="submit">Войти в сервис</button>
            </p>
            </form>
        </div>
        <a class="show_all_button" href="<?php echo base_url('/profile/forgot_password')?>">Я забыл пароль. Хочу восстановить свой пароль</a>
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
        </div>
        <p class="btn_more">
            <a href="<?php echo base_url('/profile/signup')?>">Зарегистрироваться</a>
        </p>
    </div>
</div>

<?php echo $footer;