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
        // $key = 'searchAccounts.'.$keyword;
        // if ($this->_cacheValid($key)) {
        //     return json_decode($this->getCache($key), true);
        // }
        if (!$this->_cacheValid('test')) {
            $content = $this->_getContent($this->_makeUrl('searchAccounts', ['keyword'=>$keyword]));
        } else {
            $content = $this->_getCache('test');
        }
        var_dump($content);
        die();
        $result = DataParse::parseAccounts($content);
        $this->_setCache($key, json_encode($request, JSON_UNESCAPED_UNICODE));
        return $result;
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
            'searchAccounts' =>[
                'url'=>'http://weixin.sogou.com/weixin?type=1&query=KEYWORD&ie=utf8',
                'replace'=>['keyword'=>'KEYWORD']
            ]

        ];
        if (!key_exists($type, $url_config)) {
            throw new \Exception('Invalid operate!' . $type);
        }
        $config = $url_config[$type];
        $url = $config['url'];
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