<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classe Profil_model
 *Permet de gérer le requéte necessaire Pour le Controlleur profil
 *Hérite de la classe mère CI_Model 
 *Date: 28/06/2012
 *@author Lazhari Mohammed <lazharimohammed@gmail.com>
 *@copyright ENI 2012
 *@licence GNU GPL 3.0
 *@version 0.1
 *@package Profil_model
 */
class Profil_model extends CI_Model 
{
	/**
	 * Constructeur 
	 *@param none
	 *@access public
	 */
	function __construct()
	{
		//appel du constructeur de la classe mère CI_Model
		parent::__construct();
	} 
	/**
	 * Retourne le profil de l'utilisateur à partir de son email
	 *@param string email Email de l'utilisateur
	 *@return mixed data 
	 *@access public
	 */
	function userProfil($email)
	{
		$q = $this->db->where('email',$email)
		              ->get('Users');
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
	}
	/**
	 * donner le nom de l'utilisateur 
	 *@param string email Email de l'utilisateur
	 *@return string nom de l'utilisateur 
	 *@access public
	 */
	function userName($email)
	{
		$q =$this->db->select('nom')
		             ->where('email',$email)
		             ->get('Users');
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				return $row->nom;
			}
		}

	}
	/**
	 * fonction permet de modifier les données personnel d'un utilisateur
	 *@param array data les données personnel passé à modifier dans la table Users
	 *@param int   id   id de l'utilisateur 
	 *@return none
	 *@access public 
	 */

	function updateProfilCoord(array $data,$id)
	{
		$this->db->update('Users',$data,array('ID'=>(int)$id));
	}

	/**
	 * Fonction permet de modifier le mot de passe 
	 *@param array data contientt le mot de passe d'utilisateur
	 *@param int   id   ID de l'utilisateur 
	 *@return none
	 *@access public
	 */
	function updataProfilPassword(array $data,$id)
	{
		$this->db->update('Users',$data,array('ID'=>(int)$id));
	}

	/**
	 * Focntion permet d'ajouter le chemin de l'avatar à la table Users 
	 *@param array data le chemin de l'avatar
	 *@param int   id   ID de l'utilisateur 
	 *@return none
	 *@access public
	 */
	function addAvatar(array $data,$id)
	{
		$this->db->update('Users',$data,array('ID'=>(int)$id));
	}

	

}
