# wechat_search
api for wechat subscribe account and articles by sogou search

## install

```
composer require ctwj\wechat_search_api
```


## example
- getInstance 获取实例
    ```
    $instance = \Ctwj\WechatSearch\WechatSearch::->getInstance();
    ```
    or
    ```
    $instance = \Ctwj\WechatSearch\WechatSearch::getInstance(
        [
            'cachePath'   => 'path to save cache',  //缓存路径,结尾需要友分隔符, 默认项目内
            'cacheTime'   => 10,        //分钟数,为0时关闭代理, 默认十分钟
            'proxyEnable' => false,     //是否开启代理
            'proxyObject' => '127.0.0.1:8080', //代理     
            'useragent'   => [          //数组设置为多个每次随机选择
                "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/22.0.1207.1 Safari/537.1",
                "Mozilla/5.0 (X11; CrOS i686 2268.111.0) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11",
            ]
        ]
    );
    ```
    or 
    ```
    $instance = \Ctwj\WechatSearch\WechatSearch::getInstance(
        [
            'proxyEnable' => false,     //是否开启代理
            'proxyObject' => [
                '127.0.0.1:8080',
                'username',
                'password'
        ]     
    );
    ```

- searchAccounts 搜索公众号
    ```
    $instance->searchAccounts(['keyword'=>'童话','page'=>1]);
    ``` 
    or
    ```
    $instance->searchAccounts('童话', 1);
    ```
    or
    ```
    $instance->searchAccounts('?query=%E7%AB%A5%E8%AF%9D&type=1&page=8&ie=utf8');
    ```
- searchArticles 搜索文章
    ```
    $instance->searchArticles(['keyword'=>'童话','page'=>1]);
    ``` 
    or
    ```
    $instance->searchArticles('童话', 1);
    ```
    or
    ```
    $instance->searchArticles('?query=%E7%AB%A5%E8%AF%9D&type=1&page=8&ie=utf8');
    ```
- accountArticles 获取公众号文章列表
    ```
    $instance->accountArticles('a accont temp link');
    ```
- getArticles  获取文章内容
    ```
    $instance->getArticles('a article temp link');
    ```
- getHots   获取分类热门文章列表
    ```
    $instance->getHots('育儿', 1);
    ```      
- getTypes   获取分类
    ```
    $instance->getTypes();
    ```        