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
		$authitem = Yii::app()->authManager->getOperations();//Authitem::model()->findAll();
		$actions = Utils::GetAllActions();
		$operations = array();

		foreach($authitem as $item) {
			$unuse = false;
			$route = explode("/", $item->name);

			// remove the operation from actions
			if(array_key_exists($route[0], $actions) && array_key_exists($route[1], $actions[$route[0]])) {
				if (sizeof($actions[$route[0]]) === 1)
					unset($actions[$route[0]]);
				else
					unset($actions[$route[0]][$route[1]]);
			} else {
				$unuse = true;
			}

			if(!array_key_exists($route[0], $operations)) {
				$operations[$route[0]] = array();
			}
			$operations[$route[0]][$route[1]] = array($item, $unuse);
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
		Yii::app()->user->setFlash('success', Utils::t('Operation Successful'));
		$this->redirect(array("index"));
	}

	public function actionDel()
	{
		$actions = $_REQUEST['actions'];
		Authitem::model()->delItems($actions);
		Yii::app()->user->setFlash('success', Utils::t('Operation Successful'));
		$this->redirect(array("index"));
	}

	public function actionRole()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('type', CAuthItem::TYPE_ROLE);
		$data = new CActiveDataProvider('AuthItem', array(
			'criteria' => $criteria,
		));

		$this->render('role', array(
			'data' => $data,
		));
	}

	public function actionCreateRole()
	{
		$auth = Yii::app()->authManager;

		if(isset($_POST['RoleName'])) {
			$name = $_POST['RoleName'];
			if(!$name)
				throw new CHttpException(400,'You Must Fill the Name Field!');
			$role = $auth->createRole($name);
			if(isset($_POST['actions'])) {
				$actions = $_POST['actions'];
				foreach($actions as $action) {
					$role->addChild($action);
				}
			}
			Yii::app()->user->setFlash('success', Utils::t('Operation Successful'));
			$this->redirect(array('role'));
		}
		$authitem = $auth->getOperations();
		$roles = $auth->getRoles();
		$selects = array();

		foreach($roles as $role) {
			if(!array_key_exists('Roles', $selects))
				$selects['Roles'] = array();
			$selects['Roles'][$role->name] = array($role, false);
		}

		foreach($authitem as $item) {
			$route = explode("/", $item->name);

			if(!array_key_exists($route[0], $selects)) {
				$selects[$route[0]] = array();
			}
			$selects[$route[0]][$route[1]] = array($item, false);
		}
		$this->render('createRole', array(
			"selects"=>$selects,
			"action"=>$this->createUrl(""),
		));
	}

	public function actionUpdateRole($name)
	{
		$auth = Yii::app()->authManager;

		if(isset($_POST['actions'])) {
			$actions = $_POST['actions'];
			$children = $auth->getItemChildren($name);
			foreach($actions as $action) {
				$op = true;
				foreach($children as $child) {
					if($child->name == $action) {
						$op = false;
						break;
					}
				}
				if($op)
					$auth->addItemChild($name, $action);
			}

			foreach($children as $child) {
				$op = true;
				foreach($actions as $action) {
					if($child->name == $action) {
						$op = false;
						break;
					}
				}
				if($op)
					$auth->removeItemChild($name, $child->name);
			}
			Yii::app()->user->setFlash('success', Utils::t('Operation Successful'));
			$this->redirect($this->createUrl('updateRole', array('name'=>$name)));
		}

		$authitem = $auth->getOperations();
		$roles = $auth->getRoles();
		$selects = array();

		foreach($roles as $role) {
			if($role->name == $name || $auth->detectLoop($name, $role->name))
				continue;
			if(!array_key_exists('Roles', $selects))
				$selects['Roles'] = array();
			$exist = $auth->hasItemChild($name, $role->name);
			$selects['Roles'][$role->name] = array('value'=>$role, 'unsued'=>false, 'exist'=>$exist);
		}

		foreach($authitem as $item) {
			$exist = $auth->hasItemChild($name, $item->name);

			$route = explode("/", $item->name);

			if(!array_key_exists($route[0], $selects)) {
				$selects[$route[0]] = array();
			}
			$selects[$route[0]][$route[1]] = array('value'=>$item, 'unsued'=>false, 'exist'=>$exist);
		}
		$this->render('updateRole', array(
			"selects"=>$selects,
			"action"=>$this->createUrl("", array('name'=>$name)),
			"name"=>$name,
		));
	}

	public function actionDeleteRole($name)
	{
		if(Yii::app()->request->isPostRequest)
		{
			$auth = Yii::app()->authManager;
			$auth->removeAuthItem($name);

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionAssignRole($name)
	{
		if(isset($_POST['users'])) {
			$auth = Yii::app()->authManager;
			$users = $_POST['users'];
			foreach($users as $user) {
				$auth->assign($name, $user);
			}
			Yii::app()->user->setFlash('success', Utils::t('Operation Successful'));
			$this->redirect(array('assignRole', 'name'=>$name));
		}

		$role = AuthItem::model()->findByAttributes(array('name'=>$name));
		$_users = User::model()->findAll();
		$users = Utils::exclude($_users, $role->users, 'user_id');

		$this->render('assign', array(
			'role' => $role,
			'users' => $users,
			'action'=>Yii::app()->controller->createUrl("access/assignRole", array('name'=>$role->name)),
		));
	}

	public function actionRemove($role, $user_id)
	{
		Yii::app()->authManager->revoke($role, $user_id);
		Yii::app()->user->setFlash('success', Utils::t('Operation Successful'));
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
