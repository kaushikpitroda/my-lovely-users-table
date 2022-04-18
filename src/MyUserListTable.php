<?php

declare(strict_types=1);

namespace Inpsyde;

// -*- coding: utf-8 -*-

class MyUserListTable
{
    /**
     * @var webApi
     */
    protected $webApi = 'https://jsonplaceholder.typicode.com/users';
    /**
     * Get API Call
     * @return JSON
     */
    public function getUserListAPICall()
    {
        $response = wp_remote_get($this->webApi);
        $userResponse = wp_remote_retrieve_body($response);
        $userList = json_decode($userResponse);
        return $userList;
    }
}
