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

use Ctwj\WechatSearch\WechatSerch;
use Ctwj\WechatSearch\Abstracts;

require '../vendor/autoload.php';

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
    $result = \Ctwj\WechatSearch\WechatSearch::getInstance()->getArticle('https://mp.weixin.qq.com/s?src=11&timestamp=1526475601&ver=880&signature=VoAelDoH-qzaHc2nm-FR5GSX8X8G0sFPTozHV-D2x*GeQyeqVML2BtMWO*jgpC9WRNODrn1*3RGw0EedFtPzodUXIIcj7JyZOjUy2Wy8PnKOOLwPG06uNdkxWkXl7gpt&new=1');
    return $result;
}

// $out = exampleSearchAccount();
// $out = exampleSearchArticles();
$out = exampleGetArticle();

var_dump($out);

