<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Debt_payment".
 *
 * @property integer $idDebtPayments
 * @property integer $DidDebt
 * @property string $datePayment
 * @property string $lastBalance
 * @property string $currentBalance
 * @property string $observation
 *
 * @property Debt $didDebt
 */
class DebtPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Debt_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDebtPayments', 'DidDebt'], 'required'],
            [['idDebtPayments', 'DidDebt'], 'integer'],
            [['lastBalance', 'currentBalance'], 'number'],
            [['datePayment'], 'string', 'max' => 45],
            [['observation'], 'string', 'max' => 100],
            [['DidDebt'], 'exist', 'skipOnError' => true, 'targetClass' => Debt::className(), 'targetAttribute' => ['DidDebt' => 'idDebts']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDebtPayments' => 'Id Debt Payments',
            'DidDebt' => 'Did Debt',
            'datePayment' => 'Date Payment',
            'lastBalance' => 'Last Balance',
            'currentBalance' => 'Current Balance',
            'observation' => 'Observation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDidDebt()
    {
        return $this->hasOne(Debt::className(), ['idDebts' => 'DidDebt']);
    }
}
