<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Quiz */

$this->title = 'Create Quiz';
$this->params['breadcrumbs'][] = ['label' => 'Quizzes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['icon'] = 'none';
?>
<div class="quiz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelPerson' => $modelPerson,
        'modelsHouse' => $modelsHouse,
        'modelsRoom' => $modelsRoom
    ]) ?>

</div>
