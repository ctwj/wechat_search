<?php
/**
 * Article 文章
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
 * Article
 * 
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 */
class Article
{
    /**
     * 标题
     *
     * @var string
     */
    public $title;
    /**
     * 发布时间
     *
     * @var string
     */
    public $publishTime;
    /**
     * 内容
     *
     * @var string
     */
    public $content;
    /**
     * 封面图片
     *
     * @var string
     */
    public $cover;
    /**
     * 微信号
     *
     * @var string
     */
    public $wechatName;

    /**
     * Get the value of title
     * 
     * @return string
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     * 
     * @param string $title 标题
     *
     * @return self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of publishTime
     * 
     * @return string
     */ 
    public function getPublishTime()
    {
        return $this->publishTime;
    }

    /**
     * Set the value of publishTime
     * 
     * @param string $publishTime 时间
     *
     * @return self
     */ 
    public function setPublishTime($publishTime)
    {
        $this->publishTime = $publishTime;

        return $this;
    }

    /**
     * Get the value of content
     * 
     * @return void
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param string $content 内容
     * 
     * @return self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get 封面图片
     *
     * @return string
     */ 
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set 封面图片
     *
     * @param string $cover 封面图片
     *
     * @return self
     */ 
    public function setCover(string $cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get 微信号
     *
     * @return string
     */ 
    public function getWechatName()
    {
        return $this->wechatName;
    }

    /**
     * Set 微信号
     *
     * @param string $wechatName 微信号
     *
     * @return self
     */ 
    public function setWechatName(string $wechatName)
    {
        $this->wechatName = $wechatName;

        return $this;
    }
}