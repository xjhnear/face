<?php
use Yxd\Services\ThreadService;
use Illuminate\Support\Facades\Response;
use Yxd\Services\AtmeService;
use Yxd\Services\UserFeedService;
use Yxd\Services\RelationService;
use Illuminate\Support\Facades\Input;
use Youxiduo\User\VideoService;
use Youxiduo\Helper\MyHelp;

use PHPImageWorkshop\ImageWorkshop;

class VideoController extends BaseController
{

	public function getlist()
	{
		$pageIndex = Input::get('pageIndex',1);
		$pageSize = Input::get('pageSize',20);

		$result = VideoService::getVideoList($pageIndex,$pageSize);
		if($result['result']){
			return $this->success($result['data']);
		}else{
			return $this->fail(201,$result['msg']);
		}
	}

	public function comment()
	{
		$pid = Input::get('pid');
		$content = Input::get('content');
		$urid = Input::get('urid',0);
		$result = UserService::saveComment($urid,2,$pid,$content);
		if($result['result']){
			return $this->success();
		}else{
			return $this->fail(201,$result['msg']);
		}
	}
}