<?php
/**
 * Created by PhpStorm.
 * User: Shnappi
 * Date: 13.11.2016
 * Time: 17:30
 */

namespace app\assets;


use yii\web\AssetBundle;

class adminAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin.css',
    ];
    public $js = [
       
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];


}