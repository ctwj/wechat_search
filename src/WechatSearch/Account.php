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
    public $name;
    /**
     * 微信号
     *
     * @var string
     */
    public $wechatName;
    /**
     * 公众号临时链接
     *
     * @var string
     */
    public $accountTempLink;
    /**
     * Logo
     *
     * @var string
     */
    public $logo;
    /**
     * 描述
     *
     * @var string
     */
    public $description;
    /**
     * 最近的文章
     *
     * @var string
     */
    public $recentArticle;
    /**
     * 最近的文章临时链接
     *
     * @var string
     */
    public $rencentArticleLink;
    /**
     * 公司
     *
     * @var string
     */
    public $company;
    /**
     * 本月发文数
     *
     * @var [type]
     */
    public $articleNumber;

    /**
     * Get 名字
     *
     * @return string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set 名字
     *
     * @param string $name 名字
     *
     * @return self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

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

    /**
     * Get logo
     *
     * @return string
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set logo
     *
     * @param string $logo Logo
     *
     * @return self
     */ 
    public function setLogo(string $logo)
    {
        $this->logo = $logo;

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
     * Get 最近的文章
     *
     * @return string
     */ 
    public function getRecentArticle()
    {
        return $this->recentArticle;
    }

    /**
     * Set 最近的文章
     *
     * @param string $recentArticle 最近的文章
     *
     * @return self
     */ 
    public function setRecentArticle(string $recentArticle)
    {
        $this->recentArticle = $recentArticle;

        return $this;
    }

    /**
     * Get 公司
     *
     * @return string
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set 公司
     *
     * @param string $company 公司
     *
     * @return self
     */ 
    public function setCompany(string $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get 本月发文数
     *
     * @return [type]
     */ 
    public function getArticleNumber()
    {
        return $this->articleNumber;
    }

    /**
     * Set 本月发文数
     *
     * @param [type] $articleNumber 本月发文数
     *
     * @return self
     */ 
    public function setArticleNumber($articleNumber)
    {
        $this->articleNumber = $articleNumber;

        return $this;
    }

    /**
     * Get 公众号临时链接
     *
     * @return string
     */ 
    public function getAccountTempLink()
    {
        return $this->accountTempLink;
    }

    /**
     * Set 公众号临时链接
     *
     * @param string $accountTempLink 公众号临时链接
     *
     * @return self
     */ 
    public function setAccountTempLink(string $accountTempLink)
    {
        $this->accountTempLink = $accountTempLink;

        return $this;
    }

    /**
     * Get 最近的文章临时链接
     *
     * @return string
     */ 
    public function getRencentArticleLink()
    {
        return $this->rencentArticleLink;
    }

    /**
     * Set 最近的文章临时链接
     *
     * @param string $rencentArticleLink 最近的文章临时链接
     *
     * @return self
     */ 
    public function setRencentArticleLink(string $rencentArticleLink)
    {
        $this->rencentArticleLink = $rencentArticleLink;

        return $this;
    }

    /**
     * 字符串转换
     *
     * @return string
     */
    public function __toString()
    {
        $data = [
            'name'  => $this->getName(),
            'wechatName' => $this->getWechatName(),
            'logo'  => $this->getLogo(),
            'accountTempLink' => $this->getAccountTempLink(),
            'company'   => $this->getCompany(),
            'description' => $this->getDescription(),
            'rencentArticle' => $this->getRencentArticle(),
            'rencentArticleLink' => $this->getRencentArticleLink(),
        ];
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}