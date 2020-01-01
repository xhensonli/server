<?php
/**
 * Created by PhpStorm.
 * User: 86159
 * Date: 2020/1/1
 * Time: 11:38
 */
namespace te;
class ipany
{
    public function __construct()
    {
    }

    /**
     * 获取客户端浏览器信息
     * @param   null
     * @author  https://blog.jjonline.cn/phptech/168.html
     * @return  string
     */
    private function get_broswer()
    {
        $sys = $_SERVER['HTTP_USER_AGENT'];  //获取用户代理字符串
        if (stripos($sys, "Firefox/") > 0) {
            preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);
            $exp[0] = "Firefox";
            $exp[1] = $b[1];  	//获取火狐浏览器的版本号
        } elseif (stripos($sys, "Maxthon") > 0) {
            preg_match("/Maxthon\/([\d\.]+)/", $sys, $aoyou);
            $exp[0] = "傲游";
            $exp[1] = $aoyou[1];
        } elseif (stripos($sys, "MSIE") > 0) {
            preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
            $exp[0] = "IE";
            $exp[1] = $ie[1];  //获取IE的版本号
        } elseif (stripos($sys, "OPR") > 0) {
            preg_match("/OPR\/([\d\.]+)/", $sys, $opera);
            $exp[0] = "Opera";
            $exp[1] = $opera[1];
        } elseif(stripos($sys, "Edge") > 0) {
            //win10 Edge浏览器 添加了chrome内核标记 在判断Chrome之前匹配
            preg_match("/Edge\/([\d\.]+)/", $sys, $Edge);
            $exp[0] = "Edge";
            $exp[1] = $Edge[1];
        } elseif (stripos($sys, "Chrome") > 0) {
            preg_match("/Chrome\/([\d\.]+)/", $sys, $google);
            $exp[0] = "Chrome";
            $exp[1] = $google[1];  //获取google chrome的版本号
        } elseif(stripos($sys,'rv:')>0 && stripos($sys,'Gecko')>0){
            preg_match("/rv:([\d\.]+)/", $sys, $IE);
            $exp[0] = "IE";
            $exp[1] = $IE[1];
        }else {
            $exp[0] = "未知浏览器";
            $exp[1] = "";
        }
        return $exp[0].'('.$exp[1].')';
    }


    /**
     * 获取客户端操作系统信息,包括win10
     * @param   null
     * @author  https://blog.jjonline.cn/phptech/168.html
     * @return  string
     */
    private function get_os(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $os = false;

        if (preg_match('/win/i', $agent) && strpos($agent, '95'))
        {
            $os = 'Windows 95';
        }
        else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90'))
        {
            $os = 'Windows ME';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent))
        {
            $os = 'Windows 98';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent))
        {
            $os = 'Windows Vista';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent))
        {
            $os = 'Windows 7';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent))
        {
            $os = 'Windows 8';
        }else if(preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent))
        {
            $os = 'Windows 10';#添加win10判断
        }else if (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent))
        {
            $os = 'Windows XP';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent))
        {
            $os = 'Windows 2000';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent))
        {
            $os = 'Windows NT';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/32/i', $agent))
        {
            $os = 'Windows 32';
        }
        else if (preg_match('/linux/i', $agent))
        {
            $os = 'Linux';
        }
        else if (preg_match('/unix/i', $agent))
        {
            $os = 'Unix';
        }
        else if (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent))
        {
            $os = 'SunOS';
        }
        else if (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent))
        {
            $os = 'IBM OS/2';
        }
        else if (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent))
        {
            $os = 'Macintosh';
        }
        else if (preg_match('/PowerPC/i', $agent))
        {
            $os = 'PowerPC';
        }
        else if (preg_match('/AIX/i', $agent))
        {
            $os = 'AIX';
        }
        else if (preg_match('/HPUX/i', $agent))
        {
            $os = 'HPUX';
        }
        else if (preg_match('/NetBSD/i', $agent))
        {
            $os = 'NetBSD';
        }
        else if (preg_match('/BSD/i', $agent))
        {
            $os = 'BSD';
        }
        else if (preg_match('/OSF1/i', $agent))
        {
            $os = 'OSF1';
        }
        else if (preg_match('/IRIX/i', $agent))
        {
            $os = 'IRIX';
        }
        else if (preg_match('/FreeBSD/i', $agent))
        {
            $os = 'FreeBSD';
        }
        else if (preg_match('/teleport/i', $agent))
        {
            $os = 'teleport';
        }
        else if (preg_match('/flashget/i', $agent))
        {
            $os = 'flashget';
        }
        else if (preg_match('/webzip/i', $agent))
        {
            $os = 'webzip';
        }
        else if (preg_match('/offline/i', $agent))
        {
            $os = 'offline';
        }
        else
        {
            $os = '未知操作系统';
        }
        return $os;
    }

    private function getip(){
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
            $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = "unknown";
        return($ip);
    }

    private function curl_redirect_exec($ch)
    {
        static $curl_loops = 0;
        static $curl_max_loops = 20;

        if ($curl_loops++ >= $curl_max_loops) {
            $curl_loops = 0;
            return FALSE;
        }
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        list($header,) = explode("\n\n", $response, 2);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code == 301 || $http_code == 302) {

            $matches = array();
            preg_match('/Location:(.*?)\n/', $header, $matches);
            $url = @parse_url(trim(array_pop($matches)));
            if (!$url) {
                $curl_loops = 0;
                return $response;
            }
            $new_url = $url['scheme'] . '://' . $url['host'] .':'.$url['port']. $url['path'] . (isset($url['query']) ? '?' . $url['query'] : '');
            if ($url['scheme'] == 'https') {
                //跳过证书检查
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                //检查证书中是否设置域名
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, TRUE);
            }
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_URL, $new_url);
            return $this->curl_redirect_exec($ch);
        } else {
            $curl_loops = 0;
            return $response;
        }
    }


    private function getAddress($ip){
        $url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
        $curl = curl_init($url);

        //$response = $this->curl_redirect_exec($curl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl);
        $body = json_decode($response,true)['data'];
        curl_close($curl);
        return $body['country'].$body['area'].$body['region'].(empty($body['isp'])?'':'('.$body['isp'].')');
    }

    private function getinfo(){
       var_dump($this->get_os());
       echo date('Y-m-d H:i:s');
//        $ip = $this->getip();
//        return   $this->getAddress($ip);

    }

    public function echoimg(){
        //1.配置图片路径
        $src = "./index/background1.jpg";
        //2.获取图片信息
        $info = getimagesize($src);
        //3.通过编号获取图像类型
        $type = image_type_to_extension($info[2],false);
        //4.在内存中创建和图像类型一样的图像
        $fun = "imagecreatefrom".$type;
        //5.图片复制到内存
        $image = $fun($src);
//        var_dump($fun);
        /*操作图片*/
        //1.设置字体的路径
        $font = __DIR__."/simhei.ttf";

        //2.填写水印内容
//        $content =  iconv('gb2312','utf-8',"水印文字:some special words are supported.");

//        echo $content;
        //3.设置字体颜色和透明度
        $color = imagecolorallocatealpha($image, 200, 100, 100, 0);
        //4.写入文字 (图片资源，字体大小，旋转角度，坐标x，坐标y，颜色，字体文件，内容)
        imagettftext($image, 10, 0, 10, 20, $color, $font, '你的ip:'.$ip = $this->getip());
        imagettftext($image, 10, 0, 10, 40, $color, $font, '你的地区和运营商:'.$this->getAddress($ip));
        imagettftext($image, 10, 0, 10, 60, $color, $font, '浏览器:'.$this->get_broswer());
        imagettftext($image, 10, 0, 10, 80, $color, $font, '操作系统:'.$this->get_os());
        imagettftext($image, 10, 0, 10, 100, $color, $font, '时间:'.date('Y-m-d H:i:s'));
        /*输出图片*/
        //浏览器输出
        header("Content-type:".$info['mime']);
        $fun = "image".$type;
        $fun($image);
        //保存图片
        $fun($image,'bg_res.'.$type);
        /*销毁图片*/
        imagedestroy($image);
    }
}