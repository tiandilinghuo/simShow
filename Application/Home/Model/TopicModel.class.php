<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 14:37
 */
namespace Home\Model;

use Think\Model;
use Think\Model\ViewModel;

class TopicModel extends Model {
    protected $connection = 'DB_CONFIG3';
    protected $tableName='hl_admin';
}