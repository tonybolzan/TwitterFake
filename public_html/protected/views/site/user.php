<?php $this->pageTitle = 'Usuario'; ?>

<div class="row">
    <div class="span12">
        <div class="well well-small well-center profile-card clearfix">
            <a href="" target="_blank">
                <img src="<?php echo $img; ?>" class="avatar size128">
            </a>
            <div>
                <h1 class="fullname">
                    <?php echo $name; ?>
                </h1>
                <h2 class="username">
                    <span class="js-username">
                        <span class="screen-name">
                            @<?php echo $username; ?>
                        </span>
                    </span>
                </h2>
                <p class="bio ">
                    <?php echo $bio; ?>
                </p>
                <p class="location-and-url">
                    <span class="location">
                        <?php echo $location; ?>
                    </span>
                    <span class="divider">·</span>
                    <span class="url">
                        <a target="_blank" href="<?php echo $url; ?>">
                            <?php echo $url; ?>
                        </a>
                    </span>
                </p>
                <?php
                if(!Yii::app()->user->isGuest) {
                    echo CHtml::link('Seguir', array('seguir','id'=>$id), array('class'=>'btn btn-info'));
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="span4">
        <?php if(Yii::app()->user->isGuest):?>
        <div class="well well-small well-left">
            <div class="flex-module-header">
                <h2>Siga <?php echo $name; ?></h2>
            </div>
            <?php
            $modelUser = new User('insert');
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'user-form',
                'action' => array('login'),
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'form'
                ),
            ));
            
            echo $form->errorSummary($modelUser);
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
        <?php endif; ?>
        
        <div class="well well-small well-left">
            <div class="flex-module-header">
                <h2>Seguindo</h2>
            </div>
            <ul class="nav nav-list">
            <?php foreach ($seguindo as $user): ?>
                <li>
                    <a href="<?php echo CHtml::normalizeUrl(array('user','id'=>$user['username'])); ?>">
                        <img src="<?php echo $user['avatar']?>" >
                        <?php echo $user['name']; ?>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
        
        <div class="well well-small well-left">
            <div class="flex-module-header">
                <h2>Seguido Por</h2>
            </div>
            <ul class="nav nav-list">
            <?php foreach ($seguido as $user): ?>
                <li>
                    <a href="<?php echo CHtml::normalizeUrl(array('user','id'=>$user['username'])); ?>">
                        <img src="<?php echo $user['avatar']?>" >
                        <?php echo $user['name']; ?>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
        </div>

        <div class="well well-small well-left site-footer">
            <ul class="clearfix">
                <li class="copyright">© 2012 Twitter</li>
                <li><a href="http://twitter.com/about">Sobre</a></li>
                <li><a href="//support.twitter.com">Ajuda</a></li>
                <li><a href="http://twitter.com/tos">Termos</a></li>
                <li><a href="http://twitter.com/privacy">Privacidade</a></li>
                <li><a href="http://blog.pt.twitter.com">Blog</a></li>
                <li><a href="http://status.twitter.com">Status</a></li>
                <li><a href="http://twitter.com/download">Aplicativos</a></li>
                <li><a href="http://twitter.com/about/resources">Recursos</a></li>
                <li><a href="http://twitter.com/jobs">Empregos</a></li>
                <li><a href="//business.twitter.com/pt/advertise/start">Anunciantes</a></li>
                <li><a href="//business.twitter.com/index_pt.html">Empresas</a></li>
                <li><a href="http://media.twitter.com">Multimídia</a></li>
                <li><a href="//dev.twitter.com">Programadores</a></li>
            </ul>
        </div>

    </div>
    <div class="span8">
        <div class="well well-small well-right">
            <div class="flex-module-header">
                <h2>Tweets</h2>
            </div>
            <hr>
            <?php foreach($tweets as $tweet): ?>
                <div class="tweet">
                    <small class="time">
                        <?php echo $tweet['time']; ?>
                    </small>
                    <a href="<?php echo CHtml::normalizeUrl(array('user','id'=>$tweet['username'])) ?>">
                        <img class="avatar" src="<?php echo $tweet['avatar']; ?>">
                        <strong class="fullname">
                            <?php echo $tweet['name']; ?>
                        </strong>
                        <span class="username js-action-profile-name">
                            @<?php echo $tweet['username']; ?>
                        </span>
                    </a>
                    <p class="js-tweet-text"><?php echo $tweet['msg']; ?></p>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>
</div>