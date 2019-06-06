<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contragents".
 *
 * @property int $CID
 * @property string $ContrName
 * @property string $ContrFullName
 * @property int $INN
 * @property int $KPP
 * @property int $OGRN
 *
 * @property Account[] $accounts
 * @property Contacts[] $contacts
 * @property Project[] $projects
 */
class Contragents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contragents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ContrName', 'ContrFullName', 'INN', 'KPP', 'OGRN'], 'required'],
            [['INN', 'KPP', 'OGRN'], 'integer'],
            [['ContrName'], 'string', 'max' => 50],
            [['ContrFullName'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CID' => 'ID контрагента',
            'ContrName' => 'Наименование',
            'ContrFullName' => 'Полное наименование',
            'INN' => 'ИНН',
            'KPP' => 'КПП',
            'OGRN' => 'ОГРН',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::className(), ['CID' => 'CID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['CID' => 'CID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['CID' => 'CID']);
    }
}
