<?php

namespace app\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "note".
 *
 * @property int $id
 * @property string $title
 * @property string|null $notetext
 * @property int $FK_userID
 *
 * @property User $fKUser
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'FK_userID'], 'required'],
            [['FK_userID'], 'integer'],
            [['title'], 'string', 'max' => 45],
            [['notetext'], 'string', 'max' => 2048],
            [['title'], 'unique'],
            [['FK_userID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['FK_userID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'notetext' => Yii::t('app', 'Notetext'),
            'FK_userID' => Yii::t('app', ' User'),
        ];
    }

    /**
     * Gets query for [[FKUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFKUser()
    {
        return $this->hasOne(User::className(), ['id' => 'FK_userID']);
    }

    public static function isMyNote($id){
        $myNote = Note::findOne($id);
        if($myNote==null){
            throw new NotFoundHttpException(Yii::t('app', 'Oops Wrong Link !!!!!'));

        }
        return ($myNote->FK_userID == Yii::$app->user->id);
    }



    public static function getMyNotes(){
        $id = Yii::$app->user->id;
        $query = Note::find()
            ->where('FK_userID ='.Yii::$app->user->id);

        return $query->all();

    }
}
