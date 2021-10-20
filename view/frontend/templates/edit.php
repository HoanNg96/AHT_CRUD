<div class="container">
    <form method='POST' action="/magento2/blog/index/save">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name" value="<?php $post = $block->getPost();
                                                                                                            echo $post->getName(); ?>">
        </div>

        <div class="form-group">
            <label for="phone">Url Key</label>
            <input type="text" class="form-control" id="url" placeholder="Enter a phone" name="url" value="<?php if (isset($post['url_key'])) echo $post->getUrlKey(); ?>">
        </div>
        <div class="form-group">
            <label for="organization">Content</label>
            <input type="text" class="form-control" id="content" placeholder="Enter a organization" name="content" value="<?php if (isset($post['content'])) echo $post->getContent(); ?>">
        </div>
        <div class="form-group">
            <label for="phone">Status</label>
            <input type="text" class="form-control" id="status" placeholder="Enter a phone" name="status" value="<?php if (isset($post['status'])) echo $post->getStatus(); ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="editbtn" value="<?php if (isset($post['post_id'])) echo $post->getId(); ?>">Submit</button>
    </form>
</div>