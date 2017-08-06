<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Parameters".
 *
 * @property integer $idParameters
 * @property string $Description
 * @property string $Value
 */
class Parameters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Parameters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idParameters', 'Description', 'Value'], 'required'],
            [['idParameters'], 'integer'],
            [['Description'], 'string', 'max' => 100],
            [['Value'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idParameters' => 'Id Parameters',
            'Description' => 'Description',
            'Value' => 'Value',
        ];
    }
}
