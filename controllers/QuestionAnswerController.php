<?php

namespace app\controllers;

use Yii;
use app\models\QuestionAnswer;
use app\models\search\QuestionAnswerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * QuestionAnswerController implements the CRUD actions for QuestionAnswer model.
 */
class QuestionAnswerController extends Controller
{
    protected function jsonResponse($body)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $body;
    }

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

    public function actionView($id)
    {
        return $this->jsonResponse([
            'status' => true,
            'data' => $this->renderPartial('view', ['model' => $this->findModel($id)]),
        ]);
    }

    public function actionSave($id = null)
    {
        $model = $id ? $this->findModel($id) : new QuestionAnswer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->jsonResponse([
                'status' => true,
                'data' => null,
            ]);
        } else {
            return $this->jsonResponse([
                'status' => true,
                'data' => $this->renderPartial('_form', [
                    'model' => $model,
                ]),
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->jsonResponse([
            'status' => true,
            'data' => null,
        ]);
    }

    /**
     * Finds the QuestionAnswer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuestionAnswer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuestionAnswer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
