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
 * @property string $registerDate
 * @property string $email
 *
 * @property IdentificaType $identType0
 * @property Debt[] $debts
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
            [['identType', 'numIdent', 'custName', 'custLastNam', 'registerDate'], 'required'],
            [['identType'], 'integer'],
            [['registerDate'], 'safe'],
            [['numIdent', 'cellPhone'], 'string', 'max' => 20],
            [['custName', 'custLastNam', 'phone'], 'string', 'max' => 45],
            [['direction', 'email'], 'string', 'max' => 100],
            [['identType'], 'exist', 'skipOnError' => true, 'targetClass' => IdentificaType::className(), 'targetAttribute' => ['identType' => 'idIdentificaType']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCustomer' => 'Código',
            'identType' => 'Tipo de identificación',
            'numIdent' => 'Número de identificación',
            'custName' => 'Nombre',
            'custLastNam' => 'Apellido',
            'cellPhone' => 'Celular',
            'phone' => 'Teléfono',
            'direction' => 'Dirección',
            'registerDate' => 'Fecha de registro',
            'email' => 'Correo electrónico',
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
    public function getDebts()
    {
        return $this->hasMany(Debt::className(), ['Customer_idCustomer' => 'idCustomer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoans()
    {
        return $this->hasMany(Loan::className(), ['custId' => 'idCustomer']);
    }
}
