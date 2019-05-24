<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "smeta".
 *
 * @property int $ItemID
 * @property string $ItemName
 * @property string $ItemMeasurement
 * @property int $Amount
 * @property int $ItemCost
 * @property int $ItemSumm
 * @property string $ServiceName
 * @property int $ServiceCost
 * @property int $ServiceSumm
 */
class Smeta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smeta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ItemName', 'ItemMeasurement', 'Amount', 'ItemCost', 'ItemSumm', 'ServiceName', 'ServiceCost', 'ServiceSumm'], 'required'],
            [['Amount', 'ItemCost', 'ItemSumm', 'ServiceCost', 'ServiceSumm'], 'integer'],
            [['ItemName'], 'string', 'max' => 200],
            [['ItemMeasurement'], 'string', 'max' => 20],
            [['ServiceName'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ItemID' => '№',
            'ItemName' => 'Наименование',
            'ItemMeasurement' => 'Ед. изм.',
            'Amount' => 'Кол-во',
            'ItemCost' => 'Цена, руб.',
            'ItemSumm' => 'Сумма, руб.',
            'ServiceName' => 'Наименование услуги',
            'ServiceCost' => 'Цена, руб.',
            'ServiceSumm' => 'Сумма, руб.',
        ];
    }
}
