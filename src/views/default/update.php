<?php

use yii\helpers\Html;

include '_header.php';

?>
<div class="<?= "$modelId-$actionId" ?>">

    <h1><?= Html::encode( $this->title ) ?></h1>
	
	<?= $this->render( '@yozh/product/views/default/_form', $_params_ ) ?>

</div>