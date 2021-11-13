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
    public $user_name;
    public $product_name;
    public $color_name;
    public $size_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'product_id', 'color_id', 'size_id', 'quantity', 'province_id', 'district_id', 'village_id', 'admin_id', 'logistic_method', 'status'], 'integer'],
            [['BL_code', 'specific_address', 'address', 'notes', 'name', 'email', 'tel', 'created_at', 'updated_at'], 'safe'],
            [['user_name', 'product_name', 'color_name', 'size_name'], 'safe']
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

        if (!empty($this->user_name)) {
            $query->andFilterWhere(['o.user_id' => $this->user_name]);
        }

        if (!empty($this->product_name)) {
            $query->andFilterWhere(['o.product_id' => $this->product_name]);
        }
        if (!empty($this->color_name)) {
            $query->andFilterWhere(['o.color_id' => $this->color_name]);
        }
        if (!empty($this->size_name)) {
            $query->andFilterWhere(['o.size_id' => $this->size_name]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'o.id' => $this->id,
            'o.BL_code' => $this->BL_code,
            'o.user_id' => $this->user_id,
            'o.product_id' => $this->product_id,
            'o.color_id' => $this->color_id,
            'o.size_id' => $this->size_id,
            'o.quantity' => $this->quantity,
            'o.province_id' => $this->province_id,
            'o.district_id' => $this->district_id,
            'o.village_id' => $this->village_id,
            'o.admin_id' => $this->admin_id,
            'o.logistic_method' => $this->logistic_method,
            'o.status' => $this->status,
            'o.created_at' => $this->created_at,
            'o.updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'o.specific_address', $this->specific_address])
            ->andFilterWhere(['like', 'o.address', $this->address])
            ->andFilterWhere(['like', 'o.notes', $this->notes])
            ->andFilterWhere(['like', 'o.name', $this->name])
            ->andFilterWhere(['like', 'o.email', $this->email])
            ->andFilterWhere(['like', 'o.tel', $this->tel]);

        return $dataProvider;
    }
}
