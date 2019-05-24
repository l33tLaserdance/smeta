<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utypes".
 *
 * @property int $UTypeID
 * @property string $UTypeName
 *
 * @property User[] $users
 */
class Utypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UTypeID', 'UTypeName'], 'required'],
            [['UTypeID'], 'integer'],
            [['UTypeName'], 'string', 'max' => 30],
            [['UTypeID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UTypeID' => 'U Type I D',
            'UTypeName' => 'U Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['status' => 'UTypeID']);
    }
}
