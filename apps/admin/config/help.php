<?php
return array(
    //
    'account/login'=>array(
        'name'=>'account/login',
        'description'=>'内部登录接口',
        'url'=>'http://api.youxiduo.com/account/login',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'client_id','required'=>'true','type'=>'string','description'=>'客户端应用分配的client_id'),
            array('field'=>'account_type','required'=>'true','type'=>'string','description'=>'登录帐号类型必须为[youxiduo][sina][qq][qzone]之一'),
            array('field'=>'redirect_uri','required'=>'true','type'=>'string','description'=>'授权回调地址'),
            array('field'=>'email','required'=>'true','type'=>'string','description'=>'用于登录的email，当account_type为youxiduo时为必填项。'),
            array('field'=>'password','required'=>'true','type'=>'string','description'=>'用于登录的密码，当account_type为youxiduo时为必填项。'),
            array('field'=>'third_access_token','required'=>'false','type'=>'string','description'=>'用于等三方登录的令牌，当account_type不为youxiduo时为必填项。'),
            array('field'=>'signature','required'=>'true','type'=>'string','description'=>'签名，使用签名密钥按照签名算法获取'),
            array('field'=>'timestamp','required'=>'true','type'=>'int','description'=>'时间戳，从1970年以来的秒数'),
        ),
        'return'=>array(
            array('field'=>'access_token','type'=>'string','description'=>'access_token是授权的令牌，用于需授权的接口调用、资源访问'),
            array('field'=>'expires_in','type'=>'string','description'=>'access_token的生命周期，单位是秒数。'),
            array('field'=>'uid','type'=>'string','description'=>'当前授权的UID'),
            array('field'=>'nickname','type'=>'string','description'=>'用于显示的用户名'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_request','error_description'=>'请求参数丢失,请检查请求参数是否完整'),
            array('error_code'=>'invalid_account','error_description'=>'无效的登录帐号'),
            array('error_code'=>'invalid_password','error_description'=>'登录密码错误'),
            array('error_code'=>'invalid_access_token','error_description'=>'第三方登录帐号尚未绑定'),
        )
    ),
    //
    'account/register'=>array(
        'name'=>'account/register',
        'description'=>'内部注册接口',
        'url'=>'http://api.youxiduo.com/account/register',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'client_id','required'=>'true','type'=>'string','description'=>'客户端应用分配的client_id'),
            array('field'=>'redirect_uri','required'=>'true','type'=>'string','description'=>'授权回调地址'),
            array('field'=>'email','required'=>'true','type'=>'string','description'=>'用于登录的email，'),
            array('field'=>'password','required'=>'true','type'=>'string','description'=>'用于登录的密码'),
            array('field'=>'third_type','required'=>'false','type'=>'string','description'=>'等三方登录帐号类型，必须为[sina][qq]之一'),
            array('field'=>'third_access_token','required'=>'false','type'=>'string','description'=>'用于等三方登录的令牌,如果提供此字段注册成功后将直接绑定'),
            array('field'=>'signature','required'=>'true','type'=>'string','description'=>'签名，使用签名密钥按照签名算法获取'),
            array('field'=>'timestamp','required'=>'true','type'=>'int','description'=>'时间戳，从1970年以来的秒数'),
            array('field'=>'nickname','required'=>'false','type'=>'string','description'=>'昵称'),
            array('field'=>'mobile','required'=>'false','type'=>'string','description'=>'手机'),
            array('field'=>'sex','required'=>'false','type'=>'string','description'=>'性别'),
            array('field'=>'birthday','required'=>'false','type'=>'string','description'=>'出生日期'),
        ),
        'return'=>array(
            array('field'=>'access_token','type'=>'string','description'=>'access_token是授权的令牌，用于需授权的接口调用、资源访问'),
            array('field'=>'expires_in','type'=>'string','description'=>'access_token的生命周期，单位是秒数。'),
            array('field'=>'uid','type'=>'string','description'=>'当前授权的UID'),
            array('field'=>'nickname','type'=>'string','description'=>'用于显示的用户名'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_request','error_description'=>'请求参数丢失,请检查请求参数是否完整'),
            array('error_code'=>'invalid_email','error_description'=>'email格式错误'),
            array('error_code'=>'email_exists','error_description'=>'Email已经被占用'),
        )
    ),
    
    'account/logout'=>array(
        'name'=>'account/logout',
        'description'=>'内部退出接口',
        'url'=>'http://api.youxiduo.com/account/logout',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'client_id','required'=>'true','type'=>'string','description'=>'客户端应用分配的client_id'),
            array('field'=>'access_token','required'=>'true','type'=>'string','description'=>'access_token是授权的令牌，用于需授权的接口调用、资源访问'),
            array('field'=>'signature','required'=>'true','type'=>'string','description'=>'签名，使用签名密钥按照签名算法获取'),
            array('field'=>'timestamp','required'=>'true','type'=>'int','description'=>'时间戳，从1970年以来的秒数'),
        ),
        'return'=>array(
            array('field'=>'result','type'=>'bool','description'=>'成功返回true失败返回false'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_access_token','error_description'=>'无效的令牌access_token')
        )
    ),
    'account/bind'=>array(
        'name'=>'account/bind',
        'description'=>'绑定第三方帐号',
        'url'=>'http://api.youxiduo.com/account/bind',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'access_token','required'=>'true','type'=>'string','description'=>'access_token是授权的令牌，用于需授权的接口调用、资源访问'),            
            array('field'=>'third_access_token','required'=>'true','type'=>'int','description'=>'用于等三方登录的令牌'),
        ),
        'return'=>array(
            array('field'=>'result','type'=>'bool','description'=>'成功返回true失败返回false'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_access_token','error_description'=>'无效的令牌access_token')
        )
    ),
    'account/unbind'=>array(
        'name'=>'account/unbind',
        'description'=>'解除第三方帐号绑定',
        'url'=>'http://api.youxiduo.com/account/unbind',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'access_token','required'=>'true','type'=>'string','description'=>'access_token是授权的令牌，用于需授权的接口调用、资源访问'),            
            array('field'=>'third_access_token','required'=>'true','type'=>'int','description'=>'用于等三方登录的令牌'),
        ),
        'return'=>array(
            array('field'=>'result','type'=>'bool','description'=>'成功返回true失败返回false'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_access_token','error_description'=>'无效的令牌access_token')
        )
    ),
    'account/all-unbind'=>array(
        'name'=>'account/all-unbind',
        'description'=>'解除全部第三方帐号绑定',
        'url'=>'http://api.youxiduo.com/account/all-unbind',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'access_token','required'=>'true','type'=>'string','description'=>'access_token是授权的令牌，用于需授权的接口调用、资源访问')
        ),
        'return'=>array(
            array('field'=>'result','type'=>'bool','description'=>'成功返回true失败返回false'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_access_token','error_description'=>'无效的令牌access_token')
        )
    ),
    
    'account/info'=>array(
        'name'=>'account/info',
        'description'=>'获取当前登录用户的信息',
        'url'=>'http://api.youxiduo.com/account/info',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'access_token','required'=>'true','type'=>'string','description'=>'access_token是授权的令牌，用于需授权的接口调用、资源访问')
        ),
        'return'=>array(
            array('field'=>'uid','type'=>'int','description'=>'用户唯一标识'),
            array('field'=>'nickname','type'=>'string','description'=>'用户昵称，仅用于显示'),
            array('field'=>'email','type'=>'string','description'=>'用户邮箱'),
            array('field'=>'mobile','type'=>'string','description'=>'用户手机号码'),
            array('field'=>'sex','type'=>'string','description'=>'用户性别'),
            array('field'=>'birthday','type'=>'string','description'=>'用户生日'),
            array('field'=>'credit','type'=>'int','description'=>'用户积分'),
            array('field'=>'avatar','type'=>'string','description'=>'用户头像'),
            array('field'=>'authorize_nodes','type'=>'array','description'=>'用户权限，具体参见<a href="/help/authorize" target="_blank">权限表</a>'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_access_token','error_description'=>'无效的令牌access_token')
        )
    ),
    //论坛-分类标签列表
    'forum/channel'=>array(
        'name'=>'forum/channel',
        'description'=>'分类标签列表',
        'url'=>'http://api.youxiduo.com/forum/channel',
        'http_method'=>'GET',
        'params'=>array(
            array('field'=>'gid','required'=>'true','type'=>'int','description'=>'论坛唯一标识')
        ),
        'return'=>array(
            array('field'=>'cid','type'=>'int','description'=>'标签唯一标识'),
            array('field'=>'channel_name','type'=>'string','description'=>'标签名称'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_gid','error_description'=>'无效的论坛标志ID')
        )
    ),
    
    //论坛-公告
    'forum/notice'=>array(
        'name'=>'forum/notice',
        'description'=>'论坛公告列表',
        'url'=>'http://api.youxiduo.com/forum/notice',
        'http_method'=>'GET',
        'params'=>array(
            array('field'=>'gid','required'=>'true','type'=>'int','description'=>'论坛唯一标识')
        ),
        'return'=>array(
            array('field'=>'id','type'=>'number','description'=>'公告唯一标识'),
            array('field'=>'gid','type'=>'number','description'=>'论坛唯一标识'),
            array('field'=>'title','type'=>'string','description'=>'公告标题'),
            array('field'=>'message','type'=>'string','description'=>'公告内容'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_gid','error_description'=>'无效的论坛标志ID')
        )
    ),
    
    //论坛-公告
    'forum/notice-info'=>array(
        'name'=>'forum/notice-info',
        'description'=>'论坛公告信息',
        'url'=>'http://api.youxiduo.com/forum/notice-info',
        'http_method'=>'GET',
        'params'=>array(
            array('field'=>'id','required'=>'true','type'=>'int','description'=>'公告唯一标识')
        ),
        'return'=>array(
            array('field'=>'id','type'=>'number','description'=>'公告唯一标识'),
            array('field'=>'gid','type'=>'number','description'=>'论坛唯一标识'),
            array('field'=>'title','type'=>'string','description'=>'公告标题'),
            array('field'=>'message','type'=>'string','description'=>'公告内容'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_gid','error_description'=>'无效的论坛标志ID')
        )
    ),
    
    //论坛-主题帖列表
    'topic/show'=>array(
        'name'=>'topic/show',
        'description'=>'主题帖列表',
        'url'=>'http://api.youxiduo.com/topic/show',
        'http_method'=>'GET',
        'params'=>array(
            array('field'=>'gid','required'=>'true','type'=>'int','description'=>'论坛唯一标识'),
            array('field'=>'cid','required'=>'false','type'=>'int','description'=>'论坛标签唯一标识'),
            array('field'=>'page','required'=>'false','type'=>'int','description'=>'返回结果的页码'),
            array('field'=>'pagesize','required'=>'false','type'=>'int','description'=>'单页返回的结果记录条数'),
            array('field'=>'feature','required'=>'false','type'=>'int','description'=>'过滤类型ID，0：全部、1：置顶、2：精华，默认为0'),
        ),
        'return'=>array(
            array('field'=>'count','type'=>'int','description'=>'主题帖数量'),
            array('field'=>'topics','type'=>'array','description'=>'主题帖列表,<a href="/help/topic">topic格式参考</a>'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_gid','error_description'=>'无效的论坛标志ID')
        )
    ),
    //论坛-主题帖详情
    'topic/info'=>array(
        'name'=>'topic/info',
        'description'=>'主题帖详情',
        'url'=>'http://api.youxiduo.com/topic/info',
        'http_method'=>'GET',
        'params'=>array(
            array('field'=>'tid','required'=>'true','type'=>'int','description'=>'主题帖唯一标识'),
            array('field'=>'page','required'=>'false','type'=>'int','description'=>'返回结果的页码'),
            array('field'=>'pagesize','required'=>'false','type'=>'int','description'=>'单页返回的结果记录条数'),
        ),
        'return'=>array(
            array('field'=>'topic','type'=>'json','description'=>'主题帖<a href="/help/topicinfo">参见</a>'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_gid','error_description'=>'无效的论坛标志ID')
        )
    ),
    
    //论坛-发主题帖
    'topic/post'=>array(
        'name'=>'topic/post',
        'description'=>'发主题帖',
        'url'=>'http://api.youxiduo.com/topic/post',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'gid','required'=>'true','type'=>'int','description'=>'所属论坛，论坛唯一标识'),
            array('field'=>'cid','required'=>'true','type'=>'int','description'=>'所属分类标签，论坛标签唯一标识'),
            array('field'=>'title','required'=>'true','type'=>'string','description'=>'主题贴标题'),
            array('field'=>'message','required'=>'true','type'=>'int','description'=>'主题帖内容'),
            array('field'=>'lat','required'=>'false','type'=>'float','description'=>'纬度'),
            array('field'=>'long','required'=>'false','type'=>'float','description'=>'经度'),
        ),
        'return'=>array(
            array('field'=>'tid','type'=>'int','description'=>'主题帖唯一标识'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_gid','error_description'=>'无效的论坛标志ID')
        )
    ),
    
    //论坛-发主题帖
    'topic/upload'=>array(
        'name'=>'topic/upload',
        'description'=>'上传图片并发主题帖',
        'url'=>'http://api.youxiduo.com/topic/upload',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'gid','required'=>'true','type'=>'int','description'=>'所属论坛，论坛唯一标识'),
            array('field'=>'cid','required'=>'true','type'=>'int','description'=>'所属分类标签，分类标签唯一标识'),
            array('field'=>'title','required'=>'true','type'=>'string','description'=>'主题贴标题'),
            array('field'=>'message','required'=>'true','type'=>'int','description'=>'主题帖内容'),
            array('field'=>'lat','required'=>'false','type'=>'float','description'=>'纬度'),
            array('field'=>'long','required'=>'false','type'=>'float','description'=>'经度'),
        ),
        'return'=>array(
            array('field'=>'tid','type'=>'int','description'=>'主题帖唯一标识'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_gid','error_description'=>'无效的论坛标志ID')
        )
    ),
    
    //论坛-回帖
    'topic/reply'=>array(
        'name'=>'topic/reply',
        'description'=>'回帖',
        'url'=>'http://api.youxiduo.com/topic/post',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'gid','required'=>'true','type'=>'int','description'=>'所属论坛，论坛唯一标识'),
            array('field'=>'cid','required'=>'true','type'=>'int','description'=>'所属分类标签，分类标签唯一标识'),
            array('field'=>'tid','required'=>'true','type'=>'int','description'=>'所属主题帖，主题帖唯一标识'),
            array('field'=>'title','required'=>'true','type'=>'string','description'=>'主题贴标题'),
            array('field'=>'message','required'=>'true','type'=>'int','description'=>'主题帖内容'),
            array('field'=>'lat','required'=>'false','type'=>'float','description'=>'纬度'),
            array('field'=>'long','required'=>'false','type'=>'float','description'=>'经度'),
        ),
        'return'=>array(
            array('field'=>'tid','type'=>'int','description'=>'主题帖唯一标识'),
        ),
        'error'=>array(
            array('error_code'=>'invalid_gid','error_description'=>'无效的论坛标志ID')
        )
    ),
    //删帖
    'topic/delete'=>array(
        'name'=>'topic/delete',
        'description'=>'删除帖子',
        'url'=>'http://api.youxiduo.com/topic/delete',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'pid','required'=>'true','type'=>'int','description'=>'帖子ID'),
        ),
        'return'=>array(
            array('field'=>'','type'=>'','description'=>''),
        ),
        'error'=>array(
            array('error_code'=>'','error_description'=>'')
        )
    ),
    
    'topic/score'=>array(
        'name'=>'topic/score',
        'description'=>'给帖子评分',
        'url'=>'http://api.youxiduo.com/topic/score',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'pid','required'=>'true','type'=>'int','description'=>'帖子ID')
        ),
        'return'=>array(
            array('field'=>'','type'=>'','description'=>''),
        ),
        'error'=>array(
            array('error_code'=>'','error_description'=>'')
        )
    ),
    
    'topic/digest'=>array(
        'name'=>'topic/digest',
        'description'=>'把帖子置为精华帖',
        'url'=>'http://api.youxiduo.com/topic/digest',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'tid','required'=>'true','type'=>'number','description'=>'主题帖ID')
        ),
        'return'=>array(
            array('field'=>'','type'=>'','description'=>''),
        ),
        'error'=>array(
            array('error_code'=>'','error_description'=>'')
        )
    ),
    
    'topic/stick'=>array(
        'name'=>'topic/stick',
        'description'=>'把帖子置顶',
        'url'=>'http://api.youxiduo.com/topic/stick',
        'http_method'=>'POST',
        'require_login'=>true,
        'system_params'=>array(
            array('field'=>'access_token','required'=>'true','type'=>'string','description'=>'授权的令牌')
        ),
        'params'=>array(
            array('field'=>'tid','required'=>'true','type'=>'number','description'=>'主题帖ID')
        ),
        'return'=>array(
            array('field'=>'','type'=>'','description'=>''),
        ),
        'error'=>array(
            array('error_code'=>'','error_description'=>'')
        )
    ),
    
    'relation/friend-create'=>array(
        'name'=>'relation/friend-create',
        'description'=>'添加好友',
        'url'=>'http://api.youxiduo.com/relation/friend-create',
        'http_method'=>'POST',
        'require_login'=>true,
        'system_params'=>array(
            array('field'=>'access_token','required'=>'true','type'=>'string','description'=>'授权的令牌')
        ),
        'params'=>array(
            array('field'=>'fuid','required'=>'true','type'=>'number','description'=>'好友UID')
        ),
        'return'=>array(
            array('field'=>'','type'=>'','description'=>''),
        ),
        'error'=>array(
            array('error_code'=>'','error_description'=>'')
        )
    ),
    
    'relation/friend-destroy'=>array(
        'name'=>'relation/friend-destroy',
        'description'=>'解除好友关系',
        'url'=>'http://api.youxiduo.com/relation/friend-destroy',
        'http_method'=>'POST',
        'require_login'=>true,
        'system_params'=>array(
            array('field'=>'access_token','required'=>'true','type'=>'string','description'=>'授权的令牌')
        ),
        'params'=>array(
            array('field'=>'fuid','required'=>'true','type'=>'number','description'=>'好友UID')
        ),
        'return'=>array(
            array('field'=>'','type'=>'','description'=>''),
        ),
        'error'=>array(
            array('error_code'=>'','error_description'=>'')
        )
    ),
    
    'relation/friends'=>array(
        'name'=>'relation/friends',
        'description'=>'获取好友列表',
        'url'=>'http://api.youxiduo.com/relation/friends',
        'http_method'=>'POST',
        'require_login'=>true,
        'system_params'=>array(
            array('field'=>'access_token','required'=>'true','type'=>'string','description'=>'授权的令牌')
        ),
        'params'=>array(
        ),
        'return'=>array(
            array('field'=>'','type'=>'','description'=>''),
        ),
        'error'=>array(
            array('error_code'=>'','error_description'=>'')
        )
    ),
    
    
    'account/all-other'=>array(
        'name'=>'',
        'description'=>'',
        'url'=>'http://api.youxiduo.com/',
        'http_method'=>'POST',
        'params'=>array(
            array('field'=>'','required'=>'true','type'=>'string','description'=>'')
        ),
        'return'=>array(
            array('field'=>'','type'=>'','description'=>''),
        ),
        'error'=>array(
            array('error_code'=>'','error_description'=>'')
        )
    ),
);