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
 * @date     2018-05-13 21:58:17
 * @modifyby ctwj
 */


namespace Ctwj\WechatSearch;

/**
 * Config Class for Wechat Search
 *
 * @category PHP
 * @package  WechatSearch
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 */
class Config
{
    /**
     * 缓存路径
     *
     * @var string
     */
    private $_cachePath;
    /**
     * 缓存时间,默认10分钟,设置为0表示不缓存
     *
     * @var integer
     */
    private $_cacheTime;
    /**
     * 开启代理
     *
     * @var boolean
     */
    private $_proxyEnable;
    /**
     * 代理
     *
     * @var Array
     */
    private $_proxyObject;

    /**
     * Useragent List
     *
     * @var Array
     */
    private $_useragent;

    /**
     * 构造函数
     *
     * @param Array $params 参数
     */
    public function __construct($params)
    {
        $default_config = [
            'cachePath'   => dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR,
            'cacheTime'   => 10,
            'proxyEnable' => false,
            'proxyObject' => [],
            'useragent'   => [
                "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/22.0.1207.1 Safari/537.1",
                "Mozilla/5.0 (X11; CrOS i686 2268.111.0) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11",
                "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1092.0 Safari/536.6",
                "Mozilla/5.0 (Windows NT 6.2) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1090.0 Safari/536.6",
                "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/19.77.34.5 Safari/537.1",
                "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.9 Safari/536.5",
                "Mozilla/5.0 (Windows NT 6.0) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.36 Safari/536.5",
                "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1063.0 Safari/536.3",
                "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1063.0 Safari/536.3",
                "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_0) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1063.0 Safari/536.3",
                "Mozilla/5.0 (Windows NT 6.2) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1062.0 Safari/536.3",
                "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1062.0 Safari/536.3",
                "Mozilla/5.0 (Windows NT 6.2) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1061.1 Safari/536.3",
                "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1061.1 Safari/536.3",
                "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1061.1 Safari/536.3",
                "Mozilla/5.0 (Windows NT 6.2) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1061.0 Safari/536.3",
                "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.24 (KHTML, like Gecko) Chrome/19.0.1055.1 Safari/535.24",
                "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/535.24 (KHTML, like Gecko) Chrome/19.0.1055.1 Safari/535.24"
            ]
        ];
        $config = is_array($params) ? array_merge($default_config, $params) : $default_config;
        $this->setCachePath($config['cachePath']);
        $this->setCacheTime($config['cacheTime']);
        $this->setProxyEnable($config['proxyEnable']);
        $this->setProxyObject($config['proxyObject']);
        $this->setUseragent($config['useragent']);
    }

    /**
     * 检查缓存设置
     *
     * @return void
     */
    public function cacheCheck()
    {
        if ($this->getCacheTime()>0) {
            if (!is_dir($this->getCachePath())) {
                throw new \Exception('WechatSearch cache dir is invalid!');
            }
            $file_hd = @fopen($this->getCachePath().'/test.txt', 'w');
            if (!$file_hd) {
                @fclose($file_hd);
                @unlink($dir_path.'/test.txt');
                throw new \Exception('WechatSearch cache dir is unwriteable!');
            }
        }
        return true;
    }

    /**
     * Get 缓存路径
     *
     * @return string
     */
    public function getCachePath()
    {
        return $this->_cachePath;
    }

    /**
     * Set 缓存路径
     *
     * @param string $_cachePath 缓存路径
     *
     * @return self
     */
    public function setCachePath(string $_cachePath)
    {
        $this->_cachePath = $_cachePath;

        return $this;
    }

    /**
     * Get 开启代理
     *
     * @return boolean
     */
    public function getProxyEnable()
    {
        return $this->_proxyEnable;
    }

    /**
     * Set 开启代理
     *
     * @param boolean $_proxyEnable 开启代理
     *
     * @return self
     */
    public function setProxyEnable(boolean $_proxyEnable)
    {
        $this->_proxyEnable = $_proxyEnable;

        return $this;
    }

    /**
     * Get 缓存时间,默认10分钟,设置为0表示不缓存
     *
     * @return integer
     */
    public function getCacheTime()
    {
        return $this->_cacheTime;
    }

    /**
     * Set 缓存时间,默认10分钟,设置为0表示不缓存
     *
     * @param integer $_cacheTime 缓存时间,默认10分钟,设置为0表示不缓存
     *
     * @return self
     */
    public function setCacheTime($_cacheTime)
    {
        $this->_cacheTime = $_cacheTime;

        return $this;
    }

    /**
     * Get 代理
     *
     * @return Object
     */
    public function getProxyObject()
    {
        return $this->_proxyObject;
    }

    /**
     * Set 代理
     *
     * @param Object $_proxyObject 代理
     *
     * @return self
     */
    public function setProxyObject(Object $_proxyObject)
    {
        $this->_proxyObject = $_proxyObject;

        return $this;
    }

    /**
     * Get useragent List
     *
     * @return Array
     */ 
    public function getUseragent()
    {
        return $this->_useragent;
    }

    /**
     * Set useragent List
     *
     * @param Array $_useragent Useragent List
     *
     * @return self
     */ 
    public function setUseragent(Array $_useragent)
    {
        $this->_useragent = $_useragent;

        return $this;
    }
}
