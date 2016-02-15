<div class="clearfix"></div>
<div class="container_15">
    <div class="grid_15 footer">
        Astanafoto.kz &copy; 2016
        <a href="<?php echo base_url('/about')?>">О проекте</a>
        <a href="<?php echo base_url('/terms')?>">Условия использования</a>
        <a href="<?php echo base_url('/feedvack')?>">Обратная связь</a>
        <a href="<?php echo base_url('/support')?>">Тех. поддержка</a>
        <a href="<?php echo base_url('/ad')?>">Реклама</a>
    </div>
</div>    
    <?php foreach($js as $one):?>
        <?php if($one):?>
            <script src="/assets/js/<?php echo $one;?>.js"></script>
        <?php endif;?>
    <?php endforeach;?>
</body>
</html>