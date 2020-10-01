<?php
/**
 * Project: Gravatar 4 SMF
 * Version: 1.3
 * File: Mod-Gravatar.php
 * Author: digger
 * License: The MIT License (MIT)
 */

if (!defined('SMF')) {
    die('Hacking attempt...');
}

/**
 * Load all needed hooks
 */
function loadGravatarHooks()
{
    add_integration_function('integrate_admin_areas', 'addGravatarAdminArea', false);
    add_integration_function('integrate_modify_modifications', 'addGravatarAdminAction', false);
    add_integration_function('integrate_load_theme', 'addGravatarForCurrentUser', false);
    add_integration_function('integrate_menu_buttons', 'addGravatarForCurrentUserProfile', false);
    add_integration_function('integrate_menu_buttons', 'addGravatarsForUsers', false);
    add_integration_function('integrate_menu_buttons', 'addGravatarCopyright', false);
}

/**
 * Add mod admin area
 * @param $admin_areas
 */
function addGravatarAdminArea(&$admin_areas)
{
    global $txt;
    loadLanguage('Gravatar/Gravatar');

    $admin_areas['config']['areas']['modsettings']['subsections']['gravatar'] = array($txt['gravatar_admin_menu']);
}

/**
 * Add mod admin area JS
 */
function loadGravatarAdminJS()
{
    global $context;

    $context['insert_after_template'] .= "
                <script type='text/javascript'><!-- // --><![CDATA[
                    function updateGravatar(){
                    var gravatarType = document.getElementById('gravatar_style').value;
                    if (gravatarType == 'custom') gravatarType = document.getElementById('gravatar_style_custom_url').value;
                    document.getElementById('gravatar_example').src='http://gravatar.com/avatar/00000000000000000000000000000000?d=' + gravatarType + '&amp;s=65';
		            };
                // ]]></script>";

}

/**
 * Add mod admin action
 * @param $subActions
 */
function addGravatarAdminAction(&$subActions)
{
    $subActions['gravatar'] = 'addGravatarAdminSettings';
}

/**
 * Add mod settings area
 * @param bool $return_config
 * @return array
 */
function addGravatarAdminSettings($return_config = false)
{
    global $txt, $scripturl, $context, $modSettings;
    loadLanguage('Gravatar/Gravatar');
    loadGravatarAdminJS();

    $context['page_title'] = $context['settings_title'] = $txt['gravatar_admin_menu'];
    $context['post_url'] = $scripturl . '?action=admin;area=modsettings;save;sa=gravatar';
    $context['settings_message'] = $txt['gravatar_description'];

    $config_vars = array(
        array('check', 'gravatar_enabled'),
        array('check', 'gravatar_forced', 'subtext' => $txt['gravatar_forced_help'],),
        array(
            'select',
            'gravatar_rating',
            array(
                'g' => $txt['gravatar_rating_g'],
                'pg' => $txt['gravatar_rating_pg'],
                'r' => $txt['gravatar_rating_r'],
                'x' => $txt['gravatar_rating_x'],
            ),
            'subtext' => $txt['gravatar_rating_help'],
        ),
        array(
            'select',
            'gravatar_style',
            array(
                'wavatar' => $txt['gravatar_style_wavatar'],
                'identicon' => $txt['gravatar_style_identicon'],
                'monsterid' => $txt['gravatar_style_monsterid'],
                'retro' => $txt['gravatar_style_retro'],
                'mm' => $txt['gravatar_style_mm'],
                'robohash' => $txt['gravatar_style_robohash'],
                'blank' => $txt['gravatar_style_blank'],
                'custom' => $txt['gravatar_style_custom'],
            ),
            'subtext' => $txt['gravatar_style_help'],
            'postinput' => '<div style="margin-top: 3px;"><img id="gravatar_example" src="//gravatar.com/avatar/00000000000000000000000000000000?d=' .
                (($modSettings['gravatar_style'] == 'custom' && !empty($modSettings['gravatar_style_custom_url'])) ? urlencode($modSettings['gravatar_style_custom_url']) : ((!empty($modSettings['gravatar_style']) && $modSettings['gravatar_style'] != 'custom') ? $modSettings['gravatar_style'] : ''))
                . '&amp;s=65" alt="" /></div>',
            'javascript' => 'onchange="updateGravatar()"',
        ),
        array('large_text', 'gravatar_style_custom_url', 'subtext' => $txt['gravatar_style_custom_url_help']),
    );

    if ($return_config) {
        return $config_vars;
    }

    if (isset($_GET['save'])) {
        checkSession();
        $save_vars = $config_vars;
        saveDBSettings($save_vars);
        redirectexit('action=admin;area=modsettings;sa=gravatar');
    }

    prepareDBSettingContext($config_vars);
}

