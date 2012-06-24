<?php
$this->pageTitle = Yii::t('sys','Error');
$this->breadcrumbs = array(
    $this->pageTitle,
);
?>

<div class="alert alert-error">
  <h1 class="alert-heading">Error <?php echo $code; ?></h1>
  <p><?php echo CHtml::encode($message); ?></p>
  <button class="btn-large btn-danger" onClick="javascript:history.back();">Back</button>
</div>