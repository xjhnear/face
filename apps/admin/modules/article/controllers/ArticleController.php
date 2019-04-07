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
        $pageIndex = Input::get('page',1);
        $pageSize = 10;
		$search = array();

        $data['datalist'] = User::getList($search,$pageIndex,$pageSize);
        $data['search'] = $search;
        $total = Article::getCount($search);
        $pager = Paginator::make(array(),$total,$pageSize);
        $pager->appends($search);
        $data['pagelinks'] = $pager->links();
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
        $data['data'] = Article::getInfo($id);
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