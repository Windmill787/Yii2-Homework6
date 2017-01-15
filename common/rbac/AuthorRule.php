<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.01.17
 * Time: 20:27
 */

namespace common\rbac;

use yii\rbac\Item;
use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated width.
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['commentary']) ? $params['commentary']->createdBy == $user : false;
    }
}