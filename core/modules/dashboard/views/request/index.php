<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\Url;
use app\modules\dashboard\models\RequestHome;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard','Request Homes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="Registration-home" data-form-name="Request-Home">
 
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                  </div><!-- /.box-header -->

                <div class="box-body">
                      <?php if ($flash = Yii::$app->session->getFlash("Request-success")): ?>
				        <div class="alert alert-success">
				        <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
				            <p><?= $flash ?></p>
				        </div>
				
				    <?php endif; ?>
				    <br>
				    <p>
				        <?= Html::a(Yii::t('dashboard','Create Request Home'), ['/create-request-home'], ['class' => 'btn btn-success']) ?>
				    </p>
				 <?php foreach ($request as $row):?>
						<div class="request-box">
							<div class="row">

									<div class="col-lg-4">
										<div class="request-contact-box border-radius5 page-info-border-box">
											<div class="row">
												<div class="col-lg-12 col-xs-12 mrg5TB"><strong><?= Yii::t('dashboard','User')?> </strong> : <?= RequestHome::getUser($row['user_id'])?></div>
												<div class="col-lg-12 col-xs-12 mrg5TB"><strong><?= Yii::t('dashboard','Tell')?> </strong> : <?= RequestHome::getTell($row['user_id'])?></div>
												<div class="col-lg-12 col-xs-12 mrg5TB"><strong><?= Yii::t('dashboard','Request Code')?> </strong> : <?= $row['request_code']?></div>
												<div class="col-lg-12 col-xs-12 mrg5TB"><strong><?= Yii::t('dashboard','Request Date')?> </strong> : <?= RequestHome::getCreateTime($row['id'])?></div>
											</div>
										</div>
									</div>
							
								<div class="col-lg-8">

											<div class="col-sm-6 col-xs-12 mrg5TB">
											<?php
												
											 if($row['contract_type'] == 103):
											 	?>
												<strong><?= Yii::t('dashboard','Total Price')?> </strong> : <?= $row['total_price']?>
											<?php else:?>
												<strong><?= Yii::t('dashboard','Rent')?> </strong> : <?= $row['rent']?>
											<?php endif;?>
											</div>
											
											<div class="col-sm-6 col-xs-12 mrg5TB">
												<strong><?= Yii::t('dashboard','Contract Type')?> </strong> : <?= RequestHome::getContractType($row['contract_type']) ?>
											</div>
											<div class="col-sm-6 col-xs-12 mrg5TB">
												<strong><?= Yii::t('dashboard','Metr')?> </strong> : <?= $row['metr']?>
											</div>
											<div class="col-sm-6 col-xs-12 mrg5TB">
												<strong><?= Yii::t('dashboard','Doc Type')?> </strong> : <?=  $row['doc_type']?>
											</div>

											<div class="col-sm-6 col-xs-12 mrg5TB">
											<strong><?= Yii::t('dashboard','Price Rent')?> </strong> : <?=  $row['price_rent']?>
											</div>
											
											<div class="col-sm-6 col-xs-12 mrg5TB">
												<strong><?= Yii::t('dashboard','Home Type')?> </strong> : <?= $row['home_type']?>
											</div>										
											<div class="col-lg-12 mrg5TB">
												<strong><?= Yii::t('dashboard','Location')?> </strong> : <?=  RequestHome::getState($row['state_id'])
																									 .' - '. RequestHome::getCity($row['city_id'])
																									 .' - '. RequestHome::getZone($row['zone_id'])?>
											</div>
											<div class="col-lg-12 mrg5TB">
												<strong><?= Yii::t('dashboard','Description')?> </strong> : <?= $row['description']?>
											</div>
										
								</div>

							</div>
							<div class="row">
								 <div class="col-lg-12 text-left request-tools">
												<?= Html::a('<i class="fa fa-edit"></i>',['/request-home-edit/'.$row['id']], [
										                    'title' => Yii::t('yii', 'Update'),
										                   'data-method' => 'post',
										                   'data-pjax' => '0',
														]);
												?>
												
												<?= Html::a('<i class="fa fa-trash-o"></i>', ['/request-home-delete/'.$row['id']], [
								                    'title' => Yii::t('yii', 'Delete'),
								                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
								                    'data-method' => 'post',
								                    'data-pjax' => '0',
								                    'class' => 'red',
								                ]);
												?>
									</div>
							</div>
						</div>
				 <?php endforeach;?>

                </div><!-- /.box-body -->
                 <div class="box-footer clearfix no-border" dir="ltr">
                 <?= LinkPager::widget(['pagination' => $pages,]);?>
                </div>
 
</div>
