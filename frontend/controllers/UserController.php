<?php 
namespace frontend\controllers;

use yii\rest\ActiveController;
use yii\helpers\VarDumper;
use Yii;
class UserController extends ActiveController
{
    public $modelClass = 'frontend\models\User';
}

