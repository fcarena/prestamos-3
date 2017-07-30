<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Customer".
 *
 * @property integer $idCustomer
 * @property integer $identType
 * @property string $numIdent
 * @property string $custName
 * @property string $custLastNam
 * @property string $cellPhone
 * @property string $phone
 * @property string $direction
 *
 * @property IdentificaType $identType0
 * @property Loan[] $loans
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identType', 'numIdent', 'custName', 'custLastNam'], 'required'],
            [['identType'], 'integer'],
            [['numIdent', 'cellPhone'], 'string', 'max' => 20],
            [['custName', 'custLastNam', 'phone'], 'string', 'max' => 45],
            [['direction'], 'string', 'max' => 100],
            [['identType'], 'exist', 'skipOnError' => true, 'targetClass' => IdentificaType::className(), 'targetAttribute' => ['identType' => 'idIdentificaType']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCustomer' => 'Id Customer',
            'identType' => 'Ident Type',
            'numIdent' => 'Num Ident',
            'custName' => 'Cust Name',
            'custLastNam' => 'Cust Last Nam',
            'cellPhone' => 'Cell Phone',
            'phone' => 'Phone',
            'direction' => 'Direction',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentType0()
    {
        return $this->hasOne(IdentificaType::className(), ['idIdentificaType' => 'identType']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoans()
    {
        return $this->hasMany(Loan::className(), ['custId' => 'idCustomer']);
    }
}
