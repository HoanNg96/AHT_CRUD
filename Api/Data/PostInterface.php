<?php

namespace AHT\Blog\Api\Data;

interface PostInterface
{

	/**
	 * @return string|null
	 */
    public function getName();

	/**
	 * @return string|null
	 */
	public function getUrlKey();

	/**
	 * @return string|null
	 */
	public function getImage();

	/**
	 * @return string|null
	 */
	public function getContent();

	/**
	 * @return int|null
	 */
	public function getStatus();

	/**
	 * @return string|null
	 */
	public function getCreatedAt();

	/**
	 * @return string|null
	 */
	public function getUpdatedAt();

	/**
	 * @return string|null
	 */
    public function setName($name);

	/**
	 * @return string|null
	 */
	public function setUrlKey($url);

	/**
	 * @return string|null
	 */
	public function setImage($src);

	/**
	 * @return string|null
	 */
	public function setContent($content);

	/**
	 * @return int|null
	 */
	public function setStatus($status);

	/**
	 * @return string|null
	 */
	public function setCreatedAt($time);

	/**
	 * @return string|null
	 */
	public function setUpdatedAt($time);
}
