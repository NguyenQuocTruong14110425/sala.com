<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Business\Entity\NewsCategories\NewsCategoriesEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsCategoriesController extends Controller
{
    public function __construct(NewsCategoriesEntity $categories)
    {
        $this->categories = $categories;
    }
    public function getList()
    {
        $categories=  $this->categories->all(15);
        if($categories== true)
        {
            return view('admin.categories.list',
                ["categories" => $categories,
                 ]);
        }
        else
        {
            $message = $this->categories->errors()?:$this->categories->errorQuery();
            Session::flash('error', $message);
            $categories = [];
            return view('admin.categories.list',
                ["categories" => $categories]);
        }

    }

    public function getFind($id)
    {
        $categories=  $this->categories->find($id);
        if($categories== true)
        {
            Session::flash('message', 'find success');
            return view('admin.categories.find',
                ["categories" => $categories]);
        }
        else
        {
            $message = $this->categories->errors()?:$this->categories->errorQuery();
            Session::flash('error', $message);
            return redirect('admin/categories/');
        }

    }
    public function getCreate()
    {
        return view('admin.categories.create');
    }

    public function postCreate(Request $request)
    {
        $data = [
            'news_categories_title'=>$request->title,
            'news_categories_description'=>$request->description,
            'news_categories_keyword' => $request->keyword,
            'news_categories_avatar' => $request->avatar,
            'news_categories_tags' => $request->tags,
            'news_categories_lang_code' => $request->lang_code
        ];
        $categories=  $this->categories->create($data);
        if($categories== true)
        {
            Session::flash('message', 'Create new categoriess success');
            return redirect('admin/categories/');
        }
        else
        {
            $messageQuery = $this->categories->errorQuery();
            $message = $this->categories->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            return view('admin.categories.create');
        }
    }

    public function getUpdate($id)
    {
        $news_catagories_destail=  $this->categories->find($id);
        return view('admin.categories.update',['news_catagories_destail'=>$news_catagories_destail]);
    }

    public function postUpdate(Request $request ,$id)
    {
        $data = [
            'id' => $id,
            'news_categories_title'=>$request->title,
            'news_categories_description'=>$request->description,
            'news_categories_keyword' => $request->keyword,
            'news_categories_avatar' => $request->avatar,
            'news_categories_tags' => $request->tags,
            'news_categories_lang_code' => $request->lang_code
        ];
        $categories=  $this->categories->update($data);
        if($categories== true)
        {
            Session::flash('message', 'Update categorie ssuccess');
            return redirect('admin/categories/');
        }
        else
        {
            $message = $this->categories->errors()?:$this->categories->errorQuery();
            Session::flash('error', $message);
            return view('admin.categories.update');
        }
    }

    public function getAllTrash()
    {
        $categories_trash=  $this->categories->allTrash(15);
        return view('admin.categories.trash',['categories_trash'=>$categories_trash]);
    }

    public function getRecover($id)
    {
        $categories=  $this->categories->trash($id,false);
        return redirect('admin/categories/all-trash');
    }
    public function getTrash($id)
    {
        $categories=  $this->categories->trash($id);
        return redirect('admin/categories/');
    }

    public function getDelete($id)
    {
        $categories=  $this->categories->delete($id);
        return redirect('admin/categories/all-trash');
    }
}
