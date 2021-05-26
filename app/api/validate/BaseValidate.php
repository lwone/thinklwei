<?php

namespace app\api\validate;
use think\facade\Db;
use think\Validate;

class BaseValidate extends Validate
{
    public function __construct()
    {
        parent::__construct();
        $params = $this->request->param();
        foreach ($params as $field => $param) {
            //支持数组验证
            if (is_array($param) && isset($param[0]) && is_array($param[0])) {
                $validateFields = [];
                $removeFields = [];
                foreach ($this->rule as $key => $rule) {
                    if (strstr($key, $field . '.')) {
                        $validateFields[] = $key;
                        $removeFields[$key] = true;
                    }
                }
                $validate = clone $this;
                foreach ($param as $item) {
                    $valdateData[$field] = $item;
                    $validate->only($validateFields)->failException()->check($valdateData);
                }
                $this->remove($removeFields);
            }
        }
        $this->failException()->check($params);
    }
    public function data(){
        return $this->request->param();
    }
    //验证当前请求的字段值是否存在表中，用法和unique一样
    protected function exist($value,$rule,$data,$field){
        if (is_string($rule)) {
            $rule = explode(',', $rule);
        }

        if (false !== strpos($rule[0], '\\')) {
            // 指定模型类
            $db = new $rule[0];
        } else {
            $db = Db::name($rule[0]);
        }

        $key = isset($rule[1]) ? $rule[1] : $field;

        if (strpos($key, '^')) {
            // 支持多个字段验证
            $fields = explode('^', $key);
            foreach ($fields as $key) {
                if (isset($data[$key])) {
                    $map[] = [$key, '=', $data[$key]];
                }
            }
        } elseif (strpos($key, '=')) {
            parse_str($key, $map);
        } elseif (isset($data[$field])) {
            $map[] = [$key, '=', $data[$field]];
        } else {
            $map = [];
        }

        $pk = !empty($rule[3]) ? $rule[3] : $db->getPk();

        if (is_string($pk)) {
            if (isset($rule[2])) {
                $map[] = [$pk, '<>', $rule[2]];
            } elseif (isset($data[$pk])) {
                $map[] = [$pk, '<>', $data[$pk]];
            }
        }

        if ($db->where($map)->field($pk)->find()) {
            return true;
        }

        return false;
    }
}
