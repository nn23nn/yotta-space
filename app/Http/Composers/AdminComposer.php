<?php

namespace App\Http\Composers;
use Config;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Fluent;
use Request;

class AdminComposer {
	/**
	 * The user repository implementation.
	 *
	 * @var UserRepository
	 */
	protected $users;

	/**
	 * Create a new profile composer.
	 *
	 * @param  UserRepository  $users
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * 绑定数据到视图
	 *
	 * @param  View $view
	 * @return void
	 */
	public function compose(View $view) {
		// $menus = $this->request->is('admin/account*') ? config('menu.account') : config('menu.func');

		$global = new Fluent();
		// $global->user = Auth::user();
		// $global->menus = $menus;
		// $global->current_account = app('viease.current_account');
		// $global->accounts = $this->accountRepository->lists(99);

		extract(get_current_action());
		$global->uri = Request::path();
		$global->url = Request::url();
		$global->controller = $controller;
		$global->method = $method;
		// pjax使用了fragment，这个变量暂时没用
		$global->isPjax = Request::header('X-PJAX', false);

		$global->seo = [
			'title' => Config::get("seo.seo.{$controller}.{$method}.title", "后台管理系统"),
			'keywords' => Config::get("seo.seo.{$controller}.{$method}.description", ""),
			'description' => Config::get("seo.seo.{$controller}.{$method}.keywords", ""),
		];

		$view->with('global', $global);
	}
}