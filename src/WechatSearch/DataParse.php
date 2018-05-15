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
            'page'  => [
                'count' => '.mun',
                'count_clean' => ['找到约','条结果',','],
                'current_page' => '#pagebar_container > span',
                'list'=> [
                    'item' => 'a',
                    'link' => 'href',
                    'page' => 'test'
                ]
            ],
            'container' => '.news-box>ul',
            'item'      => 'li',
            'field'     => [
                [
                    'setter'  => 'setName',
                    'desc'    => '名字',
                    'xpath'   => 'a[uigs^=account_name_]',
                    'extra'   => 'text'
                ],
                [
                    'setter' => 'setWechatName',
                    'desc'   => '微信公众号',
                    'xpath'  => 'label[name=em_weixinhao]',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setLogo',
                    'desc'   => 'Logo',
                    'xpath'  => 'a[uigs^=account_image_]>img',
                    'extra'  => 'src'
                ],
                [
                    'setter' => 'setDescription',
                    'desc'   => '描述',
                    'xpath'  => 'dl:eq(0)>dd',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setCompany',
                    'desc'   => '公司名字',
                    'xpath'  => 'dl:eq(1)>dd',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setRecentArticle',
                    'desc'   => '最近文章',
                    'xpath'  => 'a[uigs^=account_article_]',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setAccountTempLink',
                    'desc'   => '公众号临时链接',
                    'xpath'  => 'a[uigs^=account_name_]',
                    'extra'  => 'href'
                ],
                [
                    'setter' => 'setRencentArticleLink',
                    'desc'   => '最近文章临时链接',
                    'xpath'  => 'a[uigs^=account_article_]',
                    'extra'  => 'href'
                ]
            ]
        ],
        'article'   => [

        ]
    ];
    
    /**
     * Get the value of _parseConfig
     * 
     * @param string $type 类别
     * 
     * @return Array
     */ 
    public static function getParseConfig($type=null)
    {
        if (isset(self::$_parseConfig[$type])) {
            return self::$_parseConfig[$type];
        }
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
        $result = self::_parse(self::getParseConfig('account'), $content);
        return $result;
    }

    /**
     * 内容解析
     *
     * @param [type] $config  配置
     * @param [type] $content 内容
     * 
     * @return void
     */
    private static function _parse($config, $content)
    {
        $doc = phpQuery::newDocumentHTML($content, $charset = "utf-8");

        // 当前page
        $current_page = pq($config['page']['current_page'])->text();
        // 搜索结果
        $num_str = pq($config['page']['count'])->text();
        if (isset($config['page']['count_clean']) && is_array($config['page']['count_clean'])) {
            foreach ( $config['page']['count_clean'] as $str) {
                $num_str = str_replace($str, '', $num_str);
            }
        }
        // page list
        $page_list = [];
        $page_config = $config['page']['list'];
        foreach (pq($page_config['item']) as $item) {
            $page = $page_config['page'] == 'src' ?  pq($item)->attr('src') :  pq($item)->text();
            $page = intval($page);
            if (\is_numeric($page) && $page>0) {
                $page_list[] = [
                    'link'  => $page_config['link'] == 'href' ? pq($item)->attr('href') :  pq($item)->text(),
                    'page'  => $page
                ];
            }
        }

        $container = pq($config['container']);
        foreach (pq('li', $container) as $li) {
            $infoSturct = pq($li);
            $account = new Account();
            foreach ($config['field'] as $item) {
                //提取数据
                $setter = $item['setter'];
                $pq = pq($item['xpath'], $infoSturct);
                if ($item['extra'] == 'text') {
                    $value = $pq->text();
                } else {
                    $value = $pq->attr($item['extra']);
                }

                //没有获取到数据,设置默认值
                if (empty($value) && isset($item['default'])) {
                    $value = $item['default'];
                }

                // 保存值
                $account->$setter($value);
            }
            $list[] = $account;
        }
        
        return  [
            'currnet_page' => $current_page,
            'count'        => $num_str,
            'page_list'    => $page_list,     
            'list' =>$list
        ];
    }
}