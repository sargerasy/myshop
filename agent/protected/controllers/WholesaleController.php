<?php

class WholesaleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/drp';


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$categories = Utils::getModelTree(Category::model()->findAll(), 'cat_id', 'parent_id');
		$brands = Brand::model()->findAll();
		$tmp = array(array('brand_id'=>0, 'brand_name'=>Utils::t("All Brands")));
		$brands = array_merge($tmp, $brands);
		$goods = array();

		$categories_opt = Utils::generateOptionTree($categories, '', 'cat_name', 0);
		$this->render('create',array(
			'model'=>$model,
			'categories'=>$categories_opt,
			'brands'=>$brands,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Wholesale']))
		{
			$model->attributes=$_POST['Wholesale'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * List all models.
	 */
	public function actionList()
	{
		$model=new Wholesale('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wholesale']))
			$model->attributes=$_GET['Wholesale'];

		$this->render('list',array(
			'model'=>$model,
		));
	}

	public function actionSearch()
	{
		$criteria = new CDbCriteria;
		if(isset($_POST['cat_id'])) {
			$cat_id = intval($_POST['cat_id']);
			if($cat_id > 0)
				$criteria->compare('cat_id', $cat_id);
		}
		if(isset($_POST['brand_id'])) {
			$brand_id = intval($_POST['brand_id']);
			if($brand_id > 0)
				$criteria->compare('brand_id', $brand_id);
		}
		if(isset($_POST['keyword']))
			$criteria->addSearchCondition('goods_name', $_POST['keyword']);

		$data = Goods::model()->findAll($criteria);
		if(sizeof($data) == 0) {
			echo CHtml::tag('option', array('value'=>-1), Utils::t('No Goods Matched'), true);
		} else 
			foreach($data as $item) {
				echo CHtml::tag('option', array('value'=>$item['goods_id']), $item['goods_name'], true);
			}
	}

	public function actionUpdateWholesale()
	{
		if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['enable'])) {
			$model=$this->loadModel($_POST['id']);
			$model->name = $_POST['name'];
			$model->desc = $_POST['desc'];
			$model->enable = $_POST['enable'] === 'true' ? 1 : 0;
			if($model->save())
				echo Utils::t('Update Success');
			else
				echo CHtml::errorSummary($model);
		} else {
			echo Utils::t('Update Failed');
		}
	}

	public function actionSave()
	{
		if(isset($_POST['goods_id'])) {
			$goods_id = $_POST['goods_id'];
			$goods = Goods::model()->findByPk(intval($goods_id));
			$wholesale = new Wholesale;
			$wholesale->goods_id = $goods_id;
			$wholesale->desc = $_POST['desc'];
			$wholesale->name = $goods->goods_name;
			$wholesale->enable = 1;
			if($wholesale->save()) {
				$success = true;
				if(isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['commision'])) {
					$quantities = $_POST['quantity'];
					$prices = $_POST['price'];
					$commisions = $_POST['commision'];
					$len = sizeof($quantities);
					for($i = 0; $i < $len; $i++) {
						$price_strategy = new PriceStrategy;
						$price_strategy->wholesale_id = $wholesale->id;
						$price_strategy->quantity = $quantities[$i];
						$price_strategy->price= $prices[$i];
						$price_strategy->commision = $commisions[$i];
						if(!$price_strategy->save()) {
							echo CHtml::errorSummary($price_strategy);
							$success = false;
						}
					}
				}
				if($success)
					$this->redirect(array('wholesale/list'));
			} else {
				echo CHtml::errorSummary($wholesale);
			}
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Wholesale::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='wholesale-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
