<?php

declare(strict_types=1);

// -*- coding: utf-8 -*-

namespace Inpsyde;

class MyUserDetails
{
    /**
     * @var webApiUrl
     */
    protected $webApiUrl = 'https://jsonplaceholder.typicode.com/users/';
    /**
     * Get API Call
     * @return userJsonArray
     */
    public function getApiCall($userId)
    {
        $response = wp_remote_get($this->webApiUrl . $userId);
        $userResponse = wp_remote_retrieve_body($response);
        $userJsonArray = json_decode($userResponse);
        return $userJsonArray;
    }
}
