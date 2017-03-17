<?php include 'app/views/layouts/header.php'; ?>
<div class="container">
    <h1 class="">Welcome to Public-Blog</h1>
    <h3 class="page-header">TOP-5 posts</h3>
    <div class="owl-carousel owl-theme">
        <?php if(count($popularPosts)>0) {
            foreach ($popularPosts as $post) {  ?>
                <div class="row" data-id="<?php echo $post['id']?>" id="post-<?php echo $post['id']?>">
                    <div class="col-xs-1">
                    </div>
                    <div class="col-xs-11">
                        <div class="row">
                            <p><b><?php echo $post['author_name']?> </b> <small> <?php echo date_format(date_create($post['data']), 'g:ia \o\n l jS F Y');?></small></p>
                            <p><?php echo substr($post['text'], 0, 100)?>... </p>
                        </div>
                        <div class="row">
                            <span ><?php echo $post['quantity']?> comments</span>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <a href="/post/current/<?php echo $post['id']?>" class="btn btn-default btn-sm">Read more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
    <br>
    <h3 class="page-header">All posts</h3>


    <?php if(count($posts)>0) {
        foreach ($posts as $post) {  ?>
            <div class="row" data-id="<?php echo $post['id']?>" id="post-<?php echo $post['id']?>">
                <div class="col-md-1">
                    <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <div class="row">
                            <p><b><?php echo $post['author_name']?> </b> <small> <?php echo date_format(date_create($post['data']), 'g:ia \o\n l jS F Y');?></small></p>
                            <p><?php echo substr($post['text'], 0, 100)?>... </p>
                        </div>
                        <div class="row">
                            <span ><?php echo $post['quantity']?> comments</span>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <a href="/post/current/<?php echo $post['id']?>" class="btn btn-default btn-sm">Read more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
       <?php }
    } ?>

    <form class="form-horizontal" method="post" action="http://public-blog/post/create">

        <div class="form-group">
            <label for="inputName" class="col-sm-1 control-label">Name</label>
            <div class="col-sm-2">
                <input type="text" name="userName" class="form-control" id="inputNAme" placeholder="Name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputMsg" class="col-sm-1 control-label">Message</label>
            <div class="col-sm-4">
                <textarea name="msg" id="inputMsg" rows="4"  class="form-control" required></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-2">
                <button class="btn btn-lg btn-success btn-block" type="submit">Send Message</button>
            </div>
        </div>
    </form>
</div>

<?php include 'app/views/layouts/footer.php'; ?>