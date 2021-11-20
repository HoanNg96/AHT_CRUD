<?php

namespace AHT\Blog\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{

    protected $_postFactory;

    protected $_postRepository;

    protected $resultRedirect;

    protected $urlInterface;

    private $_cacheTypeList;

    private $_cacheFrontendPool;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \AHT\Blog\Model\PostFactory $postFactory,
        \AHT\Blog\Model\PostRepository $postRepository,
        \Magento\Framework\Controller\ResultFactory $result,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool
    ) {
        $this->_postFactory = $postFactory;
        $this->_postRepository = $postRepository;
        $this->resultRedirect = $result;    //for redirect url
        $this->_cacheTypeList = $cacheTypeList; //for clear cache
        $this->_cacheFrontendPool = $cacheFrontendPool; //for clear cache

        return parent::__construct($context);
    }

    public function execute()
    {
        //  catch button form submit
        if (isset($_POST['editbtn'])) {
            $post = $this->_postRepository->getById(filter_input(INPUT_POST, 'editbtn'));

            $post->setId(filter_input(INPUT_POST, 'editbtn'));
            $post->setName(filter_input(INPUT_POST, 'name'));
            $post->setUrlKey(filter_input(INPUT_POST, 'url'));
            $post->setContent(filter_input(INPUT_POST, 'content'));
            $post->setStatus(filter_input(INPUT_POST, 'status'));
            $post->setUpdatedAt(date('Y-m-d H:i:s'));
        } elseif (isset($_POST['createbtn'])) {
            $post = $this->_postFactory->create();

            $post->setName(filter_input(INPUT_POST, 'name'));
            $post->setUrlKey(filter_input(INPUT_POST, 'url'));
            $post->setContent(filter_input(INPUT_POST, 'content'));
            $post->setStatus(filter_input(INPUT_POST, 'status'));
            $post->setCreatedAt(date('Y-m-d H:i:s'));
            $post->setUpdatedAt(date('Y-m-d H:i:s'));
        }

        $this->_postRepository->save($post);

        //  clear cache
        $types = [
            'config',
            'layout',
            'block_html',
            'collections',
            'reflection',
            'db_ddl',
            'compiled_config',
            'eav',
            'config_integration',
            'config_integration_api',
            'full_page', 'translate',
            'config_webservice',
            'vertex'
        ];
        foreach ($types as $type) {
            $this->_cacheTypeList->cleanType($type);
        }
        foreach ($this->_cacheFrontendPool as $cacheFrontend) {
            $cacheFrontend->getBackend()->clean();
        }

        //  redirect url
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('blog/index/index');
        return $resultRedirect;
    }
}
