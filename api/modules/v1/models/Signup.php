<?php

namespace api\modules\v1\models;


use Yii;
use yii\base\Model;


/**
 * Signup form
 */
class Signup extends Model
{
    public $username;
    public $phone;
    public $password;

    public $auth_token;
    public $auth_key;

    private $user;


    public function __construct()
    {
        $this->user = new Userl();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'api\modules\v1\models\Userl', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'match', 'pattern' => "/^\d+$/", 'message' => 'You have error in number'],
            ['phone', 'unique', 'targetClass' => 'api\modules\v1\models\Userl', 'message' => 'This phone address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

        ];
    }

    /**
     * Signs user up.
     *
     * @return bool|array whether the creating new account was successful and phone was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $this->user->username = $this->username;
        $this->user->phone = $this->phone;
        $this->user->setPassword($this->password);
        $this->user->generatePhoneVerificationKey();


        return $this->user->save();
    }

    /**
     *  Code for auth
     */
    public function sendCode()
    {
        return ['code' => $this->user->auth_key, 'token' => $this->user->auth_token];
    }
}
