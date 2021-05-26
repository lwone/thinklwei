<?php
namespace app\api\resource;
use League\Fractal\Manager;

/**
 * Class BaseResource
 * @package app\api\resource
 */
class BaseResource
{
    /**
     * 集合数据转换层
     * @param $data
     * @param string $scene 转化场景
     * @return mixed
     */
    public static function collection($data,$scene="toArray")
    {
        $self = new static();
        $resource = new \League\Fractal\Resource\Collection($data, [$self, $scene]);
        $fractal = new Manager();
        $data = $fractal->createData($resource)->toArray();
        return $data['data'];
    }

    /**
     * 数据转换层
     * @param $data
     * @param string $scene 转化场景
     * @return mixed
     */
    public static function item($data,$scene="toArray")
    {
        $self = new static();
        $resource = new \League\Fractal\Resource\Item($data, [$self, $scene]);
        $fractal = new Manager();
        $data = $fractal->createData($resource)->toArray();
        return $data['data'];
    }
}
