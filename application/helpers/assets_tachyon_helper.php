<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Tachyon_helper un helper permet de generer les lien des fichier CSS,JavaScript,img 
 * de la template Tachyon 
 */

/**
 * generer le lien de ficheir css
 *@param  string $nom nom de fichier CSS
 *@return l'URL de ficheir CSS
 */
if ( ! function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/Tachyon_design/css/' . $nom . '.css';
	}
}

/**
 *  generer l'URL de ficheir js
 *@param string nom nom ou chemin sans extention de ficheir js
 *@return l'URL de fichier js
 */
if ( ! function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/Tachyon_design/js/' . $nom . '.js';
	}
}

/**
 * Genere le chemin d'un i'image
 *@param string nom 
 *@return l'URL de fichier
 */
if ( ! function_exists('img_url'))
{
	function img_url($nom)
	{
		return base_url() . 'assets/Tachyon_design/img/' . $nom;
	}
}

if ( ! function_exists('img'))
{
	function img($nom, $alt = '')
	{
		return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
	}
}

if (! function_exists('avatar_url'))
{
	function avatar_url($nom)
	{
		return base_url().'assets/Avatars/thumbs/'.$nom;
	}
}
