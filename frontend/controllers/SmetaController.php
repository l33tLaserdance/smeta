<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Json;
use frontend\models\Smeta;
use frontend\models\SmetaSearch;
use frontend\models\Contragents;
use frontend\models\ContragentsSearch;
use frontend\models\Itemtable;
use frontend\models\ItemtableSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SmetaController implements the CRUD actions for Smeta model.
 */
class SmetaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
			'access' => [
                'class' => AccessControl::className(),
                'rules' => [
					[
                        'actions' => ['delete'],
                        'allow' => true,
						'roles' => ['canAdmin'],
                    ],
                    [
                        'actions' => ['index','view','create','update','i-n-n','contr-full-name','k-p-p','o-g-r-n','item-name'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
						// * - все пользователи, @ - зарегистрированные пользователи
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Smeta models.
     * @return mixed
     */
    public function actionIndex()
    {
		$model = new Smeta();
		$modelCID = new Contragents();
        $searchModel = new SmetaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'model' => $model,
			'modelCID' => $modelCID,
        ]);
    }

    /**
     * Displays a single Smeta model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Smeta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Smeta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ItemID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Smeta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ItemID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Smeta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Smeta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Smeta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Smeta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	public function actionContrFullName($q = null) {
		$query1 = Contragents::find();
		
		$query1->select('ContrFullName')
			->from('Contragents')
			->where('ContrFullName LIKE "%' . $q .'%"')
			->orderBy('ContrFullName');
		$command1 = $query1->createCommand();
		$data1 = $command1->queryAll();
		$out1 = [];
		foreach ($data1 as $d) {
			//$out1[] = ['value' => $d['ContrFullName']];
			$out1[] = $d['ContrFullName'];
		}
		echo Json::encode($out1);
	}
	
	public function actionINN($q = null) {
		$query = Contragents::find();
		
		$query->select('INN')
			->from('Contragents')
			->where('INN LIKE "%' . $q .'%"')
			->orderBy('INN');
		$command = $query->createCommand();
		$data = $command->queryAll();
		$out = [];
		foreach ($data as $d) {
			$out[] = $d['INN'];
		}
		echo Json::encode($out);
	}
	
	public function actionKPP($q = null) {
		$query = Contragents::find();
		
		$query->select('KPP')
			->from('Contragents')
			->where('KPP LIKE "%' . $q .'%"')
			->orderBy('KPP');
		$command = $query->createCommand();
		$data = $command->queryAll();
		$out = [];
		foreach ($data as $d) {
			$out[] = $d['KPP'];
		}
		echo Json::encode($out);
	}
	
	public function actionOGRN($q = null) {
		$query = Contragents::find();
		
		$query->select('OGRN')
			->from('Contragents')
			->where('OGRN LIKE "%' . $q .'%"')
			->orderBy('OGRN');
		$command = $query->createCommand();
		$data = $command->queryAll();
		$out = [];
		foreach ($data as $d) {
			$out[] = $d['OGRN'];
		}
		echo Json::encode($out);
	}
	
		public function actionItemName($q = null) {
		$query = Itemtable::find();
		
		$query->select('ItemName')
			->from('Itemtable')
			->where('ItemName LIKE "%' . $q .'%"')
			->orderBy('ItemName');
		$command = $query->createCommand();
		$data = $command->queryAll();
		$out = [];
		foreach ($data as $d) {
			$out[] = $d['ItemName'];
		}
		echo Json::encode($out);
	}
}
