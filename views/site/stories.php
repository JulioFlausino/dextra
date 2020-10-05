<div class="timeline timeline-inverse">
    <!-- timeline time label -->
    <div class="time-label">
        <span class="bg-warning">
            Sequência
        </span>
    </div>
    <!-- /.timeline-label -->
    <?php foreach ($dados['data']['results'] as $c => $comic) { ?>
        <div>
            <i class="fas fa-comments bg-info"></i>
            <div class="timeline-item">
                <span class="time"><i class="far fa-clock">Modified <?php echo app\models\Utils::formatDateToView(substr($comic['modified'], 0, 10)) ?></i> </span>

                <h3 class="timeline-header">Nº <?php echo $comic['title'] ?></h3>
                <div class="timeline-body">
                    <?php echo empty($comic['description']) ? 'Sem descrição ' :  $comic['description'];?>
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