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

	public function setName($name)
	{
		return $this->setData('name', $name);
	}

	public function setUrlKey($url)
	{
		return $this->setData('url_key', $url);
	}

	public function setImage($src)
	{
		return $this->setData('image', $src);
	}

	/**
	 * @return string|null
	 */
	public function setContent($content)
	{
		return $this->setData('content', $content);
	}

	/**
	 * @return int|null
	 */
	public function setStatus($status)
	{
		return $this->setData('status', $status);
	}

	/**
	 * @return string|null
	 */
	public function setCreatedAt($time)
	{
		return $this->setData('created_at', $time);
	}

	/**
	 * @return string|null
	 */
	public function setUpdatedAt($time)
	{
		return $this->setData('updated_at', $time);
	}
}
