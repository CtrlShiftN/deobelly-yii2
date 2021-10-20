<?php

namespace backend\models;

use common\components\SystemConstant;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order;
use yii\db\Query;

/**
 * OrderSearch represents the model behind the search form of `backend\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'product_id', 'color_id', 'size_id', 'quantity', 'province_id', 'district_id', 'village_id', 'admin_id', 'status'], 'integer'],
            [['specific_address', 'address', 'notes', 'tel', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = (new Query())
            ->select([
                'o.*',
                'p.name as product_name',
                'u.name as user_name',
                'c.name as color_name',
                's.name as size_name',
            ])->from('order as o')
            ->leftJoin('product as p', 'o.product_id = p.id')
            ->leftJoin('user as u', 'o.user_id = u.id')
            ->leftJoin('color as c', 'o.color_id = c.id')
            ->leftJoin('size as s', 'o.size_id = s.id');

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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'color_id' => $this->color_id,
            'size_id' => $this->size_id,
            'quantity' => $this->quantity,
            'admin_id' => $this->admin_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'province', $this->province_id])
            ->andFilterWhere(['like', 'district', $this->district_id])
            ->andFilterWhere(['like', 'village', $this->village_id])
            ->andFilterWhere(['like', 'specific_address', $this->specific_address])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'tel', $this->tel]);

        return $dataProvider;
    }
}
