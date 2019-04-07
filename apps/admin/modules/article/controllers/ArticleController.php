<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/15
 * Time: 11:25
 */
namespace modules\article\controllers;

use Yxd\Modules\Core\BackendController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Paginator;
use Youxiduo\Helper\MyHelp;
use Youxiduo\User\Model\Article;

class ArticleController extends BackendController
{

    public function _initialize()
    {
        $this->current_module = 'article';
    }

    public function getList()
    {
		$data = array();
		$page = Input::get('page',1);	
		$pagesize = 10;
		$search = array();
		
		$result = Article::getList($page,$pagesize);
		$totalcount = $result['totalcount'];
		$data['datalist'] = $result['data'];

		$pager = Paginator::make(array(),$totalcount,$pagesize);
		$pager->appends($search);
		$data['search'] = $search;
		$data['pagelinks'] = $pager->links();
		$data['totalcount'] = $totalcount;
		
        return $this->display('article/article-list', $data);
    }

    public function getAdd()
    {
        $data = array();
        return $this->display('article/article-add', $data);
    }
    
    public function postAdd()
    {
        $input = Input::only('title', 'content');

        $data['title'] = $input['title'];
        $data['content'] = $input['content'];
        
        $result = Article::save($data);
        
        if ($result) {
            return $this->redirect('article/article/list')->with('global_tips', '保存成功');
        } else {
            return $this->back('保存失败');
        }
    }

    public function getEdit($id)
    {
        $data = array();
        $result = Article::getInfo($id);
        $data['data'] = $result['data'];
        return $this->display('article/article-edit', $data);
    }

    public function postEdit()
    {
        $input = Input::only('id', 'title', 'content');
        
        $data['arId'] = $input['id'];
        $data['title'] = $input['title'];
        $data['content'] = $input['content'];

        $result = Article::save($data);
        
        if ($result) {
            return $this->redirect('article/article/list')->with('global_tips', '保存成功');
        } else {
            return $this->back('保存失败');
        }
    }

    
}