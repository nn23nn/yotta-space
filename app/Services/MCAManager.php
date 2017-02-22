<?php 
namespace App\Services;

use Config;

/**
 * 主要用来储存当前请求的模块、类、函数
 */
class MCAManager {

    /**
     * 当前类绑定到容器中的标识
     *
     * @var string
     */
    CONST MAC_BIND_NAME = 'mac';

    /**
     * 当前请求的类
     * 
     * @var string
     */
    private $controller;

    /**
     * 当前请求的函数
     * 
     * @var string
     */
    private $action;

    /**
     * 当前请求的函数
     * 
     * @var string
     */
    private $routeParmas;

    /**
     * 当前请求所对应的详细的功能信息
     * 
     * @var array
     */
    private $currentMCA;

    /**
     * set current action
     * 
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * set current controller
     * 
     * @param string $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * get current action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * get current controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * set current RouteParams
     */
    public function setRouteParams($params)
    {
        $this->routeParmas = $params;
        return $this;
    }

    /**
     * get current RouteParmas
     */
    public function getRouteParams($key = NULL)
    {
        if(!$key) return $this->routeParmas;
        return $this->routeParmas[$key];
    }

    /**
     * 
     * 取得当前的操作的功能信息
     * @return array 功能信息
     */
    public function getCurrentMCAInfo()
    {
        return $this->currentMCAInfo();
    }
}