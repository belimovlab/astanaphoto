<?php echo $header;?>

<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title;?></div>
        <div class="panel_content">
            <form action="<?php echo base_url('/account/try_forgot_2')?>" method="POST">
                <p>
                    <label for="password">Пароль</label>
                </p>
                <p>
                    <input type="password" required name="password" placeholder="Пароль..." id="password">
                </p>
                <p>
                    <label for="repassword">Подтверждение пароля</label>
                </p>
                <p>
                    <input type="password" required name="repassword" placeholder="Пароль..." id="repassword">
                </p>
                  <p style="text-align: center;">
                    <button class="btn btn_blue" type="submit">Изменить пароль и активировать аккаунт</button>
                </p>
            </form>
        </div>
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Краткая информация</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Смена</strong> пароля позволит вам восстановить доступ к вашему аккаунту.</li>
                    <li><strong>Войти</strong> с помощью нового пароля вы сможете сразу же, после его смены.</li>
                </ul>
            </div>

        </div>
    </div>

</div>
<?php echo $footer;