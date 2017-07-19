<?php

/*
 * This file is part of the 2amigos/yii2-croppie-widget project.
 * (c) 2amigOS! <http://2amigos.us/>
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace tests\overrides;

use dosamigos\croppie\CroppieAsset;
use dosamigos\croppie\CroppieWidget;
use dosamigos\croppie\ExifJsAsset;
use yii\helpers\Json;
use yii\web\View;

class TestCroppieWidget extends CroppieWidget
{
    /**
     * Registers required script for the plugin to work
     */
    public function registerClientScript()
    {
        $view = $this->getView();

        CroppieAsset::register($view);

        if (isset($this->clientOptions['enableExif']) && $this->clientOptions['enableExif'] === true) {
            ExifJsAsset::register($view);
        }

        $options = !empty($this->clientOptions)
            ? Json::encode($this->clientOptions)
            : '';

        $id = $this->getId();

        $js[] = ";jQuery('#$id').croppie($options);";
        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('#$id').on('$event', $handler);";
            }
        }

        $view->registerJs(implode("\n", $js), View::POS_READY, 'test-croppie-js');
    }
}
