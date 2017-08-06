<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Payment".
 *
 * @property integer $idPayment
 * @property string $value
 * @property string $date
 * @property integer $loanId
 * @property string $concept
 * @property string $isPayToCapital
 * @property string $lastDebt
 * @property string $currentDebt
 *
 * @property Loan $loan
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'date', 'loanId', 'concept', 'isPayToCapital', 'lastDebt', 'currentDebt'], 'required'],
            [['value', 'lastDebt', 'currentDebt'], 'number'],
            [['date'], 'safe'],
            [['loanId'], 'integer'],
            [['concept'], 'string', 'max' => 100],
            [['isPayToCapital'], 'string', 'max' => 1],
            [['loanId'], 'exist', 'skipOnError' => true, 'targetClass' => Loan::className(), 'targetAttribute' => ['loanId' => 'idLoan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPayment' => 'Id Payment',
            'value' => 'Value',
            'date' => 'Date',
            'loanId' => 'Loan ID',
            'concept' => 'Concept',
            'isPayToCapital' => 'Is Pay To Capital',
            'lastDebt' => 'Last Debt',
            'currentDebt' => 'Current Debt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoan()
    {
        return $this->hasOne(Loan::className(), ['idLoan' => 'loanId']);
    }
}
