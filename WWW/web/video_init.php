<?php
/**
 * Created by PhpStorm.
 * User: zym
 * Date: 2015/7/2
 * Time: 9:41
 */
require 'lib/Video.php';

$secretkey = "293751c44b1c95f0f035f181ef29d31a";     // 用户仪表盘上的私钥
$user_unique = "a4lsgehfki";
$format = "json";

$video = new Video($secretkey, $user_unique, $format);

$video_info = $_REQUEST;

$file_size = isset($video_info['file_size']) ? intval($video_info['file_size']) : 0 ;
$uploadtype = isset($video_info['uploadtype']) ? intval($video_info['uploadtype']) : 0 ;
$uc1 = isset($video_info['uc1']) ? intval($video_info['uc1']) : 0 ;
$uc2 = isset($video_info['uc2']) ? intval($video_info['uc2']) : 0 ;
$client_ip = $_SERVER['REMOTE_ADDR'];

// 若有token，则为断点续传，分发给断点续传接口
if (isset($video_info['token']) && !empty($video_info['token'])) {
    echo $video->resume($video_info['token'], $client_ip, $uploadtype);
}

// 若为上传初始化，视频名称为必须值
if (isset($video_info['videoname']) && !empty($video_info['videoname'])) {
    echo $video->init($video_info['videoname'], $file_size, $client_ip, $uploadtype, $uc1, $uc2);
}
