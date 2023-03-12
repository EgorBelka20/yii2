<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        
    </div>

    <div class="body-content">
            
        <div class="events">
            <h4>Новости</h4>
        </div>

        <div class="row">

        <?php
            foreach($news as $news){
                echo '
                <div class="col-lg-3">
                    <h2 class="text-oglav">'.$news->name.'</h2>

                    <p>'.$news->timestamp.'</p>
                    <img class="img-responsive" width="240px" src="../uploads/'.$news->photo.'">

                    <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                </div>
                ';
            }
        ?>
        </div>

    </div>
</div>
