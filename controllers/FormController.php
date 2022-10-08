<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Persons;
use function Psy\debug;

class FormController extends Controller
{
// валидация, отправка на данных почту - contact и сохранение  в БД
    public function actionForm()
    {
        $model = new Persons();
        if(\Yii::$app->request->isAjax){
            if($model->load(\Yii::$app->request->post()) && $model->validate() && $model->contact()){


                $model->save();

//                return $this->refresh();

            }
            return 'Запрос принят!';


        }


        return $this->render('form', compact('model'));
    }
}
