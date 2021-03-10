<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int|null $quiz_id
 * @property int|null $sort
 * @property string|null $question_name
 * @property string|null $question_hint
 * @property int|null $type
 * @property int|null $multiple
 * @property int|null $required
 * @property int|null $own
 * @property int|null $status
 *
 * @property Answer[] $answers
 * @property Quiz $quiz
 * @property string $name [varchar(255)]
 * @property string $hint
 */
class Question extends \yii\db\ActiveRecord
{
    const PUBLISHED_STATUS_ON = 1;
    const PUBLISHED_STATUS_OFF = 0;

    const TYPE_IMAGE = 1;
    const TYPE_TEXT = 2;

    public function behaviors(): array
    {
        return [
            [
                'class' => 'sjaakp\sortable\Sortable',
                'orderAttribute' => 'sort'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['question_name'], 'required'],
            [['quiz_id', 'sort', 'type', 'multiple', 'required', 'own', 'status'], 'integer'],
            [['question_hint'], 'string'],
            [['question_name'], 'string', 'max' => 255],
            [['quiz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quiz::class, 'targetAttribute' => ['quiz_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'question_name' => Yii::t('question', 'QUESTION_NAME'),
            'question_hint' => Yii::t('question', 'QUESTION_HINT'),
            'multiple' => Yii::t('question', 'MULTIPLE'),
            'required' => Yii::t('question', 'REQUIRED'),
            'own' => Yii::t('question', 'OWN'),
            'status' => Yii::t('question', 'STATUS'),
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery|AnswerQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::class, ['question_id' => 'id']);
    }

    /**
     * Gets query for [[Quiz]].
     *
     * @return \yii\db\ActiveQuery|QuizQuery
     */
    public function getQuiz()
    {
        return $this->hasOne(Quiz::class, ['id' => 'quiz_id']);
    }

    /**
     * {@inheritdoc}
     * @return QuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuestionQuery(get_called_class());
    }
}
