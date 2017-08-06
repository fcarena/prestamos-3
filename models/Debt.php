<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Debt".
 *
 * @property integer $idDebts
 * @property string $Value
 * @property integer $Customer_idCustomer
 * @property string $iniDate
 * @property string $percentage
 * @property string $prePayment
 *
 * @property Customer $customerIdCustomer
 * @property DebtPayment[] $debtPayments
 */
class Debt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Debt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDebts', 'Value', 'Customer_idCustomer', 'iniDate'], 'required'],
            [['idDebts', 'Customer_idCustomer'], 'integer'],
            [['Value', 'percentage'], 'number'],
            [['iniDate'], 'safe'],
            [['prePayment'], 'string', 'max' => 1],
            [['Customer_idCustomer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['Customer_idCustomer' => 'idCustomer']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDebts' => 'Id Debts',
            'Value' => 'Value',
            'Customer_idCustomer' => 'Customer Id Customer',
            'iniDate' => 'Ini Date',
            'percentage' => 'Percentage',
            'prePayment' => 'Pre Payment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerIdCustomer()
    {
        return $this->hasOne(Customer::className(), ['idCustomer' => 'Customer_idCustomer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDebtPayments()
    {
        return $this->hasMany(DebtPayment::className(), ['DidDebt' => 'idDebts']);
    }
}
