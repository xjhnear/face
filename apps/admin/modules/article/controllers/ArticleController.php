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
use Youxiduo\User\Model\Comment;

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

        $data['datalist'] = Article::getList($pageIndex,$pageSize);
        $data['search'] = $search;
        $total = Article::getCount();
        $pager = Paginator::make(array(),$total,$pageSize);
        $pager->appends($search);
        $data['pagelinks'] = $pager->links();
        return $this->display('article-list', $data);
    }

    public function getAdd()
    {
        $data = array();
        return $this->display('article-add', $data);
    }
    
    public function postAdd()
    {
        $input = Input::only('title', 'content');

        $data['title'] = $input['title'];
        $data['summary'] = $input['summary'];
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
        return $this->display('article-edit', $data);
    }

    public function postEdit()
    {
        $input = Input::only('id', 'title', 'content');
        
        $data['arid'] = $input['id'];
        $data['title'] = $input['title'];
        $data['summary'] = $input['summary'];
        $data['content'] = $input['content'];

        $result = Article::save($data);
        
        if ($result) {
            return $this->redirect('article/article/list')->with('global_tips', '保存成功');
        } else {
            return $this->back('保存失败');
        }
    }

    public function getCommentlist()
    {
        $data = array();
        $pageIndex = Input::get('page',1);
        $pageSize = 10;
        $search = Input::only('pid','content');
        $search['type'] = 1;

        $data['datalist'] = Comment::getList($search,$pageIndex,$pageSize);
        $data['search'] = $search;
        $total = Comment::getCount($search);
        $pager = Paginator::make(array(),$total,$pageSize);
        $pager->appends($search);
        $data['pagelinks'] = $pager->links();
        return $this->display('comment-list', $data);
    }
}