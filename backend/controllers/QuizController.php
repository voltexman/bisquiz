<?php

namespace backend\controllers;

use common\models\Answer;
use backend\models\Model;
use common\models\Question;
use common\models\Quiz;
use common\models\QuizSearch;
use Exception;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * QuizController implements the CRUD actions for Quiz model.
 */
class QuizController extends Controller
{
    /**
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex(): string
    {
        $searchModel = new QuizSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id): string
    {
        $model = $this->findModel($id);

        $questions = new ActiveDataProvider([
            'query' => $model->getQuestions(),
            'sort' => ['defaultOrder' => ['sort' => SORT_ASC]],
            'pagination' => false
        ]);

        return $this->render('view', [
            'model' => $model,
            'questions' => $questions,
        ]);
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelPerson = new Quiz;
        $modelsHouse = [new Question];
        $modelsRoom = [[new Answer]];

        $modelPerson->user_id = Yii::$app->user->identity->getId();

        if ($modelPerson->load(Yii::$app->request->post())) {

            $modelsHouse = Model::createMultiple(Question::class);
            Model::loadMultiple($modelsHouse, Yii::$app->request->post());

            // validate person and houses models
            $valid = $modelPerson->validate();
            $valid = Model::validateMultiple($modelsHouse) && $valid;

            if (isset($_POST['Answer'][0][0])) {
                foreach ($_POST['Answer'] as $indexHouse => $rooms) {
                    foreach ($rooms as $indexRoom => $room) {
                        $data['Answer'] = $room;
                        $modelRoom = new Answer;
                        $modelRoom->load($data);
                        $modelsRoom[$indexHouse][$indexRoom] = $modelRoom;
                        $valid = $modelRoom->validate();
                    }
                }
            }

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPerson->save(false)) {
                        foreach ($modelsHouse as $indexHouse => $modelHouse) {

                            if ($flag === false) {
                                break;
                            }

                            $modelHouse->quiz_id = $modelPerson->id;

                            if (!($flag = $modelHouse->save(false))) {
                                break;
                            }

                            if (isset($modelsRoom[$indexHouse]) && is_array($modelsRoom[$indexHouse])) {
                                foreach ($modelsRoom[$indexHouse] as $indexRoom => $modelRoom) {
                                    $modelRoom->question_id = $modelHouse->id;
                                    if (!($flag = $modelRoom->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['quiz/index']);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelPerson' => $modelPerson,
            'modelsHouse' => (empty($modelsHouse)) ? [new Question] : $modelsHouse,
            'modelsRoom' => (empty($modelsRoom)) ? [[new Answer]] : $modelsRoom,
        ]);
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelPerson = $this->findModel($id);
        $modelsHouse = $modelPerson->questions;
        $modelsRoom = [];
        $oldRooms = [];

        $modelPerson->user_id = Yii::$app->user->identity->getId();

        if (!empty($modelsHouse)) {
            foreach ($modelsHouse as $indexHouse => $modelHouse) {
                $rooms = $modelHouse->answers;
                $modelsRoom[$indexHouse] = $rooms;
                $oldRooms = ArrayHelper::merge(ArrayHelper::index($rooms, 'id'), $oldRooms);
            }
        }

        if ($modelPerson->load(Yii::$app->request->post())) {

            // reset
            $modelsRoom = [];

            $oldHouseIDs = ArrayHelper::map($modelsHouse, 'id', 'id');
            $modelsHouse = Model::createMultiple(Question::class, $modelsHouse);
            Model::loadMultiple($modelsHouse, Yii::$app->request->post());
            $deletedHouseIDs = array_diff($oldHouseIDs, array_filter(ArrayHelper::map($modelsHouse, 'id', 'id')));

            // validate person and houses models
            $valid = $modelPerson->validate();
            $valid = Model::validateMultiple($modelsHouse) && $valid;

            $roomsIDs = [];
            if (isset($_POST['Answer'][0][0])) {
                foreach ($_POST['Answer'] as $indexHouse => $rooms) {
                    $roomsIDs = ArrayHelper::merge($roomsIDs, array_filter(ArrayHelper::getColumn($rooms, 'id')));
                    foreach ($rooms as $indexRoom => $room) {
                        $data['Answer'] = $room;
                        $modelRoom = (isset($room['id']) && isset($oldRooms[$room['id']])) ? $oldRooms[$room['id']] : new Answer();
                        $modelRoom->load($data);
                        $modelsRoom[$indexHouse][$indexRoom] = $modelRoom;
                        $valid = $modelRoom->validate();
                    }
                }
            }

            $oldRoomsIDs = ArrayHelper::getColumn($oldRooms, 'id');
            $deletedRoomsIDs = array_diff($oldRoomsIDs, $roomsIDs);

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPerson->save(false)) {

                        if (!empty($deletedRoomsIDs)) {
                            Answer::deleteAll(['id' => $deletedRoomsIDs]);
                        }

                        if (!empty($deletedHouseIDs)) {
                            Question::deleteAll(['id' => $deletedHouseIDs]);
                        }

                        foreach ($modelsHouse as $indexHouse => $modelHouse) {

                            if ($flag === false) {
                                break;
                            }

                            $modelHouse->quiz_id = $modelPerson->id;

                            if (!($flag = $modelHouse->save(false))) {
                                break;
                            }

                            if (isset($modelsRoom[$indexHouse]) && is_array($modelsRoom[$indexHouse])) {
                                foreach ($modelsRoom[$indexHouse] as $indexRoom => $modelRoom) {
                                    $modelRoom->question_id = $modelHouse->id;
                                    if (!($flag = $modelRoom->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelPerson->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelPerson' => $modelPerson,
            'modelsHouse' => (empty($modelsHouse)) ? [new Question] : $modelsHouse,
            'modelsRoom' => (empty($modelsRoom)) ? [[new Answer]] : $modelsRoom
        ]);
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quiz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quiz::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}