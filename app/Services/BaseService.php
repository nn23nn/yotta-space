<?php

namespace App\Services;

use App\Services\Qiniu;

class BaseService
{

    protected function jqGridSearch($query, $filters)
    {
        if (empty($filters) || !isset($filters->groupOp)) {
            return $query;
        }
        $isor  = $filters->groupOp == 'OR';
        $where = $isor ? 'orWhere' : 'where';
        foreach ($filters->rules as $val) {
            switch ($val->op) {
                case 'eq':
                    $query = $query->$where($val->field, '=', $val->data);
                    break;
                case 'ne':
                    $query = $query->$where($val->field, '!=', $val->data);
                    break;
                case 'lt':
                    $query = $query->$where($val->field, '<', $val->data);
                    break;
                case 'le':
                    $query = $query->$where($val->field, '<=', $val->data);
                    break;
                case 'gt':
                    $query = $query->$where($val->field, '>', $val->data);
                    break;
                case 'ge':
                    $query = $query->$where($val->field, '>=', $val->data);
                    break;
                case 'bw':
                    $query = $query->$where($val->field, 'like', "{$val->data}%");
                    break;
                case 'bn':
                    $query = $query->$where($val->field, 'not like', "{$val->data}%");
                    break;
                case 'ew':
                    $query = $query->$where($val->field, 'like', "%{$val->data}");
                    break;
                case 'en':
                    $query = $query->$where($val->field, 'not like', "%{$val->data}");
                    break;
                case 'cn':
                    $query = $query->$where($val->field, 'like', "%{$val->data}%");
                    break;
                case 'nc':
                    $query = $query->$where($val->field, 'not like', "%{$val->data}%");
                    break;
                case 'nu':
                    $query = $isor ? $query->orWhereNull($val->field, 'or') : $query->whereNull($val->field, 'and');
                    break;
                case 'nn':
                    $query = $isor ? $query->orWhereNotNull($val->field, 'or') : $query->whereNotNull($val->field, 'and');
                    break;
                case 'in':
                    $query = $isor ? $query->orWhereIn($val->field, explode(',', $val->data), 'or') : $query->whereIn($val->field, explode(',', $val->data), 'and');
                    break;
                case 'ni':
                    $query = $isor ? $query->orWhereNotIn($val->field, explode(',', $val->data), 'or') : $query->whereNotIn($val->field, explode(',', $val->data), 'and');
                    break;
            }
        }
        return $query;
    }

    public function selectTagTreeWrapper($list, $pid = 0, $level = 0, $html = '┆┄')
    {
        static $tree = [];

        foreach ($list as $val) {
            if ($val['parent_id'] == $pid) {
                $val['level'] = $level;
                $val['html']  = str_repeat($html, $level);
                $tree[]       = $val;
                $this->selectTagTreeWrapper($list, $val['id'], $level + 1);
            }
        }
        return $tree;
    }

    /**
     * 上传图片
     *
     * @var object
     */
    public function upload($formname = 'name', $allowed_extensions = ["JPG", "png", "jpg", "gif"])
    {
        if ($file = $this->getRequestFile($formname, $allowed_extensions)) {

            $qiniu = new Qiniu;
            $qiniu->getDisk()->put($file['fileName'], $file['contents']);
            return ['filePath' => $file['fileName']];
        } else {
            return false;
        }
    }

    /**
     * 获取请求文件信息
     *
     * @var object
     */
    public function getRequestFile($formname, $allowed_extensions)
    {
        if ($file = \Request::file($formname)) {
            if ($allowed_extensions && is_array($allowed_extensions)) {
                if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                    return false;
                }
            }
            return [
                'fileName'  => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension() ?: 'png',
                'contents'  => file_get_contents($_FILES[$formname]['tmp_name']),
            ];
        }
        return false;
    }
}
