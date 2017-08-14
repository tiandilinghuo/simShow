<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 14:37
 */
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
    protected $connection = 'DB_CONFIG1';
    protected $tablePrefix = 'think_';
}