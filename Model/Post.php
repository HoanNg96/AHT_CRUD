<?php

namespace AHT\Blog\Model;

use AHT\Blog\Api\Data\PostInterface;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, PostInterface
{
	const CACHE_TAG = 'aht_blog_post';

	protected $_cacheTag = 'aht_blog_post';

	protected $_eventPrefix = 'aht_blog_post';

	protected function _construct()
	{
		$this->_init('AHT\Blog\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

	public function getName()
	{
		return $this->getData('name');
	}

	public function getUrlKey()
	{
		return $this->getData('url_key');
	}

	public function getImage()
	{
		return $this->getData('image');
	}

	public function getContent()
	{
		return $this->getData('content');
	}

	public function getStatus()
	{
		return $this->getData('status');
	}

	public function getCreatedAt()
	{
		return $this->getData('created_at');
	}

	public function getUpdatedAt()
	{
		return $this->getData('updated_at');
	}
}
