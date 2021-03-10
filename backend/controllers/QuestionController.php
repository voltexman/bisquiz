<?php

namespace backend\controllers;

use common\models\Answer;
use common\models\Quiz;
use Yii;
use common\models\Question;
use common\models\QuestionSearch;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Question models.
     * @return mixed
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Quiz::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Question model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Question();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Question model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax) {
            $questions = Question::findOne($id);

            if ($questions->load(Yii::$app->request->post())) {
                $questions->save();
                Yii::$app->response->format = Response::FORMAT_JSON;

                $oldAnswers = ArrayHelper::getColumn(
                    Answer::find()
                        ->where(['question_id' => $id])
                        ->select('id')
                        ->asArray()
                        ->all(), 'id'
                );

                $newAnswers = ArrayHelper::getColumn(
                    Yii::$app->request->post('Question')['answers'], 'id'
                );

                $answerToDelete = array_diff($oldAnswers, $newAnswers);

                Answer::deleteAll(['id' => $answerToDelete]);

                foreach (Yii::$app->request->post('Question')['answers'] as $answer) {
                    $hasAnswer = Answer::findOne($answer['id']);

                    if ($hasAnswer) {
                        $hasAnswer->question_id = $questions->id;
                        $hasAnswer->answer_name = $answer['answer_name'];
                        $hasAnswer->save();
                    } else {
                        $modelAnswer = new Answer();
                        $modelAnswer->question_id = $questions->id;
                        $modelAnswer->answer_name = $answer['answer_name'];
                        $modelAnswer->save();

                    }
                }
            }
        }

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }

    public function actionQuestionOrder(): void
    {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            if (isset($post['key'], $post['pos'])) {
                $this->findModel($post['key'])->order($post['pos']);
            }
        }
    }

    /**
     * Deletes an existing Question model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('question', 'The requested page does not exist.'));
    }
}
