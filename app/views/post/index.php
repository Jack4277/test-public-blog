<?php include 'app/views/layouts/header.php'; ?>

<div class="container">

<?php if(count($post)>0) { ?>
    <div class="container">
        <div class="row">
            <a href="/" class="btn btn-default btn-sm"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>

        </div>

    </div>
    <h3 class="page-header">Concrete Post</h3>
    <div class="container">
        <div class="row" data-id="<?php echo $post[0]['id']?>" id="post-<?php echo $post[0]['id']?>">
            <div class="col-md-1">
                <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
            </div>

            <div class="col-md-11">

                <p><b><?php echo $post[0]['author_name']?></b> <small><?php echo date_format(date_create($post[0]['data']), 'g:ia \o\n l jS F Y')?></small></p>
                <p><?php echo $post[0]['text']?> </p>
                <button class="btn btn-primary btn-md" id="answer<?php echo $post[0]['id']?>" onclick="answerField(<?php echo $post[0]['id']?>)">Comment</button>
                <br><br>


                <?php if(count($comments)>0){
                    foreach ($comments as $comment ) {
                        if($comment['post_id'] == $post[0]['id']) {
                            ?>
                            <div class="row">
                                <div class="col-sm-1">
                                    <i class="fa fa-user-circle fa-3x" aria-hidden="true"></i>
                                </div>
                                <div class="col-sm-11">
                                    <p><b><?php echo $comment['author_name']?></b> <small><?php echo date_format(date_create($comment['data']), 'g:ia \o\n l jS F Y')?></small></p>
                                    <p><?php echo $comment['comment']?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                } ?>

            </div>
        </div>
    </div>
    <?php
} ?>
</div>

<?php include 'app/views/layouts/footer.php'; ?>