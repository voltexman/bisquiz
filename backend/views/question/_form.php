<?php

use quiz\helpers\QuestionHelper;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\MultipleInputColumn;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */

$maxLengthQuestionHint = QuestionHelper::MAX_LENGTH_QUESTION_HINT;
$js = <<<JS
$('.js-input-plus').closest('tfoot').find('td:first').remove();
$('.js-input-plus').unwrap();
$(document).on('keyup', 'textarea#question-question_hint', function () {
    $(this).closest('.form-group').find('small.form-text').text('Символов: ' + this.value.length + '/' + {$maxLengthQuestionHint});
})
JS;
$this->registerJs($js, View::POS_READY);
$this->registerCss('.js-input-plus {padding: 0!important}');

?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="modal-header">
        <h5 class="modal-title"><?= $model->isNewRecord ? 'Новый вопрос' : 'Изменение вопроса' ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <?= $form->field($model, 'question_name') ?>

        <?= $form->field($model, 'question_hint', ['enableClientValidation' => false])->textarea([
            'rows' => 2,
            'style' => 'resize:none',
            'maxlength' => true
        ])->hint('Символов: ' . iconv_strlen($model->question_hint) . '/' . QuestionHelper::MAX_LENGTH_QUESTION_HINT)
        ?>

        <h5 class="card-title">Ответы</h5>

        <div class="row">
            <div class="col-sm-4">
                <?= $form->field($model, 'type', ['enableClientValidation' => false])
                    ->dropDownList(QuestionHelper::typeList())
                    ->label(false)
                ?>
            </div>
        </div>

        <?= $form->field($model, 'answers')->widget(MultipleInput::class, [
            'addButtonPosition' => MultipleInput::POS_FOOTER,
            'addButtonOptions' => [
                'label' => '<i class="fa fa-plus"></i> ' . Yii::t('question', 'ADD_ANSWER_BUTTON_LABEL'),
            ],
            'removeButtonOptions' => [
                'label' => '<i class="fa fa-trash"></i>',
                'class' => 'btn btn-danger btn-sm'
            ],
            'min' => 2,
            'max' => 12,
            'columns' => [
                [
                    'name' => 'answer_name',
                    'options' => ['class' => 'form-control-sm']
                ],
                [
                    'name' => 'id',
                    'type' => MultipleInputColumn::TYPE_HIDDEN_INPUT
                ]
            ]
        ])->label(false); ?>
    </div>

    <div class="modal-footer">
        <button type="button" class="mr-2 btn btn-link text-danger btn-sm" data-dismiss="modal">Закрыть</button>

        <?= Html::resetButton('Сбросить', ['class' => 'mr-2 btn btn-link text-warning btn-sm']) ?>

        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
