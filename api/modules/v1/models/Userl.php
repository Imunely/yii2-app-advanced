<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * Userl Model
 *
 */
class Userl extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localUsers';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required']
        ];
    }
}
