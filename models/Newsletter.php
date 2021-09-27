<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "newsletter".
 *
 * @property int $id
 * @property string $newsletteremail
 * @property int $subscribed_on
 */
class Newsletter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['newsletteremail', 'subscribed_on'], 'required'],
            [['subscribed_on'], 'integer'],
            [['newsletteremail'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'newsletteremail' => Yii::t('app', 'Newsletteremail'),
            'subscribed_on' => Yii::t('app', 'Subscribed On'),
        ];
    }

    public function newsletter($email)
    {
        if ($this->validate()) {

            Yii::$app->mailer->compose('newslettersub', [
            ])
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setSubject('Thank you for subscribing to our Newsletter - TDot Academy')

                ->send();

            return true;
        }
        return false;
    }

}
