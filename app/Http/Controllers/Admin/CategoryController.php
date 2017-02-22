<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $data['categorys'] = $this->categoryService->getList();
        return view('admin.category.list', $data);
    }

    public function create()
    {
        $data['categories'] = $this->categoryService->selectTagTree();
        $json['content']    = (string) view('admin.category.add', $data);
        return response()->json($json);
    }

    public function edit(Category $category)
    {
        $data['category']   = $category;
        $data['categories'] = $this->categoryService->selectTagTree();
        $json['content']    = (string) view('admin.category.edit', $data);
        return response()->json($json);
    }

    public function save(CategoryRequest $request)
    {
        $category = $this->categoryService->save($request);
        return response()->json($category);
    }

    public function destroy()
    {
        $result = $this->categoryService->destroy();
        $data   = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];
        return response()->json($data);
    }

    public function treeview()
    {
        $json['content'] = (string) view('admin.category.tree');
        return response()->json($json);
    }

    public function treedata(Request $request)
    {
        $selectedItems = $request->input('sids', []);
        $data          = $this->categoryService->fueluxTree(0, $selectedItems);
        return response()->json($data);
    }
}
