<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * InmueblesSearch represents the model behind the search form of `app\models\Inmuebles`.
 */
class InmueblesSearch extends Inmuebles
{
    public $precio_max;
    public $precio_min;

    public function attributeLabel()
    {
        return [
            'precio_max' => 'Precio máximo',
            'precio_min' => 'Precio mínimo',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'propietario_id', 'precio_max', 'precio_min'], 'integer'],
            [['precio', 'num_hab', 'num_banos'], 'number'],
            [['lavavajillas', 'garaje', 'trastero'], 'boolean'],
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
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Inmuebles::find();

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
            'precio' => $this->precio,
            'num_hab' => $this->num_hab,
            'num_banos' => $this->num_banos,
            'lavavajillas' => $this->lavavajillas,
            'garaje' => $this->garaje,
            'trastero' => $this->trastero,
            'propietario_id' => $this->propietario_id,
        ]);

        $query->andFilterWhere(
            ['>=', 'precio' => $this->precio, 'precio_min' => $this->precio_min]
        );

        $query->andFilterWhere(
            ['<=', 'precio' => $this->precio, 'precio_max' => $this->precio_max]
        );

        return $dataProvider;
    }
}
