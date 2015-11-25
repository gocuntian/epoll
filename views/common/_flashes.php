<?php foreach (Yii::$app->session->getAllFlashes() as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $valueItem) {
            echo '<div class="alert alert-' . $key . '" role="alert">' . $valueItem . '</div>';
        }
    } else {
        echo '<div class="alert alert-' . $key . '" role="alert">' . $value . '</div>';
    }
}
