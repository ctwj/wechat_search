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

require '../vendor/autoload.php';

/**
 * Example for searchAccount
 *
 * @return void
 */
function exampleSearchAccount()
{
    $result = \Ctwj\WechatSearch\WechatSearch::getInstance()->searchAccount('童话');
    return $result;
};

