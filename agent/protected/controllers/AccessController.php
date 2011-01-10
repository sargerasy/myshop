<?php

class AccessController extends Controller
{
	public $layout = "//layouts/access";

	public function actionIndex()
	{
		$this->actionOperation();
	}

	public function actionOperation()
	{
		$authitem = Authitem::model()->findAll();
		$actions = Utils::GetAllActions();
		$operations = array();

		foreach($authitem as $item) {
			$item->noaction = false;
			$route = explode("/", $item->name);

			if(!array_key_exists($route[0], $operations)) {
				$operations[$route[0]] = array();
			}
			$operations[$route[0]][$route[1]] = $item;

			// remove the operation from actions
			if(array_key_exists($route[0], $actions) && array_key_exists($route[1], $actions[$route[0]])) {
				if (sizeof($actions[$route[0]]) === 1)
					unset($actions[$route[0]]);
				else
					unset($actions[$route[0]][$route[1]]);
			} else {
				$item->noaction = true;
			}
		}
		$this->render('operation', array(
			"operations"=>$operations,
			"actions"=>$actions,
			"addaction"=>$this->createUrl("access/add"),
			"delaction"=>$this->createUrl("access/del"),
		));
	}

	public function actionAdd()
	{
		$accesses = $_REQUEST['accesses'];
		$auth = Yii::app()->authManager;
		foreach($accesses as $access) {
			$auth->createOperation($access, $access);
		}
		$this->redirect(array("index"));
	}

	public function actionDel()
	{
		$actions = $_REQUEST['actions'];
		Authitem::model()->delItems($actions);
		$this->redirect(array("index"));
	}

	public function actionRole()
	{
		$this->render('role', array(
		));
	}

	public function actionAddRole()
	{
		$this->redirect(array("index"));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
