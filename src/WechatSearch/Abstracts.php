<?php
/**
 * Abstracts 文章摘要
 *
 * PHP Version 7
 *
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 * @date     2018-05-15 22:40:28
 * @modifyby ctwj
 */

 namespace Ctwj\WechatSearch;

/**
 * Abstract
 * 
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 */
class Abstracts
{
    /**
     * 标题
     *
     * @var string
     */
    public $title;
    /**
     * 描述
     *
     * @var string
     */
    public $description;
    /**
     * 封面
     *
     * @var string
     */
    public $cover;
    /**
     * 文章链接
     *
     * @var string
     */
    public $articleLink;
    /**
     * 发布时间
     *
     * @var string
     */
    public $publishTime;
    /**
     * 帐号名字
     *
     * @var string
     */
    public $account;
    /**
     * 帐号链接
     *
     * @var string
     */
    public $accountLink;


    /**
     * Get 标题
     *
     * @return string
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set 标题
     *
     * @param string $title 标题
     *
     * @return self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get 描述
     *
     * @return string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set 描述
     *
     * @param string $description 描述
     *
     * @return self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get 封面
     *
     * @return string
     */ 
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set 封面
     *
     * @param string $cover 封面
     *
     * @return self
     */ 
    public function setCover(string $cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get 文章链接
     *
     * @return string
     */ 
    public function getArticleLink()
    {
        return $this->articleLink;
    }

    /**
     * Set 文章链接
     *
     * @param string $articleLink 文章链接
     *
     * @return self
     */ 
    public function setArticleLink(string $articleLink)
    {
        $this->articleLink = $articleLink;

        return $this;
    }

    /**
     * Get 发布时间
     *
     * @return string
     */ 
    public function getPublishTime()
    {
        return $this->publishTime;
    }

    /**
     * Set 发布时间
     *
     * @param string $publishTime 发布时间
     *
     * @return self
     */ 
    public function setPublishTime(string $publishTime)
    {
        $this->publishTime = $publishTime;

        return $this;
    }

    /**
     * Get 帐号名字
     *
     * @return string
     */ 
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set 帐号名字
     *
     * @param string $account 帐号名字
     *
     * @return self
     */ 
    public function setAccount(string $account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get 帐号链接
     *
     * @return string
     */ 
    public function getAccountLink()
    {
        return $this->accountLink;
    }

    /**
     * Set 帐号链接
     *
     * @param string $accountLink 帐号链接
     *
     * @return self
     */ 
    public function setAccountLink(string $accountLink)
    {
        $this->accountLink = $accountLink;

        return $this;
    }
}