<?php

namespace AHT\Blog\Api;

interface PostRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \AHT\Blog\Api\Data\PostInterface $Post
     * @return \AHT\Blog\Api\Data\PostInterface
     */
    public function save(\AHT\Blog\Api\Data\PostInterface $Post);

    /**
     * Retrieve Post by id.
     *
     * @param int $PostId
     * @return \AHT\Blog\Api\Data\PostInterface
     */
    public function getById($PostId);

    /**
     * Retrieve Posts.
     *
     * @return \AHT\Blog\Api\Data\PostInterface
     */
    public function getList();

    /**
     * Delete Post.
     *
     * @param \AHT\Blog\Api\Data\PostInterface $Post
     * @return bool
     */
    public function delete(\AHT\Blog\Api\Data\PostInterface $Post);

    /**
     * Delete Post by ID.
     *
     * @param int $PostId
     * @return bool
     */
    public function deleteById($PostId);
}
