<?php

namespace App\Services;

use App\Models\Category;
use Request;

class CategoryService extends BaseService {
	public function getList() {
		Request::flash();
		$field = Request::input('field', 'name');
		$value = Request::input('value');
		$orderBy = Request::input('orderBy', 'id');
		$sort = Request::input('sort', 'desc');

		$page = (int) Request::input('page', 1);
		$length = (int) Request::input('length', 10);
		$start = ($page - 1) * $length;

		$likeMethod = 'like' . ucfirst(camel_case($field));

		$permissions = Category::$likeMethod($value)->orderBy($orderBy, $sort)->skip($start)->paginate($length);

		return $permissions;
	}

	public function find($id) {
		return Category::find((int) $id);
	}

	public function destroy() {
		$ids = Request::input('ids', 0);
		return $ids && Category::destroy($ids);
	}

	public function save($request) {
		$categoryId = $request->input('id', 0);
		$category = Category::firstOrNew(['id' => $categoryId]);
		$category->parent_id = $request->pid;
		$category->name = $request->name;
		$category->alias = $request->alias;
		$category->status = (boolean) $request->status;
		$category->save();

		return $category;
	}

	public function fueluxTree($pid = 0, $selectedIds = []) {
		$parentId = $pid ? $pid : Request::input('pid', 0);
		$subCategories = Category::where('parent_id', (int) $parentId)->get();

		$selectedTop = empty($selectedIds) || in_array(0, $selectedIds);
		$data = $pid ? [] : [['text' => '顶级分类', 'type' => 'item', 'attr' => ['id' => 0, 'cssClass' => 'text-left', 'selected' => $selectedTop]]];

		foreach ($subCategories as $key => $val) {
			$children = $this->fueluxTree($val->id, $selectedIds);
			$hasChildren = count($children) > 0;
			$attr = ['id' => $val->id, 'hasChildren' => $hasChildren, 'cssClass' => 'text-left'];
			$node = ['text' => $val->name, 'type' => $hasChildren ? 'folder' : 'item', 'attr' => $attr, 'selected' => in_array($val->id, $selectedIds)];
			$hasChildren && $node['children'] = $children;
			$data[] = $node;
		}

		return $data;
	}

	public function selectTagTree() {
		$allCats = Category::all()->toArray();
		return $this->selectTagTreeWrapper($allCats);
	}
}
