<div class="timeline timeline-inverse">
    <!-- timeline time label -->
    <div class="time-label">
        <span class="bg-danger">
            Sequência
        </span>
    </div>
    <!-- /.timeline-label -->
    <?php foreach ($dados['data']['results'] as $c => $comic) { ?>
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