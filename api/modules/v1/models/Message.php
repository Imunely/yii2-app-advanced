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

    private $msgtable;

    public function __construct()
    {
        $this->msgtable = new Msg();
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

            [['from', 'to'], 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool|array whether the creating new account was successful and phone was sent
     */
    public function sendMsg()
    {
        if (!$this->validate()) {
            return null;
        }

        $this->msgtable->user_id_from = $this->from;
        $this->msgtable->user_id_to = $this->to;
        $this->msgtable->message = $this->msg;

        return $this->msgtable->save();
    }

}
