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
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
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
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab" onclick="getEventos('comics','<?php echo $idheroi ?>', 'comics')">Comics</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab" onclick="getEventos('series','<?php echo $idheroi ?>', 'series')">Series</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab" onclick="getEventos('stories','<?php echo $idheroi ?>', 'stories')">Stories</a></li>
                            <li class="nav-item"><a class="nav-link" href="#events" data-toggle="tab" onclick="getEventos('events','<?php echo $idheroi ?>', 'events')">Eventos</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div id="comics"></div>
                            </div>
                            <div class="tab-pane" id="timeline">
                                <div id="series"></div>
                            </div>
                            <div class="tab-pane" id="settings">
                                <div id="stories"></div>
                            </div>
                            <div class="tab-pane" id="events">
                                <div id="events"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    getEventos('comics', '<?php echo $idheroi ?>', 'comics');

    function getEventos(evento, id, container) {
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl . '/site/eventos' ?>',
            type: 'post',
            dataType: 'HTML',
            data: {
                id: id,
                evento: evento,
                _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
            },
            success: function(retorno) {
                $('#' + container).empty().html(retorno);

            }
        });
    }
</script>