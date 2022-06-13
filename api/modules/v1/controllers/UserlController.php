<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\Auth;
use api\modules\v1\models\Login;
use api\modules\v1\models\Signup;
use yii\bootstrap4\ActiveForm;
use yii\rest\ActiveController;


/**
 * Userl Controller API
 *
 */
class UserlController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Userl';


    public function actionAuth()
    {
        $model = new Auth();

        if ($model->load(\Yii::$app->request->post(), 'auth') && $usr = $model->activate()) {

            \Yii::$app->response->data = $usr;
        } else {

            throw new \yii\web\UnauthorizedHttpException();
        }
    }


    public function actionLogin()
    {
        $model = new Login();

        if ($model->load(\Yii::$app->request->post(), 'login') && $auth = $model->login()) {
            $model->password = '';
            \Yii::$app->response->data = ['token' => $auth];
        } else {
            throw new \yii\web\UnauthorizedHttpException();
        }
    }


    public function actionRegist()
    {
        $model = new Signup();

        if ($model->load(\Yii::$app->request->post(), 'sign')  && $model->signup()) {
            \Yii::$app->response->data = $model->sendCode();
        } else {
            //\Yii::$app->response->data = ActiveForm::validate($model); ???
            throw new \yii\web\NotAcceptableHttpException();
        }
    }

    public function actionMessage()
    {
        $response = \Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
    }
}
