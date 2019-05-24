<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        /*$admin = Yii::$app->authManager->createRole('admin');
		$admin->description = 'Администратор';
		Yii::$app->authManager->add($admin);
		
		$role = Yii::$app->authManager->createRole('worker');
		$role->description = 'Работник';
		Yii::$app->authManager->add($role);
		
		$ban = Yii::$app->authManager->createRole('banned');
		$ban->description = 'Заблокированный';
		Yii::$app->authManager->add($ban);*/
		
		/*$permission = Yii::$app->authManager->createPermission('canAdmin');
		$permission->description = 'Право авторизоваться как администратор';
		Yii::$app->authManager->add($permission);*/
		
		/*$role = Yii::$app->authManager->getRole('admin');
		$permission = Yii::$app->authManager->getPermission('canAdmin');
		Yii::$app->authManager->addChild($role, $permission);*/ //(RBAC 30:30)
		
		$userRole = Yii::$app->authManager->getRole('admin');
		Yii::$app->authManager->assign($userRole, 17);
		
		/*$userRole = Yii::$app->authManager->getRole('worker');
		Yii::$app->authManager->assign($userRole, 5);*/
    }

}
?>