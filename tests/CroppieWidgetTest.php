<?php

/*
 * This file is part of the 2amigos/yii2-croppie-widget project.
 * (c) 2amigOS! <http://2amigos.us/>
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace tests;

use dosamigos\croppie\CroppieWidget;
use tests\overrides\TestCroppieWidget;
use Yii;
use yii\web\JsExpression;
use yii\web\View;

class CroppieWidgetTest extends TestCase
{
    public function testRender()
    {
        $out = CroppieWidget::widget([
            'id' => 'test-croppie'
        ]);

        $expected = '<div id="test-croppie"></div>';

        $this->assertEquals($expected, $out);
    }

    public function testRenderWithOptions()
    {
        $out = CroppieWidget::widget([
            'options' => [
                'id' => 'test-croppie',
                'class' => 'test-class'
            ]
        ]);

        $expected = '<div id="test-croppie" class="test-class"></div>';

        $this->assertEquals($expected, $out);
    }

    public function testRegisterPluginScriptMethod()
    {
        $class = new \ReflectionClass('tests\\overrides\\TestCroppieWidget');
        $method = $class->getMethod('registerClientScript');
        $method->setAccessible(true);

        $widget = TestCroppieWidget::begin(
            [
                'id' => 'test-croppie',
                'clientOptions' => [
                    'enableExif' => true,
                    'viewport' => ['width' => 100, 'height' => 100],
                    'boundary' => ['width' => 300, 'height' => 300],
                    'showZoomer' => false,
                    'enableResize' => true,
                    'enableOrientation' => true
                ],
                'clientEvents' => [
                    'update' => new JsExpression('function(ev, data){ console.log(ev, data); }')
                ]
            ]
        );

        $view = $this->getView();
        $widget->setView($view);
        $method->invoke($widget);

        $test = <<<JS
;jQuery('#test-croppie').croppie({"enableExif":true,"viewport":{"width":100,"height":100},"boundary":{"width":300,"height":300},"showZoomer":false,"enableResize":true,"enableOrientation":true});
jQuery('#test-croppie').on('update', function(ev, data){ console.log(ev, data); });
JS;

        $this->assertEquals($test, $view->js[View::POS_READY]['test-croppie-js']);
    }

    public function testWidget()
    {
        $view = Yii::$app->getView();
        $content = $view->render('//croppie-widget');
        $actual = $view->render('//layouts/main', ['content' => $content]);
        file_put_contents(__DIR__ . '/data/test-croppie-widget.bin', $actual);
        $expected = file_get_contents(__DIR__ . '/data/test-croppie-widget.bin');
        $this->assertEquals($expected, $actual);
    }
}
