<?php
// +----------------------------------------------------------------------
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: oliverxu <471066925@qq.com>
// +----------------------------------------------------------------------

namespace Org\Net;

class Weixin
{
    /**
     * 获取requestCode的api接口
     * @var string
     */
    protected $getRequestCodeURL = 'https://open.weixin.qq.com/connect/oauth2/authorize';

    /**
     * 获取access_token的api接口
     * @var string
     */
    protected $getAccessTokenURL = 'https://api.weixin.qq.com/sns/oauth2/access_token';

    /**
     * API根路径
     * @var string
     */
    protected $apiBase = 'https://api.weixin.qq.com/';

    /**
     * 申请应用时分配的app_key
     * @var string
     */
    protected $appKey = '';

    /**
     * 申请应用时分配的 app_secret
     * @var string
     */
    protected $appSecret = '';

    /**
     * 授权类型 response_type 目前只能为code
     * @var string
     */
    protected $responseType = 'code';

    /**
     * grant_type 目前只能为 authorization_code
     * @var string
     */
    protected $grantType = 'authorization_code';

    /**
     * 回调页面URL  可以通过配置文件配置
     * @var string
     */
    protected $callback = '';
    /**
     * 授权后获取到的TOKEN信息
     * @var array
     */
    protected $token = null;

    /**
     * 构造方法，配置应用信息
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->appKey    = isset($config['app_key']) ? $config['app_key'] : '';
        $this->appSecret = isset($config['app_secret']) ? $config['app_secret'] : '';
    //    $this->authorize = isset($config['authorize']) ? $config['authorize'] : '';
        $this->callback  = isset($config['callback']) ? $config['callback'] : '';
    }

    /**
     * 组装接口调用参数 并调用接口
     * @param  string $api    微博API
     * @param  string $param  调用API的额外参数
     * @param  string $method HTTP请求方法 默认为GET
     * @return json
     */
    protected function call($api, $param = '', $method = 'GET', $multi = false)
    {
        /* Weixin调用公共参数 */
        $params = [
            'appid' => $this->appKey,
            'secret' => $this->appSecret,
            'access_token'       => $this->token['access_token'],
            'openid'             => $this->getOpenId(),
        ];
        $data = $this->http($this->url($api), $this->param($params, $param), $method);

        return json_decode($data, true);
    }

    // 跳转到授权登录页面
    public function login($callback = '')
    {
        if ($callback) {
            $this->callback = $callback;
        }
        //跳转到授权页面
        header('Location: ' . $this->getRequestCodeURL());
        exit;
    }

    public function gettoken()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->appKey.'&secret='.$this->appSecret;
        $result = json_decode(file_get_contents($url));
        $access_token = $result->access_token;        
        if($access_token){
            return $access_token;
        }else{
            return null;
        }
    }
    /**
     * 获取指定API请求的URL
     * @param  string $api API名称
     * @param  string $fix api后缀
     * @return string      请求的完整URL
     */
    protected function url($api, $fix = '')
    {
        return $this->apiBase . $api . $fix;
    }

    /**
     * 合并默认参数和额外参数
     * @param array $params  默认参数
     * @param array/string $param 额外参数
     * @return array:
     */
    protected function param($params, $param)
    {
        if (is_string($param)) {
            parse_str($param, $param);
        }

        return array_merge($params, $param);
    }
    /**
     * 请求code
     */
    public function getRequestCodeURL()
    {
        //Oauth 标准参数
        $params = [
            'appid'     => $this->appKey,
            'redirect_uri'  => $this->callback,
            'scope' => 'snsapi_userinfo',
            'response_type' => $this->responseType,
        ];

        //获取额外参数
        if ($this->authorize) {
            parse_str($this->authorize, $_param);
            if (is_array($_param)) {
                $params = array_merge($params, $_param);
            } else {
                throw new \Exception('AUTHORIZE配置不正确！');
            }
        }

        return $this->getRequestCodeURL . '?' . http_build_query($params);
    }

    public function getAccessToken($code)
    {
        $params = [
            'appid'     => $this->appKey,
            'secret' => $this->appSecret,
            'grant_type'    => $this->grantType,
            'code'          => $code,
        ];
        $data = $this->http($this->getAccessTokenURL, $params);
        // 解析token
        $this->token = $this->parseToken($data);
        return $this->token;
    }
    /**
     * 解析access_token方法请求后的返回值
     * @param string $result 获取access_token的方法的返回值
     */
    protected function parseToken($result)
    {
        $data = json_decode($result,true);
 
        if (isset($data['access_token']) && isset($data['expires_in'])) {
          //  $data['openid'] = $this->getOpenId();
            return $data;
        } else {
            return $result;
        }

    }

    /**
     * 获取当前授权应用的openid
     * @return string
     */
    public function getOpenId()
    {
        if (isset($this->token['openid']) && !empty($this->token['openid'])) {
            return $this->token['openid'];
        }
        return null;
    }

    /**
     * 获取当前授权应用的openid
     * @return string
     */
    public function getUnionId()
    {
        if (isset($this->token['unionid']) && !empty($this->token['unionid'])) {
            return $this->token['unionid'];
        }
        return null;
    }

    public function getOauthInfo()
    {
        $data = $this->call('sns/userinfo');
        if (!isset($data['errcode'])) {
            return $data;
        } else {
            return null;
        }
    }

    /**
     * 发送HTTP请求方法，目前只支持CURL发送请求
     * @param  string $url    请求URL
     * @param  array  $params 请求参数
     * @param  string $method 请求方法GET/POST
     * @return array  $data   响应数据
     */
    protected function http($url, $params, $method = 'GET', $header = [], $multi = false)
    {
        $opts = [
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $header,
        ];

        /* 根据请求类型设置特定参数 */
        switch (strtoupper($method)) {
            case 'GET':
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //判断是否传输文件
                $params                   = $multi ? $params : http_build_query($params);
                $opts[CURLOPT_URL]        = $url;
                $opts[CURLOPT_POST]       = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default:
                throw new \Exception('不支持的请求方式！');
        }
        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) {
            throw new \Exception('请求发生错误：' . $error);
        }

        return $data;
    }

}
