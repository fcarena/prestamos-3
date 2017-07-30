<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCustomer', 'identType'], 'integer'],
            [['numIdent', 'custName', 'custLastNam', 'cellPhone', 'phone', 'direction'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Customer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idCustomer' => $this->idCustomer,
            'identType' => $this->identType,
        ]);

        $query->andFilterWhere(['like', 'numIdent', $this->numIdent])
            ->andFilterWhere(['like', 'custName', $this->custName])
            ->andFilterWhere(['like', 'custLastNam', $this->custLastNam])
            ->andFilterWhere(['like', 'cellPhone', $this->cellPhone])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'direction', $this->direction]);

        return $dataProvider;
    }
}
