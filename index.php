<?php
/*
 * Copyright 2006-2012 DNSPod, Inc.  All Rights Reserved.
 * 
 * @author		李院长
 * @email		mjj@dnspod.com
 * @version     1.0.0
 */

$callback_key   = 'mjj';                    // 添加监控时设置的密钥

$monitor_id     = $_POST['monitor_id'];     // 监控编号
$domain_id      = $_POST['domain_id'];      // 域名编号
$domain         = $_POST['domain'];         // 域名名称
$record_id      = $_POST['record_id'];      // 记录编号
$sub_domain     = $_POST['sub_domain'];     // 主机名称
$record_line    = $_POST['record_line'];    // 记录线路
$ip             = $_POST['ip'];             // 记录IP
$status         = $_POST['status'];         // 当前状态
$status_code    = $_POST['status_code'];    // 状态代码
$reason         = $_POST['reason'];         // 宕机原因
$created_at     = $_POST['created_at'];     // 发生时间
$checksum       = $_POST['checksum'];       // 校检代码

if (md5($monitor_id. $domain_id. $record_id. $callback_key. $created_at) != $checksum) {
    // 非法请求
    echo 'BAD REQUEST';
} else {
    // 开始处理
    if ($status == 'Warn' || $status == 'Ok') {
        // 宕机恢复
        // ----* 这里是您的代码 *----
        file_put_contents('log/monitor.log', "{$created_at} {$monitor_id} {$status}({$status_code}) {$domain}({$domain_id}) {$sub_domain}({$record_id}) {$record_line} {$ip}\n", FILE_APPEND);
    } elseif ($status == 'Down') {
        // 已经宕机
        // ----* 这里是您的代码 *----
        file_put_contents('log/monitor.log', "{$created_at} {$monitor_id} {$status}({$status_code}) {$domain}({$domain_id}) {$sub_domain}({$record_id}) {$record_line} {$ip} {$reason}\n", FILE_APPEND);
    }
    
    // 处理完成
    echo 'DONE';
}
