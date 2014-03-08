<h1><?= $this->post['title'] ?></h1>
<div>
    <?= $this->post['post'] ?>
</div>

<?php if ($this->user) {?>
<span class="btn-group">
    <a href="/Blog/?edit/<?= $value['id'] ?>" class="btn btn-mini">
        <i class="icon-pencil"></i>edit
    </a>
    <a href="/Blog/?del/<?= $value['id'] ?>" class="btn btn-mini btn-danger" onclick="return confirm('Are you sure?')">
        <i class="icon-trash"></i>remove
    </a>
</span>
<?php }?>

<hr>

<?php if (!empty($this->comments)) { ?>
    <h5>Comments(<?= count($this->comments) ?>):</h5>
<?php } ?>
<div class="comments">
    <?php foreach ($this->comments as $c) { ?>
        <div class="comment">
            <b><?= $c['author'] ?></b>: <?= $c['text'] ?>
            <?php if ($this->user) {?>
            <a href="/Blog/?delComment/<?= $c['id'] ?>/<?= $c['postId'] ?>" class="btn btn-mini btn-danger" class="btn btn-mini btn-danger" onclick="return confirm('Are you sure?')">
                <i class="icon-trash"></i>remove
            </a>
            <?php }?>
        </div>
    <?php } ?>

    <h4>Leave comment:</h4>
    <form action="/Blog/?addComment/<?= $this->post['id'] ?>" class="form-inline well" method="post">
        <label>Name</label>
        <input type="text" name="name" value="<?=@$_COOKIE['name']?>"/>
        <label>Comment</label>
        <input type="text" name="text"/>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
