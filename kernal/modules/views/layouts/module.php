<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\dashboard\models\Menus;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>"/>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
  <?php $this->beginBody() ?>
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->

        <?= Html::a('<b>Home</b>CART','/dashboard',['class'=>'logo'])?>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                        <?php if(Yii::$app->user->identity->profile->avatar):?>
						<?= Html::img(Yii::getAlias('@web').'/uploads/avatars/'. Yii::$app->user->identity->profile->avatar,['class'=>'user-image']);?>
						<?php else :?>
						<?= Html::img(Yii::getAlias('@web').'/images/avatar.png',['class'=>'user-image']);?>
						<?php endif?>
                  <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                        <?php if(Yii::$app->user->identity->profile->avatar):?>
						<?= Html::img(Yii::getAlias('@web').'/uploads/avatars/'. Yii::$app->user->identity->profile->avatar,['class'=>'img-circle']);?>
						<?php else :?>
						<?= Html::img(Yii::getAlias('@web').'/images/avatar.png',['class'=>'img-circle']);?>
						<?php endif?>
                    <p>
                      <?= Yii::$app->user->identity->username?> 
                      <small><?= Yii::$app->user->identity->username?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <?= Html::a(Yii::t("fa-IR", "Profile"),'change-profile',['class'=>'btn btn-default btn-flat'])?>
                    </div>
                    <div class="pull-left">
				                   
				        <?= Html::a(Yii::t("fa-IR", "Sign out"),['/logout'], [
				       				 'class'=>'btn btn-default btn-flat',
				                    'title' => Yii::t('yii', 'Sign out'),
				                    //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
				                   'data-method' => 'post',
				                   'data-pjax' => '0',
								]);
						?>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel text-right">
            <div class="pull-right image">

             <?php if(Yii::$app->user->identity->profile->avatar):?>
			<?= Html::img(Yii::getAlias('@web').'/uploads/avatars/'. Yii::$app->user->identity->profile->avatar,['class'=>'img-circle']);?>
			<?php else :?>
			<?= Html::img(Yii::getAlias('@web').'/images/avatar.png',['class'=>'img-circle']);?>
			<?php endif?>
            </div>
            <div class="pull-right info">
              <p><?= Yii::$app->user->identity->username?></p>
              <a href="#" > Online <i class="fa fa-circle text-success"></i></a>
            </div>
          </div>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
          
            <li class="header">MAIN NAVIGATION</li>
           <?php foreach (Menus::find()->where(['role_id'=> Yii::$app->user->identity->role_id, 'parent_id' => null])->all() as $r):?>
            <li class="treeview" id="<?= $r['title']?>">
              <a href="#">
               <i class="fa fa-angle-right pull-left"></i>  <span><?= Yii::t('fa-IR',$r['title'])?></span> <i class="fa <?= $r['icon']?>"></i>
              </a>
              <ul class="treeview-menu">
              <?php foreach (Menus::find()->where(['role_id'=>Yii::$app->user->identity->role_id, 'parent_id' => $r['id']])->all() as $rr):?>
              	<li><?= Html::a(Yii::t('fa-IR',$rr['title']).'<i class="fa fa-circle-o"></i>',$rr['url']);?></li>
              <?php endforeach;?>
                <!--
                 <li class="active"><?= Html::a(Yii::t('fa-IR',$r['title']).'<i class="fa fa-circle-o"></i>','pages');?></li>
                <li><?= Html::a(Yii::t('fa-IR',$r['title']).'<i class="fa fa-circle-o"></i>','settings');?></li>
                -->
              </ul>
            </li>
			<?php endforeach;?>
            <li class="header">LABELS</li>
            <li><a href="#"> Important <i class="fa fa-circle-o text-danger"></i></a></li>
            <li><a href="#"> Warning <i class="fa fa-circle-o text-warning"></i></a></li>
            <li><a href="#"> Information <i class="fa fa-circle-o text-info"></i></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="yekan">
            <small><?= Yii::t('fa-IR','Control panel')?></small>
            <?= Yii::t('fa-IR','Dashboard')?>
          </h1>
   
               <?php echo Breadcrumbs::widget([
                'itemTemplate' => "<li><i>{link}</i></li>\n",
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => [
		            'label' => Yii::t('fa-IR','Dashboard'),  // required
		         	'url' => ['/dashboard'],      // optional, will be processed by Url::to()
		         	'template' => "<li><i class='fa fa-dashboard'></i> <span>{link}</span></li>\n",
		            ],
            	]) ?>       

        </section>

        <!-- Main content -->
 <section class="content">
           <?= $content ?>
</section>

        <!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.1
        </div>
        <strong>Copyright &copy; 2014-2015  All rights reserved.
      </footer>
    </div><!-- ./wrapper -->


    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>