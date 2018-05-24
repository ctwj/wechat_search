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
use \ForceUTF8\Encoding;

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
            'class' => 'Account',
            'page'  => [
                'count' => '.mun',
                'count_clean' => ['找到约','条结果',','],
                'current_page' => '#pagebar_container > span',
                'list'=> [
                    'item' => '#pagebar_container > a',
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
                    'extra'  => 'text',
                    'not'    => 'dl:eq(1)>dd>a[uigs^=account_article_]'
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
        'list' => [
            'class' => 'Abstracts',
            'page'  => [
                'count' => '.mun',
                'count_clean' => ['找到约','条结果',','],
                'current_page' => '#pagebar_container > span',
                'list'=> [
                    'item' => '#pagebar_container > a',
                    'link' => 'href',
                    'page' => 'test'
                ]
            ],
            'container' => '.news-box>ul',
            'item'      => 'li',
            'field'     => [
                [
                    'setter'  => 'setTitle',
                    'desc'    => '标题',
                    'xpath'   => 'div.txt-box >h3 >a',
                    'extra'   => 'text'
                ],
                [
                    'setter' => 'setDescription',
                    'desc'   => '描述',
                    'xpath'  => 'p.txt-info',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setCover',
                    'desc'   => '图片',
                    'xpath'  => 'div.img-box > a > img',
                    'extra'  => 'src'
                ],
                [
                    'setter' => 'setArticleLink',
                    'desc'   => '文章链接',
                    'xpath'  => 'div.img-box > a',
                    'extra'  => 'href'
                ],
                [
                    'setter' => 'setPublishTime',
                    'desc'   => '发布时间',
                    'xpath'  => 'div.s-p',
                    'extra'  => 't'
                ],
                [
                    'setter' => 'setAccount',
                    'desc'   => '帐号',
                    'xpath'  => 'div.s-p > a',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setAccountLink',
                    'desc'   => '公众号临时链接',
                    'xpath'  => 'div.s-p > a',
                    'extra'  => 'href'
                ]
            ]
        ],
        'article'   => [
            'class' => 'Article',
            'field'     => [
                [
                    'setter'  => 'setTitle',
                    'desc'    => '标题',
                    'xpath'   => 'h2.rich_media_title',
                    'extra'   => 'text'
                ],
                [
                    'setter' => 'setContent',
                    'desc'   => '内容',
                    'xpath'  => 'div.rich_media_content',
                    'extra'  => 'html'
                ],
                [
                    'setter' => 'setPublishTime',
                    'desc'   => '发布时间',
                    'xpath'  => 'publish_time',
                    'extra'  => 'src'
                ]
            ]
        ],
        'account_article' => [
            'container' => 'div.weui_msg_card_list',
            'item'  => 'div.weui_msg_card',
            'field'     => [
                [
                    'setter'  => 'setTitle',
                    'desc'    => '标题',
                    'xpath'   => 'div.txt-box >h3 >a',
                    'extra'   => 'text'
                ],
                [
                    'setter' => 'setDescription',
                    'desc'   => '描述',
                    'xpath'  => 'p.txt-info',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setCover',
                    'desc'   => '图片',
                    'xpath'  => 'div.img-box > a > img',
                    'extra'  => 'src'
                ],
                [
                    'setter' => 'setArticleLink',
                    'desc'   => '文章链接',
                    'xpath'  => 'div.img-box > a',
                    'extra'  => 'href'
                ],
                [
                    'setter' => 'setPublishTime',
                    'desc'   => '发布时间',
                    'xpath'  => 'div.s-p',
                    'extra'  => 't'
                ],
                [
                    'setter' => 'setAccount',
                    'desc'   => '帐号',
                    'xpath'  => 'div.s-p > a',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setAccountLink',
                    'desc'   => '公众号临时链接',
                    'xpath'  => 'div.s-p > a',
                    'extra'  => 'href'
                ]
            ]
        ],
        'hots' => [
            'class' => 'Abstracts',
            'container' => '.news-list',
            'item'      => 'li',
            'field'     => [
                [
                    'setter'  => 'setTitle',
                    'desc'    => '标题',
                    'xpath'   => 'div.txt-box >h3 >a',
                    'extra'   => 'text'
                ],
                [
                    'setter' => 'setDescription',
                    'desc'   => '描述',
                    'xpath'  => 'p.txt-info',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setCover',
                    'desc'   => '图片',
                    'xpath'  => 'div.img-box > a > img',
                    'extra'  => 'src'
                ],
                [
                    'setter' => 'setArticleLink',
                    'desc'   => '文章链接',
                    'xpath'  => 'div.img-box > a',
                    'extra'  => 'href'
                ],
                [
                    'setter' => 'setPublishTime',
                    'desc'   => '发布时间',
                    'xpath'  => 'div.s-p',
                    'extra'  => 't'
                ],
                [
                    'setter' => 'setAccount',
                    'desc'   => '帐号',
                    'xpath'  => 'div.s-p > a',
                    'extra'  => 'text'
                ],
                [
                    'setter' => 'setAccountLink',
                    'desc'   => '公众号临时链接',
                    'xpath'  => 'div.s-p > a',
                    'extra'  => 'href'
                ]
            ]
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
     * 解析公众号文章列表
     *
     * @param string $content 内容
     * 
     * @return Config List
     */
    public static function parseAccountArticles($content)
    {
        // wechatName
        $wechatName = '';
        if (\preg_match('/title>(.*?)</is', $content, $matches)) {
            $wechatName = trim($matches[1]);
        }
        // name
        $name = '';
        if (\preg_match('/profile_account">微信号:(.*?)</i', $content, $matches)) {
            $name = trim($matches[1]);
        }
        
        if (\preg_match('/msgList\s=\s(.*?)(\n|$)/is', $content, $matches)) {
            $info = $matches[1];
            $info =  trim($info, '; ');
            $array = \json_decode($info, true);
        } else {
            throw new \Exception('May be you need open url and input the valid code:' . $url);
        }

        $articles = [];
        foreach ($array['list'] as $infos) {
            $time = $infos['comm_msg_info']['datetime'];
            $data = [
                'author' => $infos['app_msg_ext_info']['author'],
                'content_url' => $infos['app_msg_ext_info']['content_url'],
                'conver'    => $infos['app_msg_ext_info']['cover'],
                'source_url' => $infos['app_msg_ext_info']['source_url'],
                'digest'    => $infos['app_msg_ext_info']['digest'],
                'title' => $infos['app_msg_ext_info']['title'],
                'publishTime' => $time
            ];
            $articles[] = $data;

            foreach ($infos['app_msg_ext_info']['multi_app_msg_item_list'] as $info) {
                $data = [
                    'author' => $info['author'],
                    'content_url' => $info['content_url'],
                    'conver'    => $info['cover'],
                    'source_url' => $info['source_url'],
                    'digest'    => $info['digest'],
                    'title' => $info['title'],
                    'publishTime' => $time
                ];
                $articles[] = $data;
            }
        }
        
        return ['name'=>$name,'wechatName'=>$wechatName,'articles'=>$articles];
    }

    /**
     * 解析文章列表
     *
     * @param string $content 内容
     * 
     * @return Config List
     */
    public static function parseAbstricts($content)
    {
        $result = self::_parse(self::getParseConfig('list'), $content);
        return $result;
    }

    /**
     * 解析文章内容
     *
     * @param string $content 内容
     * 
     * @return Artile
     */
    public static function parseArticle($content)
    {
        // $content = Encoding::toUTF8($content);
        // phpQuery::newDocumentHTML($content, "utf-8");
        // $config = self::getParseConfig('article');
        $article = new Article();
        if (preg_match('/msg_title\s=\s\"(.*?)\";/is', $content, $matches)) {
            $title = trim($matches[1]);
            $article->setTitle($title);
        }
        if (preg_match('/msg_cdn_url\s=\s\"(.*?)\";/is', $content, $matches)) {
            $cover = trim($matches[1]);
            $article->setCover($cover);
        }
        if (preg_match('/id=\"js_content\">(.*?)<\/div>/is', $content, $matches)) {
            $info = trim($matches[1]);
            $article->setContent($info);
        }
        if (preg_match('/微信号<\/label>.*?>(.*?)<\/span>/is', $content, $matches)) {
            $wechatName = trim($matches[1]);
            $article->setWechatName($wechatName);
        }
        if (preg_match('/publish_time\"\s.*?>(.*?)<\/em>/', $content, $matches)) {
            $publishTime = trim($matches[1]);
            $article->setPublishTime($publishTime);
        }
        return $article;
    }

    /**
     * 热门文章
     *
     * @param string $content 内容
     * 
     * @return void
     */
    public static function parseHots($content)
    {
        $result = self::_parse(self::getParseConfig('hots'), $content);
        return $result;
    }

    /**
     * 检测文档编码是否需要转码,
     * 如果phpQuery没有检查出文档编码,默认会将编码设置成ISO-8859-1
     *
     * @param string $content 内容
     * 
     * @return void
     */
    private static function _needConvertEncoding($content) 
    {
        $matches = array();
        // find meta tag
        preg_match(
            '@<meta[^>]+http-equiv\\s*=\\s*(["|\'])Content-Type\\1([^>]+?)>@i',
            $content, $matches
        );
        if (! isset($matches[0])) {
            return true;
        }

        // get attr 'content'
        preg_match('@content\\s*=\\s*(["|\'])(.+?)\\1@', $matches[0], $matches);
        if (! isset($matches[0])) {
            return true;
        }
        
        return false;
    }

    /**
     * 编码转换
     *
     * @param [type] $value 需要编码在内容
     * 
     * @return void
     */
    private static function _convertEncoding($value)
    {
        return \mb_convert_encoding($value, 'ISO-8859-1', 'utf-8');
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
        $result = [];
        phpQuery::$documents = array();
        $doc = phpQuery::newDocumentHTML($content, 'UTF-8');
        $encoding = self::_needConvertEncoding($content);
        // var_dump($encoding);

        // 当前page
        if (isset($config['page'])) {
            $current_page = pq($config['page']['current_page'])->text();
            // 搜索结果
            $num_str = pq($config['page']['count'])->text();
            $num_str = $encoding ? self::_convertEncoding($num_str):$num_str;
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

            $result = [
                'currnet_page' => $current_page,
                'count'        => $num_str,
                'page_list'    => $page_list
            ];
        }

        $container = pq($config['container']);
        foreach (pq('li', $container) as $li) {
            $infoSturct = pq($li);
            $info = InfoFactory::getInstance($config['class']);
            foreach ($config['field'] as $item) {
                //提取数据
                $setter = $item['setter'];

                //排除意外
                if (isset($item['not'])) {
                    $not = pq($item['not'], $infoSturct)->text();
                    if ($not != '') {
                        $info->$setter('');
                        continue;
                    }
                }

                $pq = pq($item['xpath'], $infoSturct);
                if ($item['extra'] == 'text') {
                    $value = trim($pq->text());
                    // $value = \mb_convert_encoding($value, 'ISO-8859-1', 'utf-8');
                } else {
                    $value = trim($pq->attr($item['extra']));
                }

                $value = $encoding ? self::_convertEncoding($value):$value;
                //没有获取到数据,设置默认值
                if (empty($value) && isset($item['default'])) {
                    $value = $item['default'];
                }

                // 保存值
                $info->$setter($value);
            }
            $list[] = $info;
        }
        $result['list'] = $list;
        return  $result;
    }
}

/**
 * InfoFactory
 * 
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 */
class InfoFactory
{
    /**
     * 获取实例化类
     *
     * @param string $class 类名
     * 
     * @return void
     */
    public static function getInstance($class)
    {
        switch ($class)
        {
        case 'Abstracts':
            return new Abstracts();
        case 'Account':
            return new Account();
        default:
            throw new \Exception('Invalid Class Name');
        }

    }
}