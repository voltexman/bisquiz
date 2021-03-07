<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;

?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_inner',
    'widgetBody' => '.container-answers',
    'widgetItem' => '.answer-item',
    'limit' => 4,
    'min' => 1,
    'insertButton' => '.add-answer',
    'deleteButton' => '.remove-answer',
    'model' => $modelsRoom[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'answer_name'
    ],
]); ?>

    <table class="table table-no-bordered container-answers">
        <tbody>
        <?php foreach ($modelsRoom as $indexRoom => $modelRoom): ?>
            <tr class="answer-item">

                <td class="align-middle d-flex">
                    <?php
                    // necessary for update action.
                    if (! $modelRoom->isNewRecord) {
                        echo Html::activeHiddenInput($modelRoom, "[{$indexHouse}][{$indexRoom}]id");
                    }
                    ?>
                    <?= $form->field($modelRoom, "[{$indexHouse}][{$indexRoom}]answer_name")->label(false)->textInput(['maxlength' => true]) ?>
                </td>
                <td class="text-center align-middle d-flex" style="width: 10px;">
                    <button type="button" class="remove-answer btn btn-danger btn-xs">
                        <i class="fa fa-minus"></i>
                    </button>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>

        <button type="button" class="add-answer btn btn-success btn-xs"><i class="fa fa-plus"></i></button>

    </table>

<?php DynamicFormWidget::end(); ?>