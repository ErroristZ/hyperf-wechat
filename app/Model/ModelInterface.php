<?php

namespace App\Model;
use errorist\Permission\Contract\User;

interface ModelInterface
{
    public static function getFirstById($id);

    public static function getFirstByWhere(array $where, $select = ['*']);

}