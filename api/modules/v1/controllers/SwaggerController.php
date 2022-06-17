<?php

namespace api\modules\v1\controllers;

use yii\console\Controller;
use Yii;
use function OpenApi\scan;


class SwaggerController extends Controller
{

    public function actionGo()
    {
        $openapi = \OpenApi\Generator::scan(['@api/modules/v1/controllers']);
        header('Content-Type: application/x-yaml');
        echo $openapi->toYaml();
    }
}
