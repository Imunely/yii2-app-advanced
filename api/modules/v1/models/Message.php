<?php

namespace api\modules\v1\models;


use Yii;
use yii\base\Model;


/**
 * Signup form
 */
class Message extends Model
{
    public $from;
    public $to;
    public $msg;
    public $token;

    private $msgtable;
    //private $user;

    public function __construct()
    {
        $this->msgtable = new Msg();
        //$this->user = new Userl();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['msg', 'trim'],
            ['msg', 'required'],
            ['msg', 'string'],

            [['from', 'to', 'token'], 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool|array whether the creating new account was successful and phone was sent
     */
    public function sendMsg()
    {


        if (!$this->validate() || !$this->validateToken()) {
            return null;
        }

        $this->msgtable->user_id_from = $this->from;
        $this->msgtable->user_id_to = $this->to;
        $this->msgtable->message = $this->msg;

        return $this->msgtable->save();
    }

    /**
     * Check validate token
     *
     * @return bool
     */
    public function validateToken()
    {
        $usr = Userl::findByAuthToken($this->token);

        if ($usr !== null && intval($usr->id) === intval($this->from)) {

            return true;
        }

        return false;
    }
}
