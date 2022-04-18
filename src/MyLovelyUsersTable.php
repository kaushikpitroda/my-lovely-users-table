<?php

declare(strict_types=1);

// -*- coding: utf-8 -*-

namespace Inpsyde;

use Inpsyde\MyUserListTable;
use Inpsyde\MyUserDetails;
use Inpsyde\template\MyUserListHTML;
use Inpsyde\template\MyUserDetailHTML;

/**
 * Class MyLovelyUsersTable
 *
 * @package Inpsyde
 */
final class MyLovelyUsersTable
{
/**
     * @var pagename
     */

    protected $pagename = null;

    /**
     * @var userId
     */

    protected $userId = null;
/**
     * @var instance
     */
    protected static $instance = null;

    public static function getInstance()
    {

        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

	/**
     * Get Frontend Javascript file
     * @return js file path
     */
    public function enqueueUsersFrontendScript()
    {
        global $wp;
        wp_enqueue_script('users-script', plugin_dir_url(__FILE__) . 'js/' .
        'lovely-user-table.js', null, null, true);
        $currentUrl = home_url($wp->request);
        $variables = [
            'ajaxurl' =>  $currentUrl,
        ];
        wp_localize_script('users-script', "users", $variables);
    }

	/**
     * Change Rewrite path
     */
    public function usersRewriteRules()
    {
        add_rewrite_rule('my-lovely-users-table/?([^/]*)', 'index.php?pagename=my-lovely-users-table&userId=$matches[1]', 'top');
    }

	/**
     * Load user list and user details
     * @return user's template in html
     */
    function usersPluginDisplay()
    {
        $this->pageName = get_query_var('pagename');
        $this->userId = get_query_var('userId');
        if ('my-lovely-users-table' == $this->pageName) {
            if ($this->userId != '') {
                add_filter('template_include', static function () {

                    $userId = get_query_var('userId');
                    $userInfo = new MyUserDetails();
                    $jsonArray = $userInfo->getApiCall($userId);
                    $userDetails = new MyUserDetailHTML();
                    echo $userDetails->getUserDetailHTML($jsonArray, $userId);
                    return false;
                });
            } else {
                    add_filter('template_include', static function () {

                        get_header();
                        $users = new MyUserListTable();
                        $usersHTML = new MyUserListHTML();
                        $json = $users->getUserListAPICall();
                        echo $usersHTML->getUserListHTML($json);
                        get_footer();
                        return false;
                    });
            }
        }
    }

	/**
     * Call different action and filter for displaying plugin
     */
    public function pluginsOnLoad()
    {
        add_action('init', [$this, 'usersRewriteRules']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueUsersFrontendScript']);
        add_filter('template_redirect', [$this, 'users404Override']);
        add_filter('template_redirect', [$this, 'usersPluginDisplay']);
        add_filter('query_vars', [$this, 'usersPluginQueryVars']);
    }

	/**
     * Override 404
     * @return bool
     */
    public function users404Override()
    {
        global $wp_query;
        $pagename = get_query_var('pagename');
        $userId = get_query_var('userId');
        if ('my-lovely-users-table' == $pagename) {
            status_header(200);
            $wp_query->is_404 = false;
        }
        return true;
    }

	/**
     * Get query string parameters
     * @return string
     */
    public function usersPluginQueryVars($vars)
    {
        $vars[] = 'userId';
        return $vars;
    }
}
