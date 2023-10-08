<?php

/** @var yii\web\View $this */

/**
 * @var string $label
 * @var string $url
 * @var string $icon
 * @var string $label
 */

$this->registerCssFile('css/components/menu_btn.css');
?>

<a href="<?= $url ?>" class='menu-btn'>
    <span>
        <img src="<?= $icon ?>" alt="<?= $alt ?>">
        <?= $label ?>
    </span>
</a>
