<?php

use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <?= $form->field($model, 'question_name') ?>

        <?= $form->field($model, 'question_hint') ?>

        <?= $form->field($model, 'answers')->widget(MultipleInput::class, [
            'min' => 2,
            'columns' => [
                [
                    'name'  => 'answer_name',
//                    'type'  => \vova07\imperavi\Widget::className(),
//                    'title' => 'Answer Test',
                ],
                [
                        'name' => 'id',
                    'type' => \unclead\multipleinput\MultipleInputColumn::TYPE_HIDDEN_INPUT
                ]
            ]
        ]); ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
