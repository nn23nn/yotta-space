<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request, Config;
use App\Services\ActionLog\Mark;
use App\Services\MCAManager;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 当前方法
     */
    protected $mca;

    public function __construct() 
    {
        $this->getMCAManager();
    }

    /**
     * 启用操作日志记录
     */
    protected function setActionLog($extDatas = [])
    {	
        return app()->make(Mark::BIND_NAME)->setMarkYes()->setExtDatas($extDatas);
    }

    /**
     * 获取路由
     */
    protected function getMCAManager()
    {
        $this->initMCAManager();
        $this->mca                 = app()->make(MCAManager::MAC_BIND_NAME);
        $routeParams               = \Route::current()->getActionName();
        list($controller, $action) = explode('@', $routeParams);
        $this->mca->setRouteParams($routeParams);
        $this->mca->setController($controller);
        $this->mca->setAction($action);
        return $this->mca;
    }

    /**
     * 获取路由
     */
    protected function initMCAManager()
    {
        $mca = new MCAManager();
        if (!app()->bound(MCAManager::MAC_BIND_NAME)) {
            app()->singleton(MCAManager::MAC_BIND_NAME, function () use ($mca) {
                return $mca;
            });
        }
    }
}
