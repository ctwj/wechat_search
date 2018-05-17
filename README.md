# wechat_search
api for wechat subscribe account and articles by sogou search

## install

```
composer require ctwj\wechat_search_api
```


## example

- searchAccounts 搜索公众号
    ```
    \Ctwj\WechatSearch\WechatSearch::getInstance()->searchAccounts(['keyword'=>'童话','page'=>1]);
    ``` 
    or
    ```
    \Ctwj\WechatSearch\WechatSearch::getInstance()->searchAccounts('童话', 1);
    ```
    or
    ```
    \Ctwj\WechatSearch\WechatSearch::getInstance()->searchAccounts('?query=%E7%AB%A5%E8%AF%9D&type=1&page=8&ie=utf8');
    ```
- searchArticles 搜索文章
    ```
    \Ctwj\WechatSearch\WechatSearch::getInstance()->searchArticles(['keyword'=>'童话','page'=>1]);
    ``` 
    or
    ```
    \Ctwj\WechatSearch\WechatSearch::getInstance()->searchArticles('童话', 1);
    ```
    or
    ```
    \Ctwj\WechatSearch\WechatSearch::getInstance()->searchArticles('?query=%E7%AB%A5%E8%AF%9D&type=1&page=8&ie=utf8');
    ```
- getArticles  获取文章内容
    ```
    \Ctwj\WechatSearch\WechatSearch::getInstance()->getArticles('a article temp link');
    ```
- getHots   获取分类热门文章列表
    ```
    \Ctwj\WechatSearch\WechatSearch::getInstance()->getHots('育儿', 1);
    ```      