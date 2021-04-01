<?php
/**
 * Project: Gravatar 4 SMF
 * File: .english-utf8.php
 * Author: digger
 * License: The MIT License (MIT)
 */

$txt['gravatar_description'] = 'Your Gravatar is an image that follows you from site to site appearing beside your name when you do things like comment or post on a blog. Avatars help identify your posts on blogs and web forums, so why not on any site?
Gravatars are globally recognised avatars. Basically, you upload your avatar to the Gravatar site, and it will automatically appear on all blogs and forums that support Gravatar. Whenever you change your avatar, it will automatically change on all Gravatar-enabled sites. Gravatars associated with the users email addresses.<br><br>

How this mod works:<br>
If the "Enable gravatar" option is enabled, Gravatar will be used for all members who have not set an forum avatar. If a member have uploaded Gravatar at http://gravatar.com , it will be used. For any member who don\'t have own Gravatar, unique image will be generated in a given style.<br>  
You can use this mod for setup custom default avatar.<br>
Also you can force Gravatars to be used instead of regular avatars.';
$txt['gravatar_admin_menu'] = 'Gravatar';
$txt['gravatar_enabled'] = 'Enable gravatar';
$txt['gravatar_forced'] = 'Force Gravatars to be used instead of regular avatars';
$txt['gravatar_forced_help'] = 'If option is not selected, gravatars will be used only for members without avatars';
$txt['gravatar_rating'] = 'Image maturity filter';
$txt['gravatar_rating_g'] = 'G';
$txt['gravatar_rating_pg'] = 'PG';
$txt['gravatar_rating_r'] = 'R';
$txt['gravatar_rating_x'] = 'X';
$txt['gravatar_rating_help'] = '
<br />G - suitable for display on all websites with any audience type
<br />PG - may contain rude gestures, provocatively dressed individuals, the lesser swear words, or mild violence
<br />R - may contain such things as harsh profanity, intense violence, nudity, or hard drug use
<br />X - may contain hardcore sexual imagery or extremely disturbing violence';
$txt['gravatar_style'] = 'Select default gravatar style';
$txt['gravatar_style_wavatar'] = 'wavatar';
$txt['gravatar_style_identicon'] = 'identicon';
$txt['gravatar_style_monsterid'] = 'monsterid';
$txt['gravatar_style_retro'] = 'retro';
$txt['gravatar_style_mm'] = 'mistery man';
$txt['gravatar_style_robohash'] = 'robots';
$txt['gravatar_style_robohash2'] = 'other monsters';
$txt['gravatar_style_robohash3'] = 'robot heads';
$txt['gravatar_style_robohash4'] = 'cats';
$txt['gravatar_style_robohash5'] = 'humans';
$txt['gravatar_style_blank'] = 'blank';
$txt['gravatar_style_custom'] = 'custom';
$txt['gravatar_style_help'] = '<br />If a member already have own gravatar at <a href="http://gravatar.com" target="_blank">gravatar.com</a>, it will be used. For members who have not set an avatar, unique images will be generated in a given style. Gravatar size will match the settings for the external forum avatars.
<br /><br />Gravatar styles:
<br />wavatar - generated faces with differing features and backgrounds
<br />identicon - a geometric pattern based on an email hash
<br />monsterid -  a generated monster with different colors, faces, etc
<br />retro - awesome generated, 8-bit arcade-style pixelated faces
<br />mistery man
<br />blank PNG
<br />custom image';
$txt['gravatar_style_custom_url'] = 'Custom image URL';
$txt['gravatar_style_custom_url_help'] = '
<br />MUST be publicly available (e.g. cannot be on an intranet, on a local development machine, behind HTTP Auth or some other firewall etc). Default images are passed through a security scan to avoid malicious content.
<br />MUST be accessible via HTTP or HTTPS on the standard ports, 80 and 443, respectively.
<br />MUST have a recognizable image extension (jpg, jpeg, gif, png).
<br />MUST NOT include a querystring (if it does, it will be ignored).';
