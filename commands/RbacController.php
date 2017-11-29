<?
namespace app\commands;

use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {

        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $auth = Yii::$app->authManager;


        $index = $auth->createPermission('index');
        $index->description = 'Index view';
        $auth->add($index);

        $edit = $auth->createPermission('edit');
        $edit->description = 'Edit';
        $auth->add($edit);

        $view = $auth->createPermission('view');
        $view->description = 'View';
        $auth->add($view);

        $delete = $auth->createPermission('delete');
        $view->description = 'Delete';
        $auth->add($delete);


        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $index);
        $auth->addChild($user, $edit);
        $auth->addChild($user, $view);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $index);
        $auth->addChild($admin, $edit);
        $auth->addChild($admin, $view);
        $auth->addChild($admin, $delete);


        $auth->assign($user, 2);
        $auth->assign($admin, 1);
    }
}