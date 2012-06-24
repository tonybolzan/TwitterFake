<?php $this->beginContent('//layouts/main'); ?>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo Yii::app()->homeUrl; ?>"><img src="img/menu-logo2.png" ></a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Você possui uma conta? <strong>Entrar</strong> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php
                                $modelLogin = new LoginForm;
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'login-form',
                                    'action'=> array('login'),
                                    'enableClientValidation' => true,
                                    'clientOptions' => array(
                                        'validateOnSubmit' => true,
                                    ),
                                    'htmlOptions' => array(
                                        'class' => 'well-transparent'
                                    ),
                                )); ?>
                                    <label>
                                        <span>Nome de usuário ou e-mail</span>
                                        <?php echo $form->textField($modelLogin, 'email', array('required' => 'required','placeholder'=>'Nome de usuário ou e-mail')); ?>
                                        <?php echo $form->error($modelLogin, 'email', array('class' => 'alert alert-error')); ?>
                                    </label>
                                    <label>
                                        <span>Senha</span>
                                        <?php echo $form->passwordField($modelLogin, 'password', array('required' => 'required', 'placeholder'=>'Senha')); ?>
                                        <?php echo $form->error($modelLogin, 'password', array('class' => 'alert alert-error')); ?>
                                    </label>
                                    <?php echo CHtml::submitButton('Entrar', array('class' => 'btn pull-right')); ?>
                                    <label class="checkbox">
                                        <?php echo $form->checkBox($modelLogin, 'rememberMe'); ?>
                                        Lembrar-me
                                    </label>
                                <?php $this->endWidget(); ?>
                            </li>
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
