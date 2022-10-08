<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class Persons extends ActiveRecord
{


    public static function tableName()
    {
        return "persons";
    }
    public function rules()
    {
        return [
            [['name', 'phone', 'email'], 'required', 'message' => 'Необходимо заполнить поле'],
            [['name'], 'string', 'max'=>30, 'message' => 'Имя не должно быть больше 30 символов'],
            ['email', 'email', 'message' => 'Некорректный email-адрес']
        ];
    }
    public function attributeLabels()
    {
        return ['name'=>'Имя',
            'phone'=>'Телефон',
            'email'=>'Email'];
    }
    // отправка данных на почту, можно смотреть письма в папке runtime/mail
    public function contact()
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo(Yii::$app->params['adminEmail']) // почта на которую отправляем данные
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setSubject("Заявка")
                ->setTextBody('Имя: '.$this->name.'   Телефон: '.$this->phone.'   Email: '.$this->email)
                ->send();

            return true;
        }
        return false;
    }

}