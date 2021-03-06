<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCustomer') ?>

    <?= $form->field($model, 'identType') ?>

    <?= $form->field($model, 'numIdent') ?>

    <?= $form->field($model, 'custName') ?>

    <?= $form->field($model, 'custLastNam') ?>

    <?php // echo $form->field($model, 'cellPhone') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'direction') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'registerDate') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
