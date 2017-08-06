<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Loan".
 *
 * @property integer $idLoan
 * @property integer $custId
 * @property string $value
 * @property integer $idLoanType
 * @property string $prePayment
 * @property string $date
 * @property string $percentage
 *
 * @property Customer $cust
 * @property LoanType $idLoanType0
 * @property Payment[] $payments
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
            [['custId', 'value', 'idLoanType', 'prePayment', 'date', 'percentage'], 'required'],
            [['custId', 'idLoanType'], 'integer'],
            [['value', 'percentage'], 'number'],
            [['date'], 'safe'],
            [['prePayment'], 'string', 'max' => 1],
            [['custId'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['custId' => 'idCustomer']],
            [['idLoanType'], 'exist', 'skipOnError' => true, 'targetClass' => LoanType::className(), 'targetAttribute' => ['idLoanType' => 'idLoanType']],
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
            'idLoanType' => 'Id Loan Type',
            'prePayment' => 'Pre Payment',
            'date' => 'Date',
            'percentage' => 'Percentage',
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
    public function getIdLoanType0()
    {
        return $this->hasOne(LoanType::className(), ['idLoanType' => 'idLoanType']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['loanId' => 'idLoan']);
    }
}
