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

use phpQuery;

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
    private static $_parseConfig = [
        'account'   => [
            'container' => '.news-box>ul',
            'item'      => 'li',
            'field'     => [
                [
                    'setter'  => 'setName',
                    'desc'    => '名字',
                    'extra'   => '',
                    'default' => '' 
                ]
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
    public static function getParseConfig()
    {
        return self::$_parseConfig;
    }

    /**
     * 解析公众号列表
     *
     * @param string $content 内容
     * 
     * @return Config List
     */
    public static function parseAccounts($content)
    {
        $reuslt = [];
        $config = self::getParseConfig()['account'];
        $doc = phpQuery::newDocumentHTML($content, $charset = "utf-8");

        $container = pq($config['container']);
        foreach (pq('li', $container) as $li) {
            $infoSturct = pq($li);
            $account = new Account();
            foreach ($config['field'] as $item) {
                //提取数据
                $setter = $item['setter'];
                $value = pq($item['extra'], $infoSturct)->text();

                //没有获取到数据,设置默认值
                if (empty($value) && isset($item['default'])) {
                    $value = $item['default'];
                }

                // 保存值
                $account->$setter($value);
            }
            $list[] = $account;
        }
        // $items = pq("div.news-box >ul >li")->html();
        var_dump($list);

    }
}