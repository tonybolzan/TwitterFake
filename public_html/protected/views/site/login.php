<?php $this->pageTitle = 'Login'; ?>

<div class="row">
    <div class="span7 front-welcome">
        <div class="front-welcome-text">
            <h1>Bem-vindo ao Twitter.</h1>
            <p>Descubra o que está acontecendo, agora mesmo, com as pessoas e organizações que lhe interessam.</p>
        </div>
    </div>

    <div class="span5">
        <div class="well well-small">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'form'
                ),
                    ));
            //echo $form->errorSummary($model);
            ?>

            <?php echo $form->textField($model, 'email', array('class' => 'input-block-level', 'required' => 'required','placeholder'=>'Nome de usuário ou e-mail')); ?>
            <?php echo $form->error($model, 'email', array('class' => 'alert alert-error')); ?>

            <div class="row-fluid">
                <div class="span9">
                    <?php echo $form->passwordField($model, 'password', array('class' => 'input-block-level', 'required' => 'required', 'placeholder'=>'Senha')); ?>
                </div>
                <div class="span2">
                    <?php echo CHtml::submitButton('Entrar', array('class' => 'btn btn-info')); ?>
                </div>
            </div>
            <?php echo $form->error($model, 'password', array('class' => 'alert alert-error')); ?>

            <?php echo $form->checkBox($model, 'rememberMe'); ?>
            <?php echo $form->label($model, 'rememberMe', array('class' => 'help-inline')); ?>

            <?php $this->endWidget(); ?>
        </div>

        <div class="well well-small">
            <h2><strong>Novo no Twitter?</strong> Inscreva-se</h2>

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'user-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'form'
                ),
            ));
            
            //echo $form->errorSummary($modelUser);
            ?>
            <?php echo $form->textField($modelUser, 'fullname', array('class' => 'input-block-level', 'required' => 'required','placeholder'=>'Nome Completo')); ?>
            <?php echo $form->error($modelUser, 'fullname', array('class' => 'alert alert-error')); ?>
            
            <?php echo $form->textField($modelUser, 'username', array('class' => 'input-block-level', 'required' => 'required','placeholder'=>'Nome de usuário')); ?>
            <?php echo $form->error($modelUser, 'username', array('class' => 'alert alert-error')); ?>
            
            <?php echo $form->textField($modelUser, 'email', array('class' => 'input-block-level', 'pattern' => "(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|”(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*”)@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])", 'required' => 'required', 'placeholder'=>'E-mail')); ?>
            <?php echo $form->error($modelUser, 'email', array('class' => 'alert alert-error')); ?>

            <?php echo $form->passwordField($modelUser, 'password', array('class' => 'input-block-level', 'required' => 'required', 'placeholder'=>'Senha')); ?>
            <?php echo $form->error($modelUser, 'password', array('class' => 'alert alert-error')); ?>

            <?php echo CHtml::submitButton('Inscreva-se no Twitter', array('class' => 'btn signup-btn')); ?>

            <?php $this->endWidget(); ?>
            
        </div>
    </div>
</div>