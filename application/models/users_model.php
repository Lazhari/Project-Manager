<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classe Users_model
 *Permet de gérer le requéte necessaire Pour le Controlleur projet
 *Hérite de la classe mère CI_Model 
 *Date: 28/06/2012
 *@author Lazhari Mohammed <lazharimohammed@gmail.com>
 *@copyright ENI 2012
 *@licence GNU GPL 3.0
 *@version 0.1
 *@package Users_model
 */
class Users_model extends CI_Model 
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
	 * lister tous les utilisateurs sauf l'utilisateur connecté
	 *@param int id Id de l'utilisateur connecté
	 *@return mixed tableau d'objet 
	 *@access public 
	 */
	function getUsers($id)
	{
		$q = $this->db->select('*')
					  ->where('id !=',$id)	
		              ->get('Users');

		if($q->num_rows()>0)
		{
			foreach ($q->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
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
	 * Permet d'ajouter un contact à la tables contacts
	 *@param array data tableau contient les champs à inserer dans la table contacts
	 *@return none
	 *@access public
	 */
	function addContact($data)
	{
		$this->db->insert('contacts',$data);
	}
	/**
	 * Retourne la liste des contact d'un utilisateur
	 *@param int id Id de l'utilisateur
	 *@return mixed tableau des objets contient les informations sur les contacts
	 *@access public
	 */
	function getMyContacts($id)
	{
		$this->db->select('nom,prenom,email,societe,adress,ville,avatar,tel')
			     ->from('Users','contacts')
			     ->where('contacts.users_ID',(int)$id)
			     ->join('contacts','Users.ID=contacts.Users_ID1','left');
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
	 * vérifier si un utilisateur est déja parmit les contact d'un autre
	 *@param int ID de l'utilisateur connecté
	 *@param int idcontact l'ID de la personne à ajouter
	 *@return bool 
	 *@access public
	 */
	function check_contact($id,$idcontact)
	{
		$q = $this->db->where('Users_ID',(int)$id)
					  ->where('Users_ID1',(int)$idcontact)
		              ->get('contacts');
		if ($q->num_rows()>0) 
		{
			return true;
		}
		else
			return false;
	}
	function testcontact($id)
	{
		$this->db->select('nom,prenom')
			     ->from('Users','contacts')
			     ->where('contacts.users_ID',(int)$id)
			     ->join('contacts','contacts.Users_ID1 != Users.ID1','left');
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
	 * Retourne les ids des contacts
	 *@param int id ID de l'utilisateur connecté
	 *@return array tableaus contient les ids des contacts
	 *@access public 
	 */
	function getIdContacts($id)
	{
		$q = $this->db->select('Users_ID1')
		              ->where('Users_ID',(int)$id)
		              ->get('contacts');
		if($q->num_rows()>0)
		{
			foreach ($q->result_array() as $row) 
			{
				$data[] = $row['Users_ID1'];
			}
			return $data;
		}

	}
}