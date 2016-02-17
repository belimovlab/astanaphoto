<?php echo $header;?>
<div class="container_15 margin_top_20px">
    <div class="grid_11 panel">
        <div class="panel_title"><?php echo $title ?  $title : 'Войти в сервис';?></div>
        <div class="panel_content">
            <div class="sub_content_block">
                <?php if($error):?>
                <p class="error_mess"><?php echo $error;?></p>
                <?php endif;?>
                <form action="<?php echo base_url('/profile/try_signup')?>" method="POST">
                <div class="sub_title">1. Регистрационные данные</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="email">Email</label>
                    </p>
                    <p>
                        <input type="email" required name="email" placeholder="Email..." id="email" value="<?php echo $email ? $email : '';?>">
                    </p>
                    <p>
                        <label for="password">Пароль</label>
                    </p>
                    <p>
                        <input type="password" required name="password" placeholder="Пароль..." id="password" value="<?php echo $password ? $password : '';?>">
                    </p>
                    <p>
                        <label for="repassword">Пожтверждение пароля</label>
                    </p>
                    <p>
                        <input type="password" required name="repassword" placeholder="Подтверждение пароля..." id="repassword" value="<?php echo $repassword ? $repassword : '';?>">
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_content_block">
                <div class="sub_title">2. Личные данные</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="surname">Фамилия</label>
                    </p>
                    <p>
                        <input type="text" required name="surname" placeholder="Фамилия..." id="surname" value="<?php echo $surname ? $surname : '';?>">
                    </p>
                    <p>
                        <label for="name">Имя</label>
                    </p>
                    <p>
                        <input type="text" required name="name" placeholder="Имя..." id="name" value="<?php echo $name ? $name : '';?>">
                    </p>
                    <p>
                        <label for="birthday">Дата рождения</label>
                    </p>
                    <p>
                        <input type="date" required name="birthday" placeholder="01/01/1970" id="birthday" value="<?php echo $birthday ? $birthday : '';?>">
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_content_block">
                <div class="sub_title">3. Вид аккаунта</div>
                <div class="sub_content_block_content">
                    <p>
                        <label for="account">Род занятий</label>
                    </p>
                    <p>
                        <select name="account" id="account" required>
                            <option value="-1"   <?php echo $account < 1 || $account > 10  || $account == ''? 'selected="selected"' : '';?>  >Я буду пользоваться услугами</option>
                            <?php foreach($ganres as $one):?>
                            <option value="<?php echo $one->id?>" <?php echo $account == $one->id ? 'selected="selected"' : '';?>><?php echo $one->name?></option>
                            <?php endforeach;?>
                        </select>
                    </p>
                </div>
            </div>
            <p style="text-align: center;">
                <button class="button master" type="submit">Я принимаю условия и регистрируюсь в сервисе</button>
            </p>
            </form>
        </div>
        <a class="show_all_button" href="<?php echo base_url('/profile/signin')?>">У меня уже есть аккаунт. Войти</a>
    </div>
    <div class="grid_4 panel">
        <div class="panel_title">Информация о регистрации</div>
        <div class="panel_content">
            <div class="reg_advantage">
                <ul>
                    <li><strong>Регистрационные данные</strong> необходимы для дальнейшей авторизации в сервисе.</li>
                    <li><strong>Личные данные</strong>  необходимы для того, чтобы ваши клиенты могли быстро вас найти и воспользоваться вашими услугами.</li>
                    <li><strong>Вид акканута</strong> предоставляет разные функции для пользователя. Если вы хотите оказывать услуги пользователям сайта, 
                        выбирайте свой профиль деятельности. <br/><br/> Если же вы хотите воспользоваться услугами исполнителей этого сервиса, 
                        выбирайте вид аккаунта <strong>Я буду пользоваться услугами</strong></li>
                    <li><strong>Преимущество</strong>  зарегистрированных пользователей состоит в том, что вы можете добавлять в избранное нужных вам исполнителей, добавлять к ним заметки.</li>
                    <li><strong>Обязательным</strong> условием использования сервиса является абсолютное и полное согласие с <a href="<?php echo base_url('/terms')?>" class="right_terms">условиями использования сервиса.</a></li>
                    <li><strong>Уже есть аккаунт?</strong> Авторизуйтесь в сервисе.</li>
                </ul>
            </div>
        </div>
        <p class="btn_more">
            <a href="<?php echo base_url('/profile/signin')?>">Войти</a>
        </p>
    </div>
</div>

<?php echo $footer;