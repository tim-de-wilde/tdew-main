<?php
namespace tdewmain\src\Modules\Login\Controllers;

use tdewmain\src\Helpers\AbstractController;
use tdewmain\src\Helpers\PageResponse;
use User\Map\UserTableMap;
use User\UserQuery;

/**
 * Class Register
 *
 * @package tdewmain\src\Modules\Login\Controllers
 */
class Register extends AbstractController
{

    /**
     * @return PageResponse
     */
    public function show(): PageResponse
    {
        $vars = $this->pageVars;

        $fieldKeys = [
            'register-name',
            'register-pass',
            'register-email'
        ];

        foreach ($fieldKeys as $fieldKey) {
            if (!\array_key_exists($fieldKey, $vars)) {
                echo 'false';
                die();
            }
        }

        $response = 'true';

        $query = UserQuery::create()
            ->filterByUsername($vars['register-name'])
            ->filterByEmail($vars['register-email']);

        if ($query->exists()) {
            $response = 'exists';
        } else {
            $query
                ->filterByPassword(password_hash($vars['register-pass'], PASSWORD_DEFAULT))
                ->filterByPermissions(UserTableMap::COL_PERMISSIONS_USER)
                ->findOneOrCreate()->save();


        }

        echo $response;
        die();
    }
}
