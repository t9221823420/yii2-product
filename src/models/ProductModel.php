<?php

namespace yozh\product\models;

use Yii;

class ProductModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }
	
	public function attributeIndexList()
	{
		return [
			'id',
		];
	}
	
	public function attributeViewList()
	{
		return [
			'id',
		];
	}
	
	public function attributeCreateList()
	{
		return $this->attributeEditList();
	}
	
	public function attributeUpdateList()
	{
		return $this->attributeEditList();
	}
	
	public function attributeEditList()
	{
		return [
			'id',
		];
	}
    
    /**
     * @return \yii\db\ActiveQuery
     */
	/*
    public function getRelationRecords()
    {
        return $this->hasMany(RefModel::className(), ['ref_id' => 'table_id']);
    }
	*/
}
