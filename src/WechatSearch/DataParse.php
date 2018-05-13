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
 * @date     2018-05-13 23:48:28
 * @modifyby ctwj
 */

namespace Ctwj\WechatSearch;

/**
 * DataParse
 * 
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 */
class DataParse
{
    /**
     * 解析配置
     *
     * @var array
     */
    private $_parseConfig = [
        'account'   => [
            [
                'setter'  => 'setName',
                'desc'    => '名字',
                'extra'   => '',
                'default' => '' 
            ]
        ],
        'article'   => [

        ]
    ];
    
    /**
     * Get the value of _parseConfig
     * 
     * @return Array
     */ 
    public function getParseConfig()
    {
        return $this->_parseConfig;
    }

    /**
     * 解析公众号列表
     *
     * @param string $content 内容
     * 
     * @return Config List
     */
    public function parseAccounts($content)
    {

    }
}