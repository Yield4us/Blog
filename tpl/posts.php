
All posts:

<?php foreach ($this->posts as $key => $value) {?>

<h1><a href="/Blog/?post/<?=$value['id']?>"><?=$value['title']?></a></h1>
<div><?=nl2br($value['post'])?></div>
<?php if ($this->user) {?>
<span class="btn-group">
    <a href="/Blog/?edit/<?=$value['id']?>" class="btn btn-mini">
        <i class="icon-pencil"></i>edit
    </a>
    <a href="/Blog/?del/<?=$value['id']?>" class="btn btn-mini btn-danger" onclick="return confirm('Are you sure?')">
        <i class="icon-trash"></i>remove
    </a>
</span>
<?php }?>
<?php }?>

