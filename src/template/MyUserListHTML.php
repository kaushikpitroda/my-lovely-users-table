<?php

declare(strict_types=1);

namespace Inpsyde\template;

// -*- coding: utf-8 -*-

class MyUserListHTML
{
    /**
     * Get List of Users
     * @return text
     */
    public function getUserListHTML($userList)
    {
        try {
            $userHtml = '<table width="100%" cellpadding="0" cellspacing="0">';
            $userHtml .= '<tr><td><b>ID</b></td><td><b>Name</b></td><td><b>Username</b></td></tr>';
            foreach ($userList as $users) {
                $userHtml .= '<tr>';
                $userHtml .= '<td><a href="#" onclick="return makeRequest(' . $users->id . ');" >' . $users->id . '</a></td>';
                $userHtml .= '<td><a href="#" onclick="return makeRequest(' . $users->id . ');">' . $users->name . '</a></td>';
                $userHtml .= '<td><a href="#" onclick="return makeRequest(' . $users->id . ');">' . $users->username . '</a></td>';
                $userHtml .= '</tr>';
            }
            $userHtml .= '</table>';
            $userHtml .= '<table width="100%" cellpadding="2" cellspacing="2">';
            $userHtml .= '<tr><td><div id="userDetailSection"></div></td></tr>';
            $userHtml .= '</table>';
            return $userHtml;
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
