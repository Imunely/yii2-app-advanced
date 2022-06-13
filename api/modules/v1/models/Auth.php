<?php

namespace api\modules\v1\models;


use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class Auth extends Model
{

    public $token;
    public $code;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['token', 'required'],
            ['code', 'required'],
        ];
    }

    /**
     * Solution for request
     *
     * @param mixed $usr
     * @return boolean
     */
    public static function canRequest($usr)
    {
        if (time() - $usr->requested_at >= 60) {
            $usr->request_count = 0;
        }

        if ($usr->request_count <= Userl::MAX_REQUEST_COUNT) {
            return true;
        }

        return false;
    }

    /**
     * This method active the user
     *
     * @return string|false
     */
    public function activate()
    {
        if (!empty($userid = Userl::findByAuthToken($this->token))) {

            if (Auth::canRequest($userid)) {
                if (
                    strval($userid->auth_key) === strval($this->code) &&
                    $userid->auth_token === $this->token
                ) {
                    return self::statusIsUp($userid);
                }
            }
        }

        return false;
    }

    public static function statusIsUp($usr)
    {
        $usr->status === Userl::STATUS_ACTIVE ?: $usr->status = Userl::STATUS_ACTIVE;
        $usr->auth_token = Yii::$app->security->generateRandomString();
        $usr->requested_at = time();
        $usr->request_count += 1;

        if ($usr->update()) {
            return $usr->auth_token;
        }

        return false;
    }
}
