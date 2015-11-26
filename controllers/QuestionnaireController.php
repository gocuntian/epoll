<?php

namespace app\controllers;

use app\models\search\QuestionSearch;
use Yii;
use app\models\Questionnaire;
use app\models\search\Questionnaire as QuestionnaireSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestionnaireController implements the CRUD actions for Questionnaire model.
 */
class QuestionnaireController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new QuestionnaireSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $questionSearchModel = new QuestionSearch();
        $questionDataProvider = $questionSearchModel->search(['QuestionSearch' => ['id_ank' => $id]]);
        $questionDataProvider->setPagination(['pagesize' => 10]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'questionSearchModel' => $questionSearchModel,
            'questionDataProvider' => $questionDataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Questionnaire();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', Yii::t('app', "Record was successfully created."));
            return $this->redirect(['view', 'id' => $model->id_ank]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', Yii::t('app', "Record was successfully updated."));
            return $this->redirect(['view', 'id' => $model->id_ank]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Questionnaire model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Questionnaire the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Questionnaire::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
