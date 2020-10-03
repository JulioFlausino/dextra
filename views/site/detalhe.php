<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detalhe - <?php echo $heroi['name'] ?></h1>
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
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo $heroi['thumbnail']['path'] . '.' . $heroi['thumbnail']['extension'] ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?php echo $heroi['name'] ?></h3>

                        <p class="text-muted text-center">Herói da Marvel</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Comics</b> <a class="float-right"><?php echo $heroi['comics']['available'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Series</b> <a class="float-right"><?php echo $heroi['series']['available'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Stories</b> <a class="float-right"><?php echo $heroi['stories']['available'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Eventos</b> <a class="float-right"><?php echo $heroi['events']['available'] ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Comics</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Series</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Stories</a></li>
                            <li class="nav-item"><a class="nav-link" href="#events" data-toggle="tab">Eventos</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-danger">
                                            Sequência
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <?php foreach ($comicsdados['data']['results'] as $c => $comic) { ?>
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>
                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock">Modified <?php echo app\models\Utils::formatDateToView(substr($comic['modified'], 0, 10)) ?></i> </span>

                                                <h3 class="timeline-header">Nº <?php echo $comic['title'] ?></h3>

                                                <div class="timeline-body">
                                                    <?php echo $comic['variantDescription'] ?>
                                                </div>
                                                <div class="timeline-body">
                                                    <?php echo $comic['description'] ?>
                                                </div>
                                                <div class="timeline-footer">
                                                    <?php foreach ($comic['prices'] as $p => $preco) { ?>
                                                        <a href="" class="btn btn-warning btn-flat btn-sm">$<?php echo $preco['price'] ?></a>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                    <!-- END timeline item -->


                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-warning">
                                            Sequência
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <?php foreach ($seriesDados['data']['results'] as $c => $comic) { ?>
                                        <div>
                                            <i class="fas fa-comments bg-info"></i>
                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock">Modified <?php echo app\models\Utils::formatDateToView(substr($comic['modified'], 0, 10)) ?></i> </span>

                                                <h3 class="timeline-header">Nº <?php echo $comic['title'] ?></h3>
                                                <div class="timeline-body">
                                                    <?php echo $comic['description'] ?>
                                                </div>
                                                <div class="timeline-body">
                                                    <img src="<?php echo $comic['thumbnail']['path'] . '.' . $comic['thumbnail']['extension'] ?>" width="100%" alt="...">
                                                   
                                                </div>
                                                <div class="timeline-footer">
                                                    Criadores
                                                <?php foreach ($comic['creators']['items'] as $c => $creator) { ?>
                                                        <a href="" class="btn btn-warning btn-flat btn-sm"><?php echo $creator['name'] ?></a>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                    <!-- END timeline item -->


                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                Stories377
                            </div>
                            <div class="tab-pane" id="events">
                                Stories377
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>

        </div>
    </div>
</section>