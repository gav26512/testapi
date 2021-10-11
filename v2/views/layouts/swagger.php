<?php

use api\assets\SwaggerAsset;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $content string */

SwaggerAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title>ЕРОН REST API</title>

        <link rel="stylesheet" type="text/css" href="/api2/swagger/swagger-ui.css" />
        <link rel="icon" type="image/png" href="/api2/img/swagger/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/api2/img/swagger/favicon-16x16.png" sizes="16x16" />

        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
        <div id="swagger-ui"></div>
        <script>
            window.onload = function() {
                const ui = SwaggerUIBundle({
                    url: "/api2/v2/doc/generate-json",
                    dom_id: '#swagger-ui',
                    deepLinking: true,
                    presets: [
                        SwaggerUIBundle.presets.apis,
                        SwaggerUIStandalonePreset
                    ],
                    plugins: [
                        SwaggerUIBundle.plugins.DownloadUrl
                    ],
                    layout: "StandaloneLayout"
                });
                window.ui = ui;
            };
        </script>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
