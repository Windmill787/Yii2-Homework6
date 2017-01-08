<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * StudentsHomeworkSearch represents the model behind the search form about `app\models\StudentsHomework`.
 */
class StudentsHomeworkSearch extends StudentsHomework
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['students_id', 'homework_id'], 'integer'],
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
        $query = StudentsHomework::find();

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
            'students_id' => $this->students_id,
            'homework_id' => $this->homework_id,
        ]);

        return $dataProvider;
    }
}
