<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "itemtable".
 *
 * @property int $ItemID
 * @property int $ItemArt
 * @property string $ItemName
 * @property string $ItemInfo
 * @property int $ItemCost
 * @property string $ItemMeasurement
 * @property int $TypeID
 *
 * @property Itemtype $type
 */
class Itemtable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itemtable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ItemArt', 'ItemName', 'ItemInfo', 'ItemCost', 'ItemMeasurement', 'TypeID'], 'required'],
            [['ItemID', 'ItemArt', 'ItemCost', 'TypeID'], 'integer'],
            [['ItemInfo'], 'string'],
            [['ItemName'], 'string', 'max' => 200],
            [['ItemMeasurement'], 'string', 'max' => 20],
            [['TypeID'], 'exist', 'skipOnError' => true, 'targetClass' => Itemtype::className(), 'targetAttribute' => ['TypeID' => 'TypeID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ItemID' => 'ID товара',
            'ItemArt' => 'Артикул',
            'ItemName' => 'Наименование',
            'ItemInfo' => 'Краткая информация',
            'ItemCost' => 'Стоимость',
            'ItemMeasurement' => 'Единицы измерения',
            'TypeID' => 'Тип',
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
