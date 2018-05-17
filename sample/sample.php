<?php
/**
 * Sample
 *
 * PHP Version 7
 *
 * @category PHP
 * @package  Sample
 * @author   ctwj <908504609@qq.com>
 * @license  MIT https://github.com/ctwj/wechat_search/blob/master/LICENSE
 * @link     https://github.com/ctwj/wechat_search/
 * @date     2018-05-13 23:19:03
 * @modifyby ctwj
 */

require '../vendor/autoload.php';

use Ctwj\WechatSearch\WechatSearch;
use Ctwj\WechatSearch\Abstracts;
// use phpQuery;
use \ForceUTF8\Encoding;



/**
 * Example for searchAccount
 *
 * @return void
 */
function exampleSearchAccount()
{
    
    $result = \Ctwj\WechatSearch\WechatSearch::getInstance()->searchAccounts('?query=%E7%AB%A5%E8%AF%9D&type=1&page=8&ie=utf8');
    // $result = \Ctwj\WechatSearch\WechatSearch::getInstance()->searchAccounts('童话');
    return $result;
};

/**
 * Example for searchArticles
 *
 * @return void
 */
function exampleSearchArticles()
{
    $result = \Ctwj\WechatSearch\WechatSearch::getInstance()->searchAritcles('?query=%E7%AB%A5%E8%AF%9D&type=2&page=8&ie=utf8');
    return $result;
}

/**
 * Example for getArticle
 *
 * @return void
 */
function exampleGetArticle()
{
    // $result = \Ctwj\WechatSearch\WechatSearch::getInstance()->getArticle('https://mp.weixin.qq.com/s?src=11&timestamp=1526515201&ver=881&signature=QVKAL2DJcEMR*gS0X3inuw7YJzauCM2xZicbWsFn*XSrFWco6wtI1neGx6HlE5S7uuZJnOQO*KV9iW3ZNBmbyFAVXvIiAROOzYY3m3t2ZqzDuhV97kSXr44yZBJxkKIk&new=1');
    $config = new \Ctwj\WechatSearch\Config([]);
    $file = $config->getCachePath() . 'test.html';
    // echo $file;
    if (!file_exists($file)) {
        $url = 'https://mp.weixin.qq.com/s?src=11&timestamp=1526515201&ver=881&signature=QVKAL2DJcEMR*gS0X3inuw7YJzauCM2xZicbWsFn*XSrFWco6wtI1neGx6HlE5S7uuZJnOQO*KV9iW3ZNBmbyFAVXvIiAROOzYY3m3t2ZqzDuhV97kSXr44yZBJxkKIk&new=1';
        $content = file_get_contents($url);
        file_put_contents($file, $content);
    } else {
        $content = file_get_contents($file);
    }

    $result = \Ctwj\WechatSearch\DataParse::parseArticle($content);
    return $result;
    // if (preg_match('/msg_title\s=\s\"(.*?)\";/is', $content, $matches)) {
    //     $title = trim($matches[1]);
    // }
    // if (preg_match('/msg_cdn_url\s=\s\"(.*?)\";/is', $content, $matches)) {
    //     $cover = trim($matches[1]);
    // }
    // if (preg_match('/id=\"js_content\">(.*?)<\/div>/is', $content, $matches)) {
    //     $article = trim($matches[1]);
    // }
    /*
    if (preg_match('/微信号<\/label>.*?>(.*?)<\/span>/is', $content, $matches)) {
        $wechatName = trim($matches[1]);
    }
    if (preg_match('/publish_time\"\s.*?>(.*?)<\/em>/', $content, $matches)) {
        $pulishTime = trim($matches[1]);
    } 
    */

}

/**
 * Example for getHots
 *
 * @return void
 */
function exampleGetHots()
{
    
    $result = \Ctwj\WechatSearch\WechatSearch::getInstance()->getHots('育儿', 1);
    // $result = \Ctwj\WechatSearch\WechatSearch::getInstance()->searchAccounts('童话');
    return $result;
};

// $out = exampleSearchAccount();
// $out = exampleSearchArticles();
// $out = exampleGetArticle();
$out = exampleGetHots();

var_dump($out);

