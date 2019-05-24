<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Itemtable;
use frontend\models\ItemtableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use phpoffice\phpexcel\Classes\PHPExcel;
use yii\helpers\Json;

/**
 * ItemtableController implements the CRUD actions for Itemtable model.
 */
class ItemtableController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Itemtable models.
     * @return mixed
     */
    public function actionIndex()
    {
		
        $searchModel = new ItemtableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		// Check if there is an Editable ajax request
    if (isset($_POST['hasEditable'])) {
        // use Yii's response format to encode output as JSON
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        // read your posted model attributes
        if ($model->load($_POST)) {
            // read or convert your posted information
            $value = $model->name;
            
            // return JSON encoded output in the below format
            return ['output'=>$value, 'message'=>''];
            
            // alternatively you can return a validation error
            // return ['output'=>'', 'message'=>'Validation error'];
        }
        // else if nothing to do always return an empty JSON encoded output
        else {
            return ['output'=>'', 'message'=>''];
        }
    }
    
    // Else return to rendering a normal view
     return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
}

    

    /**
     * Displays a single Itemtable model.
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
     * Creates a new Itemtable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Itemtable();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ItemID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
	
	public function actionImportExcel()
	{
		$inputFile = 'uploads\DSSL_price.xlsx';
		try {
			$inputFileType = \PHPExcel_IOFactory::identify($inputFile);
			$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFile);
		}
		catch(Exception $e)
		{
			die('Error');
		}
		
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		
		for ($row = 1; $row<=$highestRow; $row++)
		{
			$rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
			if($row == 1)
			{
				continue;
			}
			
			$itemtable = new Itemtable();
			$itemtable->ItemArt = $row + 1;
			$itemtable->ItemName = $rowData[0][0];
			$itemtable->ItemInfo = $rowData[0][1];
			$itemtable->ItemCost = $rowData[0][2];
			$itemtable->ItemMeasurement = $rowData[0][3];
			$itemtable->TypeID = 1;
			$itemtable->save();
			
			print_r($itemtable->getErrors());	
		}
		die('okay');
	}
    /**
     * Updates an existing Itemtable model.
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

	public function actionGetInfo($ItemID)
	{
		//ищем наименование товара в таблице с товарами
		$itemtable = Itemtable::findOne($ItemID);
		echo Json::encode($itemtable);
	}
    /**
     * Deletes an existing Itemtable model.
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
     * Finds the Itemtable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Itemtable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Itemtable::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
