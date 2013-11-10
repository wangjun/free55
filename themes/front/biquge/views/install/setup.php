<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle =  '安装'  . ' - ' . Yii::app()->name;
//$this->breadcrumbs=array(
//	'Login',
//);
?>

    <style type="text/css">
      /*body {*/
        /*padding-top: 40px;*/
        /*padding-bottom: 40px;*/
        /*background-color: #f5f5f5;*/
      /*}*/

      .form-signin {
        max-width: 600px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
  

    <div class="form form-signin">
    <?php $this->renderPartial('//layouts/flash-message'); ?>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'setup-form',
      'type'=>'horizontal',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
    )); ?>

        <?php echo $form->textFieldRow($model,'dbhost'); ?>
        <?php echo $form->textFieldRow($model,'dbname'); ?>

      <?php echo $form->textFieldRow($model,'username'); ?>

      <?php echo $form->passwordFieldRow($model,'password',array(
            'hint'=>' ',
        )); ?>
        <?php echo $form->passwordFieldRow($model,'repassword',array(
            'hint'=>' ',
        )); ?>

      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'安装',
            )); ?>
      </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->