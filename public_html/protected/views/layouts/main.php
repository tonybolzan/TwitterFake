<?php 
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/main.css');
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/lib/bootstrap.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/functions.js',CClientScript::POS_END);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo Yii::app()->name;?>">
    <meta name="author" content="odig.net">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">
    <title><?php echo Yii::app()->name . ' - ' . CHtml::encode($this->pageTitle); ?></title>
    <!--[if lt IE 9]>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php echo $content; ?>
  </body>
</html>