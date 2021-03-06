<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 12:25
 */

namespace CorpWeChat\Response\User;

use CorpWeChat\Models\User;
use CorpWeChat\Response\JsonResponse;

/**
 * Class SimpleListResponse
 * @package CorpWeChat\Response\User
 */
class SimpleListResponse extends JsonResponse
{
    protected static $allowFields = ['userlist'];
    protected static $requiredFields = ['userlist'];

    /**
     * @var User[]
     */
    protected $list = [];

    /**
     * @return User[]
     */
    public function getUserList()
    {
        return $this->list;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        foreach ($this->jsonData['userlist'] as $item) {
            $user = new User();
            $user->setUserId($item['userid'])
                ->setName($item['name'])
                ->setDepartment($item['department']);
            $this->list[] = $user;
        }
    }
}
