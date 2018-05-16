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
    public $title;
    public $publishTime;
    public $content;

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
}