<?php
 
namespace api\modules\v1\controllers;
 
use yii\console\Controller;
use Yii;
use function OpenApi\scan;

 
class SwaggerController extends Controller
{
 
    public function actionGo()
    {
        $openApi = scan(Yii::getAlias('@app/modules/api/controllers'));
        $file = Yii::getAlias('@app/web/api-doc/swagger.yaml');
        $handle = fopen($file, 'wb');
        fwrite($handle, $openApi->toYaml());
        fclose($handle);
        return ;
    }
 
}