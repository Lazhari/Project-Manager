<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classe Projet_model
 *Permet de gérer le requéte necessaire Pour le Controlleur projet
 *Hérite de la classe mère CI_Model 
 *Date: 28/06/2012
 *@author Lazhari Mohammed <lazharimohammed@gmail.com>
 *@copyright ENI 2012
 *@licence GNU GPL 3.0
 *@version 0.1
 *@package Projet_model
 */
class Projet_model extends CI_Model 
{
	/**
	 * Constructeur 
	 *@param none
	 *@access public 
	 */
	function __construct()
	{
		//appel au constructeur de la classe mère CI_Model 
		parent::__construct();
	} 

	/**
	 * permet de retourner un tableau contient le noms des roles et leur description
	 *à partir de la table Roles
	 *Exemple d'utilisation 
	 *<code>
	 *$data['roles'] = $this->projet_model->get_role();
	 *</code>
	 *@param none 
	 *@return mixed tableau associative des objet roles 
	 *@access public 
	 */
	function get_role()
	{
		$q = $this->db->get('Roles');

		if ($q->num_rows()>0)
		{
			foreach ($q->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}
	}
	/**
	 *Permet d'ajouter un nouvel Projet à la table Projets
	 *Exemple d'utilisation :
	 *<code>
	 *$data = array('nom'=>'Name_of_Project',
	 *              'description'=>'lorem opsum lorem ',
	 *				'start'=>'06-08-2012',
	 *				'end'=>'07-09-2013',
	 *				'budget'=>4000);
	 *$this->projet_model->insert_projet($data);
	 *</code>
	 *@param array data les informations consernant le projet 
	 *@return none
	 *@access public
	 */
	function insert_projet($data)
	{
		$this->db->insert('Projets',$data);
	}
	/**
	 * Permet d'ajouter ID de role à la table Projet_associe
	 *@param array data contient l'ID de role
	 *@return none 
	 *@access public
	 */
	function insert_role($data)
	{
		$this->db->insert('Projet_assoccie',$data);
	}
	/**
	 * Permet d'inserer une description de role dans la table Roles
	 *@param array data description de role
	 *@return none
	 *@access public
	 */
	function insert_roleDescription($data)
	{
		$this->db->insert('Roles',$data);
	}
	/**
	 * Retourne l'ID de projet 
	 *@param  string nom le nom de projet
	 *@return int    ID du projet 
	 *@access public 
	 */
	function get_projetID($nom)
	{
		$this->db->where('nom',$nom);
		$q = $this->db->get('Projets');
		if($q->num_rows()>0)
		{
			foreach ($q->result() as $value) {
				return $value->ID;
			}
		}
	}
	/**
	 * Retourne l'ID d'un role
	 *@param  string nom nom du role
	 *@return int        ID de role 
	 *@access public
	 */
	function get_roleID($nom)
	{
		$this->db->where('nom_Role',$nom);
		$q = $this->db->get('Roles');
		if($q->num_rows()>0)
		{
			foreach ($q->result() as $value) {
				return $value->ID;
			}
		}
	}
	/**
	 * Récupérer l'ID d'un utilisateur à partir de son email 
	 *@param string email Email de l'utilisateur
	 *@return int ID de l'utilisateur 
	 *@access public 
	 */
	function get_userID($email)
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
	/**
	 * Récupérer la liste des projet d'un utilisateur à partir de son ID 
	 *@param  int   iduser l'ID de l'utilisateur 
	 *@return mixed        tableau des objets contient la liste des projets
	 *@access public
	 */
	
	function getProjetByUserID($iduser)
	{
		$this->db->select('*')
			     ->from('Projets','Roles')
			     ->where('Projet_assoccie.users_ID',$iduser)
			     ->join('Projet_assoccie','Projet_assoccie.Projets_ID=Projets.id','left')
			     ->join('Roles','Roles.id=Projet_assoccie.Roles_ID','left');
		$q = $this->db->get();
		if ($q->num_rows()>0) 
		{
			foreach ($q->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}
	}
	/**
	 * Lister les utilisateurs participants à un projet 
	 *@param  int   idproject l'ID de projet dans la table Projets
	 *@return array           liste des utilisateur 
	 *@access public 
	 */
	function getUsersByIdProject($idproject)
	{

		$this->db->select(' nom,prenom,nom_Role,description_Role')
			     ->from('Users','Roles')
			     ->where('Projet_assoccie.Projets_ID',$idproject)
			     ->join('Projet_assoccie','Projet_assoccie.users_ID=Users.id','left')
			     ->join('Roles','Roles.id=Projet_assoccie.Roles_ID','left');
		$q = $this->db->get();
		if ($q->num_rows()>0) 
		{
			foreach ($q->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}
	}
	/**
	 * Permet de vérifier si un utilisateur a des projets
	 *@param  int iduser l'ID de l'utilisateur 
	 *@return int        le nombre des projets
	 *@access public 
	 */
	function checkProjet($iduser)
	{
		$this->db->select('*')
			     ->from('Projets','Roles')
			     ->where('Projet_assoccie.users_ID',$iduser)
			     ->join('Projet_assoccie','Projet_assoccie.Projets_ID=Projets.id','left')
			     ->join('Roles','Roles.id=Projet_assoccie.Roles_ID','left');
		$q = $this->db->get();
		return $q->num_rows();
	}


}
