<?php

/**
 * This is the model class for table "ecs_users".
 *
 * The followings are the available columns in table 'ecs_users':
 * @property integer $user_id
 * @property string $email
 * @property string $user_name
 * @property string $password
 * @property string $question
 * @property string $answer
 * @property integer $sex
 * @property string $birthday
 * @property string $user_money
 * @property string $frozen_money
 * @property string $pay_points
 * @property string $rank_points
 * @property integer $address_id
 * @property string $reg_time
 * @property string $last_login
 * @property string $last_time
 * @property string $last_ip
 * @property integer $visit_count
 * @property integer $user_rank
 * @property integer $is_special
 * @property string $salt
 * @property integer $parent_id
 * @property integer $flag
 * @property string $alias
 * @property string $msn
 * @property string $qq
 * @property string $office_phone
 * @property string $home_phone
 * @property string $mobile_phone
 * @property integer $is_validated
 * @property string $credit_line
 * @property string $passwd_question
 * @property string $passwd_answer
 */
class User extends CActiveRecord
{

	public $password_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'ecs_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, email, password, password_repeat', 'required'),
			array('sex, address_id, visit_count, user_rank, is_special, parent_id, flag, is_validated', 'numerical', 'integerOnly'=>true),
			array('email, user_name, alias, msn', 'length', 'max'=>60),
			array('password', 'length', 'max'=>32),
			array('question, answer, passwd_answer', 'length', 'max'=>255),
			array('user_money, frozen_money, pay_points, rank_points, reg_time, salt, credit_line', 'length', 'max'=>10),
			array('last_login', 'length', 'max'=>11),
			array('last_ip', 'length', 'max'=>15),
			array('qq, office_phone, home_phone, mobile_phone', 'length', 'max'=>20),
			array('passwd_question', 'length', 'max'=>50),
			array('birthday, last_time, password_repeat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, email, user_name, password, question, answer, sex, birthday, user_money, frozen_money, pay_points, rank_points, address_id, reg_time, last_login, last_time, last_ip, visit_count, user_rank, is_special, salt, parent_id, flag, alias, msn, qq, office_phone, home_phone, mobile_phone, is_validated, credit_line, passwd_question, passwd_answer', 'safe', 'on'=>'search'),
			array('password', 'compare'),
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
			'groups' => array(self::MANY_MANY, 'Group',
				'excs_user_group(user_id, group_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => Utils::t('User'),
			'email' => Utils::t('Email'),
			'user_name' => Utils::t('User Name'),
			'password' => Utils::t('Password'),
			'password_repeat' => Utils::t('Password Repeat'),
			'question' => Utils::t('Question'),
			'answer' => Utils::t('Answer'),
			'sex' => Utils::t('Sex'),
			'birthday' => Utils::t('Birthday'),
			'user_money' => Utils::t('User Money'),
			'frozen_money' => Utils::t('Frozen Money'),
			'pay_points' => Utils::t('Pay Points'),
			'rank_points' => Utils::t('Rank Points'),
			'address_id' => Utils::t('Address'),
			'reg_time' => Utils::t('Reg Time'),
			'last_login' => Utils::t('Last Login'),
			'last_time' => Utils::t('Last Time'),
			'last_ip' => Utils::t('Last Ip'),
			'visit_count' => Utils::t('Visit Count'),
			'user_rank' => Utils::t('User Rank'),
			'is_special' => Utils::t('Is Special'),
			'salt' => Utils::t('Salt'),
			'parent_id' => Utils::t('Parent'),
			'flag' => Utils::t('Flag'),
			'alias' => Utils::t('Alias'),
			'msn' => Utils::t('Msn'),
			'qq' => Utils::t('Qq'),
			'office_phone' => Utils::t('Office Phone'),
			'home_phone' => Utils::t('Home Phone'),
			'mobile_phone' => Utils::t('Mobile Phone'),
			'is_validated' => Utils::t('Is Validated'),
			'credit_line' => Utils::t('Credit Line'),
			'passwd_question' => Utils::t('Passwd Question'),
			'passwd_answer' => Utils::t('Passwd Answer'),
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('user_money',$this->user_money,true);
		$criteria->compare('frozen_money',$this->frozen_money,true);
		$criteria->compare('pay_points',$this->pay_points,true);
		$criteria->compare('rank_points',$this->rank_points,true);
		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('reg_time',$this->reg_time,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('last_time',$this->last_time,true);
		$criteria->compare('last_ip',$this->last_ip,true);
		$criteria->compare('visit_count',$this->visit_count);
		$criteria->compare('user_rank',$this->user_rank);
		$criteria->compare('is_special',$this->is_special);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('flag',$this->flag);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('office_phone',$this->office_phone,true);
		$criteria->compare('home_phone',$this->home_phone,true);
		$criteria->compare('mobile_phone',$this->mobile_phone,true);
		$criteria->compare('is_validated',$this->is_validated);
		$criteria->compare('credit_line',$this->credit_line,true);
		$criteria->compare('passwd_question',$this->passwd_question,true);
		$criteria->compare('passwd_answer',$this->passwd_answer,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	protected function afterValidate()
	{
		parent::afterValidate();
		if(!isset($this->attributes['alias'])){
			$this->alias = '';
		} 
		if(!isset($this->attributes['credit_line'])){
			$this->credit_line = '0.00';
		} 
		$this->reg_time = time();
		$this->password = $this->encrypt($this->password);
	}

	public function encrypt($value)
	{
		return md5($value);
	}
}
