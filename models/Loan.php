<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Loan".
 *
 * @property integer $idLoan
 * @property integer $custId
 * @property string $value
 * @property integer $LoanType_idLoanType
 * @property string $prePayment
 *
 * @property Customer $cust
 * @property LoanType $loanTypeIdLoanType
 */
class Loan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Loan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['custId', 'value', 'LoanType_idLoanType', 'prePayment'], 'required'],
            [['custId', 'LoanType_idLoanType'], 'integer'],
            [['value'], 'number'],
            [['prePayment'], 'string', 'max' => 1],
            [['custId'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['custId' => 'idCustomer']],
            [['LoanType_idLoanType'], 'exist', 'skipOnError' => true, 'targetClass' => LoanType::className(), 'targetAttribute' => ['LoanType_idLoanType' => 'idLoanType']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLoan' => 'Id Loan',
            'custId' => 'Cust ID',
            'value' => 'Value',
            'LoanType_idLoanType' => 'Loan Type Id Loan Type',
            'prePayment' => 'Pre Payment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCust()
    {
        return $this->hasOne(Customer::className(), ['idCustomer' => 'custId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoanTypeIdLoanType()
    {
        return $this->hasOne(LoanType::className(), ['idLoanType' => 'LoanType_idLoanType']);
    }
}
