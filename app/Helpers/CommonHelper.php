<?php

/**
 * 获取当前控制器名
 *
 * @return string
 */
function get_current_controller_name()
{
    return get_current_action()['controller'];
}

/**
 * 获取当前方法名
 *
 * @return string
 */
function get_current_method_name()
{
    return get_current_action()['method'];
}

/**
 * 获取当前控制器与方法
 *
 * @return array
 */
function get_current_action()
{
    $action = \Route::current()->getActionName();
    list($class, $method) = explode('@', $action);

    return ['controller' => $class, 'method' => $method];
}