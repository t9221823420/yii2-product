<?php

namespace yozh\product\models;

use Yii;
use yozh\taxonomy\models\Taxonomy;
use yozh\crud\models\CRUDModel as ActiveRecord;
use yozh\properties\PropertiesBehavior;

class ProductModel extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'product';
	}
	
	public function rules()
	{
		return [
			[ [ 'taxonomy_id', 'name' ], 'required' ],
			[ [ 'taxonomy_id' ], 'integer' ],
			[ [ 'price' ], 'number' ],
			[ [ 'name' ], 'string', 'max' => 256 ],
			[ [ 'units' ], 'string', 'max' => 10 ],
			[ [ 'taxonomy_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Taxonomy::className(), 'targetAttribute' => [ 'taxonomy_id' => 'id' ] ],
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id'          => 'ID',
			'taxonomy_id' => 'Taxonomy ID',
			'name'        => 'Name',
			'price'       => 'Price',
			'units'       => 'Units',
		];
	}
	
	public function behaviors()
	{
		return array_merge_recursive( parent::behaviors(), [
			PropertiesBehavior::className(),
		]);
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTaxonomy()
	{
		return $this->hasOne( Taxonomy::className(), [ 'id' => 'taxonomy_id' ] );
	}
}
