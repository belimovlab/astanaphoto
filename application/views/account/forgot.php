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
            <form action="<?php echo base_url('/account/try_forgot')?>" method="POST">
                <p>
                    <label for="email">Email</label>
                </p>
                <p>
                    <input type="email" required name="email" placeholder="Email..." id="email">
                </p>
                  <p style="text-align: center;">
                    <button class="btn btn_blue" type="submit">Высслать письмо с инструкцией</button>
                </p>
            </form>
        </div>
        <a class="show_all_button" href="<?php echo base_url('/account/login')?>">Я вспомнил пароль и хочу войти</a>
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Краткая информация</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Если</strong> вы забыли пароль, введите ваш Email, на который мы пришлем вам письмо с инструкцией для восстановления пароля.</li>
                    <li><strong>Если</strong> вы не получали письмо для активации вашего аккаунта, введите ваш Email, на который мы вам вышлем письмо для активации повторно.</li>
                    <li><strong>В каждом</strong>  случае вам будет необходимо задать новый пароль.</li>
                    <li><strong>Если</strong> письмо по каким либо причинам не доходит до вас, свяжитесь с <a href="<?php echo base_url('/support')?>" class="right_terms">техподдержкой</a>, и наши специалисты помогут вам преодолеть эти трудности.</li>
                </ul>
            </div>
            <p class="btn_more">
                <a href="<?php echo base_url('/account/login')?>">Войти</a>
        </p>
        </div>
    </div>

</div>
<?php echo $footer;