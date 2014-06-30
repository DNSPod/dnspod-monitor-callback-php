# DNSPod 宕机监控 URL 回调 PHP 服务端示例

## 它的作用

    通过 DNSPod 提供的宕机监控 URL 回调，您可以将 DNSPod 的监控轻松地整合到您的项目中。

## 环境要求

    这是基于 PHP5.x 的一个实现，环境要求为：

    $ PHP5.x 的 Web 环境，可以通过 URL 直接访问

## 如何安装

    打开 index.asp 修改其中的 callback_key 让它跟您在 DNSPod 添加监控时设置的回调密钥一致。

    直接放到网站的任何目录，然后在 DNSPod 添加监控的时候设置相应的 URL 地址。
