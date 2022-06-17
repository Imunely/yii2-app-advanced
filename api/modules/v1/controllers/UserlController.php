<?php

namespace api\modules\v1\controllers;

use OpenApi\Annotations as OA;

use api\modules\v1\models\Auth;
use api\modules\v1\models\Login;
use api\modules\v1\models\Message;
use api\modules\v1\models\Msg;
use api\modules\v1\models\Signup;
use yii\bootstrap4\ActiveForm;
use yii\rest\ActiveController;

/**
 * @OA\Info(
 *     title="My First API",
 *     version="0.1"
 * )
 */
class OpenApi
{
}

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

            \Yii::$app->response->data = ['token' => $usr];
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


    public function actionRegistration()
    {
        $model = new Signup();

        if ($model->load(\Yii::$app->request->post(), 'sign')  && $model->signup()) {
            \Yii::$app->response->data = $model->sendCode();
        } else {
            throw new \yii\web\NotAcceptableHttpException();
        }
    }

    public function actionMessage()
    {
        $model = new Message();

        if ($model->load(\Yii::$app->request->post(), 'msg') && $model->sendMsg()) {

            \Yii::$app->response->data = ['status' => true];
        } else {
            throw new \yii\web\NotAcceptableHttpException();
        }
    }

    public function actionGetmessageforuser($user_id)
    {
        if (is_int($user_id)) {
            throw new \yii\web\NotAcceptableHttpException();
        }

        \Yii::$app->response->data = ['messages' => Msg::find()
            ->where(['user_id_from' => $user_id])
            ->orderBy(['id' => SORT_DESC])
            ->limit(30)
            ->all()];
    }
}
