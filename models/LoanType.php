<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Loan_type".
 *
 * @property integer $idLoanType
 * @property string $description
 *
 * @property Loan[] $loans
 */
class LoanType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Loan_type';
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
            'idLoanType' => 'Id Loan Type',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoans()
    {
        return $this->hasMany(Loan::className(), ['idLoanType' => 'idLoanType']);
    }
}
