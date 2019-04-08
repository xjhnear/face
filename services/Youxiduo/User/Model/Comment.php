<?php
/**
 * @package Youxiduo
 * @category Android 
 * @link http://dev.youxiduo.com
 * @copyright Copyright (c) 2008 Youxiduo.com 
 * @license http://www.youxiduo.com/license
 * @since 4.0.0
 *
 */
namespace Youxiduo\User\Model;

use Youxiduo\Base\Model;
use Youxiduo\Base\IModel;
/**
 * 用户反馈模型类
 */
final class Comment extends Model implements IModel
{	
    public static function getClassName()
	{
		return __CLASS__;
	}	
	
	public static function saveComment($urid,$type,$pid,$content)
	{
		$data = array();
		$data['urid'] = $urid;
		$data['type'] = $type;
		$data['pid'] = $pid;
		$data['content'] = $content;
		$data['created_at'] = time();
		$data['updated_at'] = time();
		$res = self::db()->insertGetId($data);
		return $res ? true : false;
	}

}