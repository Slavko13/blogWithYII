<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="container">


   <div class="row">
       <div class="col-md-8">
           <h1><?= Html::encode($this->title) ?></h1>

           <p>Please fill out the following fields to login:</p>

           <?php $form = ActiveForm::begin([
               'id' => 'login-form',
               'layout' => 'horizontal',
               'fieldConfig' => [
                   'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                   'labelOptions' => ['class' => 'col-lg-1 control-label'],
               ],
           ]); ?>

           <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

           <?= $form->field($model, 'password')->passwordInput() ?>

           <?= $form->field($model, 'rememberMe')->checkbox([
               'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
           ]) ?>

           <div class="form-group">
               <div class="col-lg-offset-1 col-lg-11">
                   <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
               </div>
           </div>

           <?php ActiveForm::end(); ?>

       </div>
       <div class="col-md-2">
           <script type="text/javascript" src="https://vk.com/js/api/openapi.js?162"></script>
           <script type="text/javascript">
               VK.init({apiId: 7128851});
           </script>

           <!-- VK Widget -->
           <div id="vk_auth"></div>
           <script type="text/javascript">
               VK.Widgets.Auth("vk_auth", {"authUrl":"/auth/vk-login"});
           </script>
       </div>
   </div>
    </div>



</div>