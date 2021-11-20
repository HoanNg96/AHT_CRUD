<?php

namespace AHT\Blog\Block;

class Edit extends \Magento\Framework\View\Element\Template
{
    private $postRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AHT\Blog\Model\PostRepository $postRepository
    ) {
        parent::__construct($context);
        $this->postRepository = $postRepository;
    }

    public function getBlogInfo()
    {
        return __('AHT Blog module');
    }

    public function getCurrentPost()
    {
        $post_id = $this->getRequest()->getParams('post_id');
        $post = $this->postRepository->getById($post_id);
        return $post;
    }
}