/**
 * Get gravatar by email
 * @param string $email
 * @param bool $image swe need img tag
 * @return string gravatar link or image
 */
function getGravatar($email = '', $image = false)
{
    global $smcFunc, $modSettings, $forum_version;

    // We can enable https avatars only for SMF 2.0.14 and above.
    $forum_version_int = (int)str_replace('.', '', trim($smcFunc['substr']($forum_version, 3)));

    $gravatarHash = md5(strtolower($email));
    $gravatarStyle = ($modSettings['gravatar_style'] == 'custom' && !empty($modSettings['gravatar_style_custom_url'])) ? urlencode($modSettings['gravatar_style_custom_url']) : ((!empty($modSettings['gravatar_style']) && $modSettings['gravatar_style'] != 'custom') ? $modSettings['gravatar_style'] : '');
    $gravatarRating = !empty($modSettings['gravatar_rating']) ? $modSettings['gravatar_rating'] : 'g';
    $gravatarWidth = !empty($modSettings['avatar_max_width_external']) ? $modSettings['avatar_max_width_external'] : 65;
    $gravatarHeight = !empty($modSettings['avatar_max_height_external']) ? $modSettings['avatar_max_height_external'] : 65;
    $gravatarSize = $gravatarWidth < $gravatarHeight ? $gravatarWidth : $gravatarHeight;
    $gravatar = ($forum_version_int >= 2014 ? 'https' : 'http') . '://gravatar.com/avatar/' . $gravatarHash . '?d=' . $gravatarStyle . '&amp;s=' . $gravatarSize . '&amp;r=' . $gravatarRating;

    if ($image) {
        $gravatar = '<img class="avatar" src="' . $gravatar . '" alt="" />';
    }

    return $gravatar;
}

/**
 * Add gravatar to forum header for current member
 * @return bool
 */
function addGravatarForCurrentUser()
{
    global $modSettings, $user_info;

    if (!empty($modSettings['gravatar_enabled']) && ((empty($user_info['avatar']['url']) && empty($user_info['avatar']['filename'])) || !empty($modSettings['gravatar_forced']))) {
        $user_info['avatar']['url'] = getGravatar($user_info['email']);
    } else {
        return false;
    }
}

/**
 * Add gravatar to current member profile
 * @return bool
 */
function addGravatarForCurrentUserProfile()
{
    global $modSettings, $context;

    if (!empty($modSettings['gravatar_enabled']) && !empty($context['member']) && (empty($context['member']['avatar']['image']) || !empty($modSettings['gravatar_forced']))) {
        $context['member']['avatar']['image'] = getGravatar($context['member']['email'], true);
    } else {
        return false;
    }
}

/**
 * Add gravatars for this topic page members
 * @return bool
 */
function addGravatarsForUsers()
{
    global $modSettings, $user_profile;

    if (empty($modSettings['gravatar_enabled']) || empty($user_profile)) {
        return false;
    }

    foreach (array_keys($user_profile) as $user_id) {
        if (((empty($user_profile[$user_id]['avatar']) && empty($user_profile[$user_id]['filename'])) || !empty($modSettings['gravatar_forced'])) && !empty($user_profile[$user_id]['email_address'])) {
            $user_profile[$user_id]['avatar'] = getGravatar($user_profile[$user_id]['email_address']);
        }
    }
}

/**
 * Add mod copyright to the forum credits page
 */
function addGravatarCopyright()
{
    global $context;

    if ($context['current_action'] == 'credits') {
        $context['copyrights']['mods'][] = '<a href="https://mysmf.net/mods/gravatar-4-smf" target="_blank">Gravatar 4 SMF</a> &copy; 2010-2020, digger';
    }
}
