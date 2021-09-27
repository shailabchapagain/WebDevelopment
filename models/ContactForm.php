<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $firstName;
    public $lastName;
    public $email;
    public $streetAddress;
    public $body;
    public $country;
    public $city;
    public $zipCode;
    public $phoneNumber;
    public $topic;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['firstName','lastName','streetAddress','country','city','zipCode', 'email', 'phoneNumber','topic', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {

            Yii::$app->mailer->compose('contactuser', [
                'fname' => $this->firstName,
                'lname' => $this->lastName,
            ])
                ->setTo($this->email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setSubject('Thank you for contacting us - TDot Academy')

                ->send();

            Yii::$app->mailer->compose('contactadmin', [
                'fname' => $this->firstName,
                'lname' => $this->lastName,
                'useremail' => $this->email,
                'usertopic' => $this->topic,
                'userbody' => $this->body,
                'useraddress' => $this->streetAddress,
                'usercountry' => $this->country,
                'usercity' => $this->city,
                'userzip' => $this->zipCode,
                'userphone' => $this->phoneNumber,
            ])
                ->setTo(Yii::$app->params['senderEmail'])
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setSubject('A new message on TDot Academy')

                ->send();

            return true;
        }
        return false;
    }

}