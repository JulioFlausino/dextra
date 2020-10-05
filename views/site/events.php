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

                <h3 class="timeline-header"><?php echo $comic['title'] ?></h3>
                <div class="timeline-body">
                    <?php echo $comic['description'] ?>
                </div>
                <div class="timeline-footer">
                   
                        <div class="col-9">
                            <p class="lead">Mais Detalhes</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        
                                        <tr>
                                            <th style="width:50%">Link</th>
                                        </tr>
                                         <?php foreach ($comic['urls'] as $p => $detalhe) { ?>
                                            <tr>
                                                <td><a href="<?php echo $detalhe['url'] ?>" target="_blank"><?php echo $detalhe['url'] ?></a></td>
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                   
                </div>
            </div>
        </div>

    <?php } ?>

    <!-- END timeline item -->


    <div>
        <i class="far fa-clock bg-gray"></i>
    </div>
</div>