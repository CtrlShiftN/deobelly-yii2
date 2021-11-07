<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TailorMadeOrder;

/**
 * TailorMadeOrderSearch represents the model behind the search form of `backend\models\TailorMadeOrder`.
 */
class TailorMadeOrderSearch extends TailorMadeOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type', 'status', 'admin_id'], 'integer'],
            [['customer_name', 'customer_tel', 'customer_email', 'body_image', 'notes', 'created_at', 'updated_at'], 'safe'],
            [['height', 'weight', 'neck', 'shoulder', 'chest', 'arm', 'waist', 'wrist', 'waist_to_floor', 'waist_to_knee', 'ankle', 'hip', 'buttock', 'knee', 'thigh', 'biceps'], 'number'],
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
        $query = TailorMadeOrder::find();

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
            'type' => $this->type,
            'height' => $this->height,
            'weight' => $this->weight,
            'neck' => $this->neck,
            'shoulder' => $this->shoulder,
            'chest' => $this->chest,
            'arm' => $this->arm,
            'waist' => $this->waist,
            'wrist' => $this->wrist,
            'waist_to_floor' => $this->waist_to_floor,
            'waist_to_knee' => $this->waist_to_knee,
            'ankle' => $this->ankle,
            'hip' => $this->hip,
            'buttock' => $this->buttock,
            'knee' => $this->knee,
            'thigh' => $this->thigh,
            'biceps' => $this->biceps,
            'status' => $this->status,
            'admin_id' => $this->admin_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_tel', $this->customer_tel])
            ->andFilterWhere(['like', 'customer_email', $this->customer_email])
            ->andFilterWhere(['like', 'body_image', $this->body_image])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
