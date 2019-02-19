<?php 
namespace app\admin\model;

use think\Model;


class AuthGroup extends Model
{
 
    // 静态方法，查询所有数据
    // sql:select * from _auth_group;
    public static function getAuthGroupList()
    {
        return self::select();
    }
    
    public static function createAuthGroup($data)
    {
        self::create($data);
        return ["data"=>""];
    }
    
    public static function editAuthGroup($data)
    {
        self::update($data);
        return ["data"=>""];
    }
    
    public static function deleteAuthGroup($data)
    {
        self::destroy($data);
        return ["data"=>""];
    }
    
    public static function queryAuthGroup($data)
    {
        //pass
    }
}