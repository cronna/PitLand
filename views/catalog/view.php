<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\entity\Categories $model */
/** @var $products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
        ],
    ]) ;
    ?>

    <div class="row row-cols-4 gap-3">
        <?php foreach($products as $product): ?>
            <?php if($product->category_id === $model->id):?>
                <a href='/catalog/view?id=<?= $product->id ?>' class="col card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->title ?></h5>
                    </div>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

</div>
