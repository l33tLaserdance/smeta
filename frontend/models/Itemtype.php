<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "itemtype".
 *
 * @property int $TypeID
 * @property string $TypeName
 *
 * @property Itemtable[] $itemtables
 * @property Servicestable[] $servicestables
 */
class Itemtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itemtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TypeName'], 'required'],
            [['TypeName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TypeID' => 'Type I D',
            'TypeName' => 'Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemtables()
    {
        return $this->hasMany(Itemtable::className(), ['TypeID' => 'TypeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicestables()
    {
        return $this->hasMany(Servicestable::className(), ['TypeID' => 'TypeID']);
    }
}
