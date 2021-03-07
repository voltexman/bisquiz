<?php

/* @var $this yii\web\View */
/* @var $model common\models\Quiz */

$this->title = 'Update Quiz: ' . $modelPerson->id;
$this->params['breadcrumbs'][] = ['label' => 'Quizzes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelPerson->id, 'url' => ['view', 'id' => $modelPerson->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['icon'] = 'none';
?>
<div class="quiz-update">

    <?= $this->render('_form', [
        'modelPerson' => $modelPerson,
        'modelsHouse' => $modelsHouse,
        'modelsRoom' => $modelsRoom
    ]) ?>

</div>
