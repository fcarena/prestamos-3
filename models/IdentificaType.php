<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Identifica_type".
 *
 * @property integer $idIdentificaType
 * @property string $description
 *
 * @property Customer[] $customers
 */
class IdentificaType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Identifica_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idIdentificaType' => 'Id Identifica Type',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['identType' => 'idIdentificaType']);
    }
}
