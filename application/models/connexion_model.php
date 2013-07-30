<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classe Connexion_model
 *Permet de gérer le requéte necessaire Pour le Controlleur Connexion
 *Hérite de la classe mère CI_Model 
 *Date: 28/06/2012
 *@author Lazhari Mohammed <lazharimohammed@gmail.com>
 *@ copyright ENI 2012
 *@licence GNU GPL 3.0
 *@version 0.1
 *@package Connexion_model
 */
class Connexion_model extends CI_Model 
{
	/**
	 * Constucteur
	 *@param none
	 *@access public
	 */
	function __construct()
	{
		//appel du construteur de la classe mère CI_Model
		parent::__construct();
	} 
	/**
	 * Récupération de la liste des villes Marocain 
	 *à partir de la table villes
	 *@param none
	 *@return array data Tableau des villes 
	 *@access public
	 */
	function get_villes()
	{
		$q = $this->db->get('villes');

		if($q->num_rows()>0)
		{
			foreach ($q->result() as $value) 
			{
				$data[] = $value;
			}
			return $data;
		}
	}
	/**
	 * Permet d'ajouter un nouvel utilisateur à la table Users
	 *@param array data tableau associative contient les champs à insérer dans la table Users
	 *@return none
	 *@access public 
	 */
	function signup($data)
	{
		$this->db->insert('Users',$data);
	}
	/**
	 * Permet de vérifie si un utilisateur existe dans la table Users
	 *@param string email Email de l'utilisateur 
	 *@param string pass  Mot de passe de l'utilisateur 
	 *@return bool 
	 *@access public
	 */
	function check_id($email,$pass)
	{
		$this->db->where('email',$email);
		$this->db->where('MotPass',sha1($pass));
		$q = $this->db->get('Users');
		if($q->num_rows()>0)
		{
			return true;
		}
	}
	/**
	 * Récupérer l'ID d'un utilisateur à partir de son email 
	 *@param string email Email de l'utilisateur
	 *@return int ID de l'utilisateur 
	 *@access public 
	 */
	function get_idUser($email)
	{
		$q = $this->db->select('id')
				      ->where('email',$email)
				      ->get('Users');
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				return $row->id;
			}
		}
	}


}

?>