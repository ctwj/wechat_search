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

use Requests;
use Ctwj\WechatSearch\Abstracts;

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
     * @param mix $param 关键字 或 请求参数 或参数数组
     * 
     * @return Array 公众号列表
     */
    public function searchAccounts($param)
    {
        // 默认第一页, 如果是传递的请求链接,则从链接中取页数
        $page = 1;
        if (is_array($param)) {
            if (!isset($param['keyword'])) {
                throw new \Exception('Invalid Param, need [keyword]');
            }
            $page = $param['page'] ?? 1;
            $keyword = $param['keyword'];
            $request_param = ['keyword'=>$keyword, 'page'=>$page];
        } else {
            if ($param[0] == '?') {
                $url = urldecode($param);
                $request_param = ['queryString' => $url];
                if (preg_match('/(\?|&)page=(\d+)($|&)/', $url, $matches)) {
                    $page = $matches[2];
                }
                if (preg_match('/(\?|&)query=(.*?)($|&)/', $url, $matches)) {
                    $keyword = trim($matches[2]);
    
                }
            } else {
                $request_param = ['keyword'=>$param,'page'=>1];
            }
        }
        
        
        $key = 'searchAccounts.'.$keyword.'.'.$page;

        if ($this->_cacheValid($key)) {
            return json_decode($this->_getCache($key), true);
        }
        $content = $this->_getContent($this->_makeUrl('searchAccounts', $request_param));
        $result = DataParse::parseAccounts($content);
        $this->_setCache($key, json_encode($result, JSON_UNESCAPED_UNICODE));
        return $result;
    }

    /**
     * 搜索文章
     *
     * @param mix $param 关键字 或 请求参数 或参数数组
     * 
     * @return Array 公众号列表
     */
    public function searchAritcles($param)
    {
        // 默认第一页, 如果是传递的请求链接,则从链接中取页数
        $page = 1;
        if (is_array($param)) {
            if (!isset($param['keyword'])) {
                throw new \Exception('Invalid Param, need [keyword]');
            }
            $page = $param['page'] ?? 1;
            $keyword = $param['keyword'];
            $request_param = ['keyword'=>$keyword, 'page'=>$page];
        } else {
            if ($param[0] == '?') {
                $url = urldecode($param);
                $request_param = ['queryString' => $url];
                if (preg_match('/(\?|&)page=(\d+)($|&)/', $url, $matches)) {
                    $page = $matches[2];
                }
                if (preg_match('/(\?|&)query=(.*?)($|&)/', $url, $matches)) {
                    $keyword = trim($matches[2]);
    
                }
            } else {
                $request_param = ['keyword'=>$param,'page'=>1];
            }
        }
        
        $key = 'searchArticles.'.$keyword.'.'.$page;
       

        if ($this->_cacheValid($key)) {
            return json_decode($this->_getCache($key), true);
        }
        $content = $this->_getContent($this->_makeUrl('searchArticles', $request_param));
        $result = DataParse::parseAbstricts($content);
        $this->_setCache($key, json_encode($result, JSON_UNESCAPED_UNICODE));
        return $result;
    }

    /**
     * 获取文章接口
     *
     * @param string $url 链接
     * 
     * @return void
     */
    public function getArticle($url)
    {
        $content = $this->_getContent($url);
        $result = DataParse::parseArticle($content);
        return $result;
    }

    /**
     * 获取热门文章
     *
     * @param string $type 类别
     * @param string $page 页码
     * 
     * @return void
     */
    public function getHots($type, $page=1)
    {
        $config = self::$_config;
        $type_config = $config->getType();
        if (!\in_array($type, $type_config['types'])) {
            throw new \Exception('invalid type in getHots!');
        }
        if ($page<1 || $page >10) {
            throw new \Exception('invalid page in getHots!');
        }
        $pages = $type_config['pages'][$type];
        $current_page = $page;

        $key = 'getHots.'.$type.'.'.$page;
        if ($this->_cacheValid($key)) {
            // return json_decode($this->_getCache($key), true);
            $content = $this->_getCache($key);
            
        } else {
            $content = $this->_getContent($pages[$page]);
            $this->_setCache($key, $content);
        }
        $list = DataParse::parseHots($content);
        return [
            'current_page'  => $current_page,
            'pages'         => $pages,
            'data'          => $list
        ];
    }


    /**
     * 获取请求链接
     * 因为所以请求都是Get请求
     *
     * @param string $type  类型
     * @param array  $param 参数
     * 
     * @return void
     */
    private function _makeUrl(string $type, $param=null)
    {
        $url_config = [
            'searchAccounts' => [
                'base' => 'http://weixin.sogou.com/weixin',
                'url' => '?type=1&query=KEYWORD&ie=utf8',
                'replace'=>['keyword'=>'KEYWORD']
            ],
            'searchArticles' => [
                'base' => 'http://wx.sogou.com/weixin',
                'url' => '?type=2&s_from=input&query=KEYWORD&ie=utf8&_sug_=n&_sug_type_=',
                'replace' => ['keyword'=>'KEYWORD']
            ]

        ];
        if (!key_exists($type, $url_config)) {
            throw new \Exception('Invalid operate!' . $type);
        }
        $config = $url_config[$type];
        //链接
        if (isset($param['queryString'])) {
            return $config['base'] . $param['queryString'];
        }
        //关键字
        $url = $config['base'].$config['url'];
        if (isset($config['replace']) && is_array($config['replace'])) {
            foreach ($config['replace'] as $key=>$value) {
                if (isset($param[$key])) {
                    $url = str_replace($value, $param[$key], $url);
                } else {
                    throw new \Exception('Invalid Param ['.$key.'] in _makeUrl');
                }
            }
        }
        return $url;
    }

    /**
     * 获取接口返回的内容
     *
     * @param string $url 请求地址
     * 
     * @return Array
     */
    private function _getContent($url)
    {
        $request = Requests::get($url, array('Accept' => 'application/json'));
        if ($request->status_code != 200) {
            throw new \Exception('requests url ['.$url.'] fail!');
        }
        return $request->body;
    }

    /**
     * 判断缓存是否存在
     *
     * @param string $key key
     * 
     * @return void
     */
    private function _cacheValid($key)
    {
        return file_exists($this->_getCacheFile($key));
    }

    /**
     * 获取缓存
     * 如果文件存在超过缓存时间,则缓存失效
     *
     * @param string $key key
     * 
     * @return void
     */
    private function _getCache($key)
    {
        return file_get_contents($this->_getCacheFile($key));
    }

    /**
     * 设置缓存
     *
     * @param string $key   键值
     * @param string $value 内容
     * 
     * @return void
     */
    private function _setCache($key, $value)
    {
        file_put_contents($this->_getCacheFile($key), $value);
    }

    /**
     * 获取缓存文件
     *
     * @param string $key key
     * 
     * @return void
     */
    private function _getCacheFile($key)
    {
        return self::$_config->getCachePath() . $key;
    }

}