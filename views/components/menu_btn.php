<?php

/** @var yii\web\View $this */

/**
 * @param $label
 * @param $url
 * @param $icon
 * @param $label
 */

$this->registerCssFile('css/components/menu_btn.css');
?>

<a href="<?= $url ?>" class='menu-btn'>
    <span>
        <img src="<?= $icon ?>" alt="<?= $alt ?>">
    </span>
    <?= $label ?>
</a>
