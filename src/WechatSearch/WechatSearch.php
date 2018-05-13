<?php
/**
 * WechatSearch
 *
 * PHP Version 7
 *
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 * @date     2018-05-13 23:24:17
 * @modifyby ctwj
 */

namespace Ctwj\WechatSearch;

/**
 * WechatSearch class
 * 
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 */
class WechatSearch
{
    /**
     * 实例
     *
     * @var WechatSearch
     */
    private static $_instance;
    /**
     * 配置
     *
     * @var Config
     */
    private static $_config;
    /**
     * 获取实例
     * 
     * @param Array|null $config Parames
     *
     * @return void
     */
    public static function getInstance(Array $config=null)
    {
        if (is_null(self::$_instance)) {
            $config = new Config($config);
            self::$_instance = new WechatSearch($config);
        }
        return self::$_instance;
    }

    /**
     * 初始化
     *
     * @param Config $config 配置类
     */
    public function __construct(Config $config)
    {
        $this->setConfig($config);
    }

    /**
     * 配置参数
     *
     * @param Config $config 配置类
     * 
     * @return this
     */
    public function setConfig(Config $config)
    {
        self::$_config = $config;
        return $this;
    }

    /**
     * 搜索公众号
     *
     * @param string $keyword 关键字
     * 
     * @return Array 公众号列表
     */
    public function searchAccounts($keyword)
    {
        return [];
    }

}