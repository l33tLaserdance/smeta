<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicestable".
 *
 * @property int $ServiceID
 * @property string $ServiceName
 * @property string $ServiceInfo
 * @property string $ServiceMeasurement
 * @property int $ServiceCost
 * @property int $TypeID
 *
 * @property Itemtype $type
 */
class Servicestable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicestable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ServiceName', 'ServiceInfo', 'ServiceMeasurement', 'ServiceCost', 'TypeID'], 'required'],
            [['ServiceInfo'], 'string'],
            [['ServiceCost', 'TypeID'], 'integer'],
            [['ServiceName'], 'string', 'max' => 100],
            [['ServiceMeasurement'], 'string', 'max' => 20],
            [['TypeID'], 'exist', 'skipOnError' => true, 'targetClass' => Itemtype::className(), 'targetAttribute' => ['TypeID' => 'TypeID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ServiceID' => 'Service ID',
            'ServiceName' => 'Service Name',
            'ServiceInfo' => 'Service Info',
            'ServiceMeasurement' => 'Service Measurement',
            'ServiceCost' => 'Service Cost',
            'TypeID' => 'Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Itemtype::className(), ['TypeID' => 'TypeID']);
    }
}
