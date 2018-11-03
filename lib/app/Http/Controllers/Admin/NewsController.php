<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Business\Entity\News\NewsEntity;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct(NewsEntity $news)
    {
        $this->news = $news;
    }
    public function getList()
    {
        $news=  $this->news->all(15);
        if($news== true)
        {
            return view('admin.news.list',
                ["news" => $news]);
        }
        else
        {
            $message = $this->news->errors()?:$this->news->errorQuery();
            Session::flash('error', $message);
            $news = [];
            return view('admin.news.list',
                ["news" => $news]);
        }

    }

    public function getFind($id)
    {
        $news=  $this->news->find($id);
        if($news== true)
        {
            Session::flash('message', 'find success');
            return view('admin.news.find',
                ["news" => $news]);
        }
        else
        {
            $message = $this->news->errors()?:$this->news->errorQuery();
            Session::flash('error', $message);
            return redirect('admin/news/');
        }

    }
    public function getCreate()
    {
        return view('admin.news.create');
    }

    public function postCreate(Request $request)
    {
        $data = [
            'news_detail_title'=>$request->title,
            'news_detail_desciption'=>$request->description,
            'news_detail_content' => $request->contents,
            'news_keyword' => $request->keword,
            'news_tag' => $request->tags,
            'news_slug' => $request->slug,
            'news_avatar' => $request->avatar,
            'news_categories' => $request->categories,
            'news_publish' => $request->publish,
            'news_status' => $request->status,
            'news_link1' => $request->link3,
            'news_link2' => $request->link2,
            'news_link3' => $request->link3,
            'news_lang_code' => $request->lang_code,
        ];
        $news=  $this->news->create($data);
        if($news== true)
        {
            Session::flash('message', 'Create new categoriess success');
            return redirect('admin/news/');
        }
        else
        {
            $messageQuery = $this->news->errorQuery();
            $message = $this->news->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            return view('admin.news.create');
        }
    }

    public function getUpdate($id)
    {
        $news_catagories_destail=  $this->news->find($id);
        return view('admin.news.update',['news_catagories_destail'=>$news_catagories_destail]);
    }

    public function postUpdate(Request $request ,$id)
    {
        $data = [
            'id' => $id,
            'news_detail_title'=>$request->title,
            'news_detail_desciption'=>$request->description,
            'news_detail_content' => $request->contents,
            'news_keyword' => $request->keword,
            'news_tag' => $request->tags,
            'news_slug' => $request->slug,
            'news_avatar' => $request->avatar,
            'news_categories' => $request->categories,
            'news_publish' => $request->publish,
            'news_status' => $request->status,
            'news_link1' => $request->link3,
            'news_link2' => $request->link2,
            'news_link3' => $request->link3,
            'news_lang_code' => $request->lang_code,
        ];
        $news=  $this->news->update($data);
        if($news== true)
        {
            Session::flash('message', 'Update categorie ssuccess');
            return redirect('admin/news/');
        }
        else
        {
            $message = $this->news->errors()?:$this->news->errorQuery();
            Session::flash('error', $message);
            return view('admin.news.update');
        }
    }

    public function getAllTrash()
    {
        $categories_trash=  $this->news->allTrash(15);
        return view('admin.news.trash',['categories_trash'=>$categories_trash]);
    }

    public function getRecover($id)
    {
        $news=  $this->news->trash($id,false);
        return redirect('admin/news/all-trash');
    }
    public function getTrash($id)
    {
        $news=  $this->news->trash($id);
        return redirect('admin/news/');
    }

    public function getDelete($id)
    {
        $news=  $this->news->delete($id);
        return redirect('admin/news/all-trash');
    }
}
