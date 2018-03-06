<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes JD';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
	<?php 
		echo "Mi nombre es " . $nomb;
	 ?>
</div>
<br>
<?php foreach ($model as $data) { ?>
	<h1><?= $data->custName.' '.$data->custLastNam ?></h1>
<?php } ?>