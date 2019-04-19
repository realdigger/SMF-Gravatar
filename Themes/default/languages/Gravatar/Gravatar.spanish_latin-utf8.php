<?php
/**
 * Project: Gravatar 4 SMF
 * File: .spanish_latin-utf8.php
 * Author: digger
 * License: The MIT License (MIT)
 * Spanish translation https://www.bombercode.net Copyright 2014-2019
 */

$txt['gravatar_description'] = 'El gravatar es una imagen que te sigue de un sitio a otro y aparece junto a tu nombre cuando haces cosas como comentar o publicar en un blog. Los avatares ayudan a identificar tus publicaciones en blogs y foros web, ¿por qué no en cualquier sitio?
Los gravatares son avatares reconocidos mundialmente. Básicamente, subes tu avatar al sitio de gravatar, y aparecerá automáticamente en todos los blogs y foros que admiten Gravatar. Siempre que cambie su avatar, cambiará automáticamente en todos los sitios habilitados para gravatar. gravatars asociados a las direcciones de correo electrónico de los usuarios.<br><br>

Cómo funciona este mod:<br>
Si la opción "Activar gravatar" está habilitada, gravatar se utilizará para todos los miembros que no hayan configurado un avatar en el foro. Si un miembro ha subido gravatar en https://gravatar.com , será utilizado. Para cualquier miembro que no tenga gravatar propio, se generará una imagen única en un estilo determinado.<br>  
Puedes usar este mod para configurar un avatar por defecto personalizado.<br>
También puedes obligar a usar gravatars en lugar de avatares regulares.';
$txt['gravatar_admin_menu'] = 'Gravatar';
$txt['gravatar_enabled'] = 'Activar gravatar';
$txt['gravatar_forced'] = 'Forzar gravatars para ser utilizados en lugar de avatares regulares';
$txt['gravatar_forced_help'] = 'Si la opción no está seleccionada, los gravatars se usarán solo para miembros sin avatares';
$txt['gravatar_rating'] = 'Filtro de madurez de la imagen';
$txt['gravatar_rating_g'] = 'G';
$txt['gravatar_rating_pg'] = 'PG';
$txt['gravatar_rating_r'] = 'R';
$txt['gravatar_rating_x'] = 'X';
$txt['gravatar_rating_help'] = '
<br />G - Apto para su visualización en todos los sitios web con cualquier tipo de audiencia
<br />PG - Puede contener gestos groseros, personas vestidas provocativamente, malas palabras, o violencia leve
<br />R - Puede contener cosas tales como blasfemias duras, violencia intensa, desnudez o uso intenso de drogas
<br />X - Puede contener imágenes sexuales graves o violencia extremadamente inquietante.';
$txt['gravatar_style'] = 'Seleccione el estilo gravatar por defecto';
$txt['gravatar_style_wavatar'] = 'wavatar';
$txt['gravatar_style_identicon'] = 'identicon';
$txt['gravatar_style_monsterid'] = 'monsterid';
$txt['gravatar_style_retro'] = 'retro';
$txt['gravatar_style_mm'] = 'hombre misterioso';
$txt['gravatar_style_robohash'] = 'robot';
$txt['gravatar_style_blank'] = 'vacío';
$txt['gravatar_style_custom'] = 'personalizado';
$txt['gravatar_style_help'] = '<br />Si un miembro ya tiene gravatar propio en <a href="https://gravatar.com" target="_blank">gravatar.com</a>, será utilizado. Para los miembros que no han configurado un avatar, se generarán imágenes únicas en un estilo determinado. El tamaño de Gravatar coincidirá con la configuración de los avatares de los foros externos.
<br /><br />Estilos de Gravatar:
<br />wavatar - Caras generadas con diferentes características y fondos
<br />identicon - Un patrón geométrico basado en un hash de correo electrónico
<br />monsterid -  Un monstruo generado con diferentes colores, caras, etc
<br />retro - Impresionantes caras pixeladas de estilo arcade de 8 bits
<br />hombre misterioso
<br />PNG en blanco
<br />Imagen personalizada';
$txt['gravatar_style_custom_url'] = 'URL de la imagen personalizada';
$txt['gravatar_style_custom_url_help'] = '
<br />DEBE estar disponible públicamente (por ejemplo, no puede estar en una intranet, en una máquina de desarrollo local, detrás de autenticación HTTP o algún otro firewall, etc.). Las imágenes predeterminadas se pasan a través de un análisis de seguridad para evitar el contenido malicioso.
<br />DEBE ser accesible a través de HTTP o HTTPS en los puertos estándar, 80 y 443, respectivamente.
<br />DEBE tener una extensión de imagen reconocible (jpg, jpeg, gif, png).
<br />NO DEBE incluir una cadena de consulta (si lo hace, será ignorada).';
?>
