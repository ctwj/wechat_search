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
    $result = \Ctwj\WechatSearch\WechatSearch::getInstance()->getArticle('https://mp.weixin.qq.com/s?timestamp=1526483434&src=3&ver=1&signature=T2mwySr8Ekhp3WFVNttkqQt0Ug-DyopJkTgLk95AHr1rffwwt5g-8moPIiMWA81XxaZvGE2w284H9dhovDYa9MRId-05tooAUkl9pnc37tNLbW2oFP7Gdpa37tAtNvdSjbeiy5NGdfYT*4EZUp1-ySGyDd384bnSPy1TAfbT10k=');
    return $result;
}

// $out = exampleSearchAccount();
// $out = exampleSearchArticles();
$out = exampleGetArticle();

var_dump($out);

