<?php $this->pageTitle = 'Inicio'; ?>

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
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="span4">
        <div class="well well-small well-left">
            <div class="flex-module-header">
                <h2>Postar Tweet</h2>
            </div>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'post-form',
                'enableClientValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>

            <?php echo $form->textArea($modelPost, 'text', array('id'=>'post-textarea','class' => 'input-block-level', 'required' => 'required', 'style'=>'max-width:236px;')); ?>
            <?php echo $form->error($modelPost, 'text', array('class' => 'alert alert-error')); ?>
            <?php echo CHtml::submitButton(Yii::t('sys', 'Postar'), array('class' => 'btn signup-btn')); ?>

            <?php $this->endWidget(); ?>
        </div>
        
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
                    <?php
                    if($tweet['username']==$username)
                        echo CHtml::link('Del.', array('postDelete','id'=>$tweet['id']), array('class'=>'label label-important'));
                    ?>
                    <p class="js-tweet-text"><?php echo $tweet['msg']; ?></p>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>
</div>