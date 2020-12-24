<?php
function getImg(){
//自建图库或者使用网络图库
header("Location:".$url);
}

/**
 * 域名白名单校验函数
 * @param $domain_list
 * @return true/false
 */
function checkReferer($domain_list = array(
    'www.ruozai.top'
)) {
    $status = false;
    $refer = $_SERVER['HTTP_REFERER']; //前一URL
    if ($refer) {
        $referhost = parse_url($refer);
        /**来源地址主域名**/
        $host = strtolower($referhost['host']);
        if ($host == $_SERVER['HTTP_HOST'] || in_array($host, $domain_list)) {
            $status = true;
        }
    }
    return $status;
}
//添加日志
function addLog($url) {
    $log_path = IMG_API . 'log/'; 
    $log_file = date("Y-m-d") . '.log';
    if (!is_dir($log_path)) {
        mkdir($log_path, 0777, true);
    }

    $log_data = 'request_time: ' . date('Y-m-d H:i:s') . PHP_EOL . 'request_url: ' . $url . PHP_EOL. 'request_ip: ' . $_SERVER['REMOTE_ADDR'] . PHP_EOL;
    file_put_contents($log_path . $log_file, $log_data, FILE_APPEND);
}

$refer = $_SERVER['HTTP_REFERER']; //前一URL
//存在前一URL
if ($refer) {
    if (!checkReferer()) {
        $imgWeb = file_get_contents('imgweb.html');
        echo $imgWeb;
	addLog($refer);
        die;
    } else {
        getImg();
	addLog($refer);
        die;
    }
} else {
    //直接访问API地址
    $imgWeb = file_get_contents('imgweb.html');
    echo $imgWeb;
    addLog($refer);
    die;
}
?>

