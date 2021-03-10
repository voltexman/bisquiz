<?php

use backend\widgets\QuestionFAQRightSidebarWidget;
use common\models\Quiz;
use quiz\helpers\QuestionHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

$js = <<<JS
$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {

});
JS;
$this->registerJs($js);

/* @var $modelPerson Quiz */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="row">
        <div class="col-sm-6">
            <div class="main-card mb-3 card">
                <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>
                    <?= $modelPerson->isNewRecord ? 'Создание квиза' : 'Изменение квиза' ?>
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm nav btn-group">
                            <a data-toggle="tab" href="#tab-eg1-0" class="btn-shadow active btn btn-primary">Стартовая
                                страница</a>
                            <a data-toggle="tab" href="#tab-eg1-1" class="btn-shadow  btn btn-primary">Вопросы</a>
                            <a data-toggle="tab" href="#tab-eg1-2" class="btn-shadow  btn btn-primary">Форма
                                контактов</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-eg1-0" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?= $form->field($modelPerson, 'quiz_name')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <h5 class="card-title">Консультант</h5>
                                    <?= $form->field($modelPerson, 'consultant_name')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($modelPerson, 'consultant_position')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg1-1" role="tabpanel">
                            <?php DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper',
                                'widgetBody' => '.container-items',
                                'widgetItem' => '.house-item',
                                'limit' => 10,
                                'min' => 1,
                                'insertButton' => '.add-house',
                                'deleteButton' => '.remove-house',
                                'model' => $modelsHouse[0],
                                'formId' => 'dynamic-form',
                                'formFields' => [
                                    'question_name',
                                    'question_hint',
                                    'type'
                                ],
                            ]); ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Houses</th>
                                    <th style="width: 450px;">Rooms</th>
                                    <th class="text-center" style="width: 90px;">
                                        <button type="button" class="add-house btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="container-items">
                                <?php foreach ($modelsHouse as $indexHouse => $modelHouse): ?>
                                    <tr class="house-item">
                                        <td class="vcenter">
                                            <?php
                                            // necessary for update action.
                                            if (! $modelHouse->isNewRecord) {
                                                echo Html::activeHiddenInput($modelHouse, "[{$indexHouse}]id");
                                            }
                                            ?>
                                            <?= $form->field($modelHouse, "[{$indexHouse}]question_name")->label(false)->textInput(['maxlength' => true]) ?>

                                            <?= $form->field($modelHouse, "[{$indexHouse}]type")->label(false)->dropDownList(QuestionHelper::typeList()) ?>
                                        </td>
                                        <td>
                                            <?= $this->render('_form-rooms', [
                                                'form' => $form,
                                                'indexHouse' => $indexHouse,
                                                'modelsRoom' => $modelsRoom[$indexHouse],
                                            ]) ?>
                                        </td>
                                        <td class="text-center vcenter" style="width: 90px; verti">
                                            <button type="button" class="remove-house btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php DynamicFormWidget::end(); ?>
                        </div>
                        <div class="tab-pane" id="tab-eg1-2" role="tabpanel">
                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a
                                type specimen book. It has
                                survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. </p>
                        </div>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <a href="javascript:void(0);" class="btn-wide btn btn-success">Save</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <?= QuestionFAQRightSidebarWidget::widget() ?>
        </div>
    </div>

    <div class="form-group">
<!--        --><?//= Html::submitButton($modelPerson->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>