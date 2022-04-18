<?php

declare(strict_types=1);

// -*- coding: utf-8 -*-

namespace Inpsyde\template;

class MyUserDetailHTML
{
    /**
     * Get User Detail
     * @return text
     */
    public function getUserDetailHTML($userDetail, $userId)
    {
        try {
            if (is_object($userDetail)) {
                $userDetailHtml = '<table width="100%" cellpadding="2" cellspacing="2">';
                $userDetailHtml .= '<tr><td colspan="2"><b><u>PERSONAL INFORMATION</u></b></td></tr>';
                $userDetailHtml .= '<tr><td><b>Name</b></td><td>' . $userDetail->name . '</td></tr>';
                $userDetailHtml .= '<tr><td><b>Email</b></td><td>
					<a href="mailto:' . $userDetail->email . '">' . $userDetail->email . '</a></td></tr>';
                $address = (array)$userDetail->address;
                $userDetailHtml .= '<tr><td colspan="2"><b><u>ADDRESS INFORMATION</u></b></td></tr>';
                $userDetailHtml .= '<tr><td><b>Street</b></td><td>' . $address['street'] . '</td></tr>';
                $userDetailHtml .= '<tr><td><b>Suite</b></td><td>' . $address['suite'] . '</td></tr>';
                $userDetailHtml .= '<tr><td><b>City</b></td><td>' . $address['city'] . '</td></tr>';
                $userDetailHtml .= '<tr><td><b>Zipcode</b></td><td>
					' . $address['zipcode'] . '</td></tr>';
                $geoInfo = (array)$address['geo'];
                $userDetailHtml .= '<tr><td><b>Lat</b></td><td>' . $geoInfo['lat'] . '</td></tr>';
                $userDetailHtml .= '<tr><td><b>Lng</b></td><td>' . $geoInfo['lng'] . '</td></tr>';
                $userDetailHtml .= '<tr><td><b>Phone</b></td><td>' . $userDetail->phone . '</td></tr>';
                $userDetailHtml .= '<tr><td><b>Website</b></td><td>
					<a target="_blank" href="http://' . $userDetail->website . '">
					' . $userDetail->website . '</a></td></tr>';
                $company = (array)$userDetail->company;
                $userDetailHtml .= '<tr><td colspan="2"><b><u>COMPANY INFORMATION</u></b></td></tr>';
                $userDetailHtml .= '<tr><td><b>Name</b></td><td>' . $company['name'] . '</td></tr>';
                $userDetailHtml .= '<tr><td><b>Catch Phrase</b></td><td>
					' . $company['catchPhrase'] . '</td></tr>';
                $userDetailHtml .= '<tr><td><b>bs</b></td><td>' . $company['bs'] . '</td></tr>';
                $userDetailHtml .= '</table>';
                return $userDetailHtml;
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
