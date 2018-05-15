<?php
/**
 * Description
 *
 * PHP Version 7
 *
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 * @date     2018-05-13 22:56:47
 * @modifyby ctwj
 */


namespace Ctwj\WechatSearch;

/**
 * Account
 * 
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 */
class Account
{
    /**
     * 名字
     *
     * @var string
     */
    private $_name;
    /**
     * 微信号
     *
     * @var string
     */
    private $_wechatName;
    /**
     * 公众号临时链接
     *
     * @var string
     */
    private $_accountTempLink;
    /**
     * Logo
     *
     * @var string
     */
    private $_logo;
    /**
     * 描述
     *
     * @var string
     */
    private $_description;
    /**
     * 最近的文章
     *
     * @var string
     */
    private $_recentArticle;
    /**
     * 最近的文章临时链接
     *
     * @var string
     */
    private $_rencentArticleLink;
    /**
     * 公司
     *
     * @var string
     */
    private $_company;
    /**
     * 本月发文数
     *
     * @var [type]
     */
    private $_articleNumber;

    /**
     * Get 名字
     *
     * @return string
     */ 
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set 名字
     *
     * @param string $_name 名字
     *
     * @return self
     */ 
    public function setName(string $_name)
    {
        $this->_name = $_name;

        return $this;
    }

    /**
     * Get 微信号
     *
     * @return string
     */ 
    public function getWechatName()
    {
        return $this->_wechatName;
    }

    /**
     * Set 微信号
     *
     * @param string $_wechatName 微信号
     *
     * @return self
     */ 
    public function setWechatName(string $_wechatName)
    {
        $this->_wechatName = $_wechatName;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */ 
    public function getLogo()
    {
        return $this->_logo;
    }

    /**
     * Set logo
     *
     * @param string $_logo Logo
     *
     * @return self
     */ 
    public function setLogo(string $_logo)
    {
        $this->_logo = $_logo;

        return $this;
    }

    /**
     * Get 描述
     *
     * @return string
     */ 
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Set 描述
     *
     * @param string $_description 描述
     *
     * @return self
     */ 
    public function setDescription(string $_description)
    {
        $this->_description = $_description;

        return $this;
    }

    /**
     * Get 最近的文章
     *
     * @return string
     */ 
    public function getRecentArticle()
    {
        return $this->_recentArticle;
    }

    /**
     * Set 最近的文章
     *
     * @param string $_recentArticle 最近的文章
     *
     * @return self
     */ 
    public function setRecentArticle(string $_recentArticle)
    {
        $this->_recentArticle = $_recentArticle;

        return $this;
    }

    /**
     * Get 公司
     *
     * @return string
     */ 
    public function getCompany()
    {
        return $this->_company;
    }

    /**
     * Set 公司
     *
     * @param string $_company 公司
     *
     * @return self
     */ 
    public function setCompany(string $_company)
    {
        $this->_company = $_company;

        return $this;
    }

    /**
     * Get 本月发文数
     *
     * @return [type]
     */ 
    public function getArticleNumber()
    {
        return $this->_articleNumber;
    }

    /**
     * Set 本月发文数
     *
     * @param [type] $_articleNumber 本月发文数
     *
     * @return self
     */ 
    public function setArticleNumber($_articleNumber)
    {
        $this->_articleNumber = $_articleNumber;

        return $this;
    }

    /**
     * Get 公众号临时链接
     *
     * @return  string
     */ 
    public function getAccountTempLink()
    {
        return $this->_accountTempLink;
    }

    /**
     * Set 公众号临时链接
     *
     * @param string $_accountTempLink  公众号临时链接
     *
     * @return self
     */ 
    public function setAccountTempLink(string $_accountTempLink)
    {
        $this->_accountTempLink = $_accountTempLink;

        return $this;
    }

    /**
     * Get 最近的文章临时链接
     *
     * @return string
     */ 
    public function getRencentArticleLink()
    {
        return $this->_rencentArticleLink;
    }

    /**
     * Set 最近的文章临时链接
     *
     * @param string $_rencentArticleLink  最近的文章临时链接
     *
     * @return self
     */ 
    public function setRencentArticleLink(string $_rencentArticleLink)
    {
        $this->_rencentArticleLink = $_rencentArticleLink;

        return $this;
    }
}