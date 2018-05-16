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

// $out = exampleSearchAccount();
$out = exampleSearchArticles();
// $out = new Abstracts();
var_dump($out);

