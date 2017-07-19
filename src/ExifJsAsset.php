<?php

/*
 * This file is part of the 2amigos/yii2-croppie-widget project.
 * (c) 2amigOS! <http://2amigos.us/>
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace dosamigos\croppie;

use yii\web\AssetBundle;

class ExifJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/exif-js';

    public $js = [
        'exif.js'
    ];
}
