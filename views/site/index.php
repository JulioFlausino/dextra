<style>
    .pagination {
        display: inline-block;
    }

    .pagination li {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination li.active {
        background-color: #4CAF50;
        color: white;
    }

    .pagination li:hover:not(.active) {
        background-color: #ddd;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Herois</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Herois</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <?php if(!$online){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> OFFLINE!</h5>
                    O sistema está exibindo a ultima consulta salva!.
                </div>
            <?php }?>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 30%; height:30%">-</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th style="width: 10px">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($herois as $h => $heroi) { ?>
                                    <tr>
                                        <td><img class="img-fluid mb-2" src="<?php echo $heroi['thumbnail']['path'] . '.' . $heroi['thumbnail']['extension'] ?>" alt="<?php $heroi['name'] ?>"></td>
                                        <td><?php echo $heroi['name'] ?></td>
                                        <td><?php echo empty($heroi['description']) ? 'Sem Descrição no momento' : $heroi['description']; ?></td>
                                        <td>
                                            <?php if($online){ ?>
                                            <a href="<?php echo \yii\helpers\Url::to(['site/detalhe', 'id' => base64_encode($heroi['id'])]) ?>"><i class="fa fa-fw fa-eye"></i></a>
                                            <?php }else{ ?>
                                                <i class="fa fa-fw fa-eye-slash" style="color: gray; cursor:not-allowed"></i>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination">
                        <?php echo \yii\widgets\LinkPager::widget([
                            'pagination' => $pagination,
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>