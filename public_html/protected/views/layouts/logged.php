<?php $this->beginContent('//layouts/main'); ?>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo Yii::app()->homeUrl; ?>"><img src="img/menu-logo2.png" ></a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo Yii::app()->homeUrl; ?>">@<?php echo Yii::app()->user->username; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-header"><?php echo Yii::app()->user->email; ?></li>
                            <li class="divider"></li>
                            <li><?php echo CHtml::link('Remover Conta', array('userDelete')); ?></li>
                            <li class="divider"></li>
                            <li><?php echo CHtml::link('Sair', array('logout')); ?></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-search pull-right" action="">
                    <input type="text" class="search-query span3" placeholder="Buscar">
                </form>
            </div><!-- /.nav-collapse -->
        </div>
    </div>
</div>

<div class="container main">
    <?php echo $content; ?>
</div>

<?php $this->endContent(); ?>
