<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 14:37
 */
namespace Home\Model;
use Think\Model;
class HistoryModel extends Model {
    protected $connection = 'DB_CONFIG2';
    protected $tableName='gj_sys_log';
}