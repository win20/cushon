<?php

/** @var yii\web\View $this */

/**
 * @param string $label
 * @param string $url
 * @param string $icon
 * @param string $label
 */

$this->registerCssFile('/css/components/menu_btn.css');
?>

<a href="<?= $url ?>" class='menu-btn'>
    <span>
        <img src="<?= $icon ?>" alt="<?= $alt ?>">
        <?= $label ?>
    </span>
</a>
