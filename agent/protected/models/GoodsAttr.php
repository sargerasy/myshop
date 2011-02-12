<?php

/**
 * This is the model class for table "ecs_goods_attr".
 *
 * The followings are the available columns in table 'ecs_goods_attr':
 * @property string $goods_attr_id
 * @property integer $goods_id
 * @property integer $attr_id
 * @property string $attr_value
 * @property string $attr_price
 */
class GoodsAttr extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GoodsAttr the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ecs_goods_attr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attr_value', 'required'),
			array('goods_id, attr_id', 'numerical', 'integerOnly'=>true),
			array('attr_price', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('goods_attr_id, goods_id, attr_id, attr_value, attr_price', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'attribute'=>array(self::BELONGS_TO, 'Attribute', 'attr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'goods_attr_id' => 'Goods Attr',
			'goods_id' => 'Goods',
			'attr_id' => 'Attr',
			'attr_value' => 'Attr Value',
			'attr_price' => 'Attr Price',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('goods_attr_id',$this->goods_attr_id,true);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('attr_id',$this->attr_id);
		$criteria->compare('attr_value',$this->attr_value,true);
		$criteria->compare('attr_price',$this->attr_price,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
