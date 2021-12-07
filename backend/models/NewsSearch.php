<?php

namespace backend\models;

use common\models\Fields;
use common\models\News;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ChainsSearch represents the model behind the search form of `common\models\News`.
 */
class NewsSearch extends News
{
	/**
	 * @return array|array[]|null
	 */
	public function rules()
	{
		return Fields::getRules(Fields::TAB_NEWS);
	}

	/**
	 * @return array|array[]
	 */
	public function scenarios(): array
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
	public function search(array $params): ActiveDataProvider
	{
		$query = News::find()
			->orderBy(['news_date' => SORT_DESC]);

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
			'news_date' => $this->news_date,
			'news_anons' => $this->news_anons,
			'published' => $this->published,
			'pub_date_start' => $this->pub_date_start,
			'pub_date_end' => $this->pub_date_end,
		]);

		$query->andFilterWhere(['ilike', 'news_text', $this->news_text]);

		return $dataProvider;
	}
}
