<form class="form-horizontal" method="post">
    
    <label>Title</label>
    <input type="text" class="input-xxlarge" name="title" value="<?=@$this->post['title']?>"/>
    <label>Text</label>
    <textarea name="post" class="input-xxlarge" style="height: 300px"><?=@$this->post['post']?></textarea>
    <div class="form-actions">
        <button class="btn btn-primary" type="submit">Add</button>
    </div>
</form>
