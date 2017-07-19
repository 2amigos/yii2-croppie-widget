<?php

/*
 * This file is part of the 2amigos/yii2-croppie-widget project.
 * (c) 2amigOS! <http://2amigos.us/>
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace tests;

use dosamigos\croppie\CroppieAsset;
use dosamigos\croppie\ExifJsAsset;
use yii\web\AssetBundle;

class CroppieAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        CroppieAsset::register($view);
        $this->assertEquals(2, count($view->assetBundles));
        $this->assertArrayHasKey('yii\\web\\JqueryAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['dosamigos\\croppie\\CroppieAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('jquery.js', $content);
        $this->assertContains('croppie.js', $content);
        $this->assertContains('croppie.css', $content);
    }

    public function testRegisterWithExifJs()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        CroppieAsset::register($view);
        ExifJsAsset::register($view);
        $this->assertEquals(3, count($view->assetBundles));
        $this->assertArrayHasKey('yii\\web\\JqueryAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['dosamigos\\croppie\\CroppieAsset'] instanceof AssetBundle);
        $this->assertTrue($view->assetBundles['dosamigos\\croppie\\ExifJsAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('jquery.js', $content);
        $this->assertContains('exif.js', $content);
        $this->assertContains('croppie.js', $content);
        $this->assertContains('croppie.css', $content);
    }
}
