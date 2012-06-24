<?php $this->beginContent('//layouts/main'); ?>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#"><img src="img/menu-logo2.png" ></a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="span12 login">
            <?php echo $content; ?>
        </div>
    </div>
</div>

<?php $this->endContent(); ?>