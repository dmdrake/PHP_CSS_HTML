<?php
class Users extends Model{

	public $uID;
    public $first_name;
    public $last_name;
    public $email;
    protected $user_type;
    protected $active;

	// Constructor
	public function __construct(){
		parent::__construct();

        if(isset($_SESSION['uID'])) {
            $userinfo = $this->getUserFromID($_SESSION['uID']);

            $this->uID = $userinfo['uID'];
            $this->first_name = $userinfo['first_name'];
            $this->last_name = $userinfo['last_name'];
            $this->email = $userinfo['email'];
            $this->user_type = $userinfo['user_type'];
            $this->active = $userinfo['active'];
        }
    }

	public function getUser($uID){
		$sql = 'SELECT uID, first_name, last_name, email, password FROM users WHERE uID = ?';

		// perform query
		$results = $this->db->getrow($sql, array($uID));
		$user = $results;
		return $user;
	}

	public function getAllUsers($limit = 0){
		if($limit > 0){
			$numusers = ' LIMIT '.$limit;
		}
		$sql = 'SELECT uID, first_name, last_name, email, password, user_type, active FROM users'.$numusers;

		// perform query
		$results = $this->db->execute($sql);

		while ($row=$results->fetchrow()) {
			$users[] = $row;
		}

		return $users;
	}

    public function addUser($data){
        $sql = 'INSERT INTO users (first_name, last_name, email, password ) VALUES (?,?,?,?)';
        $this->db->execute($sql,$data);
        $message = 'User added.';
        return $message;
    }

    public function checkUser($email, $password)
    {
        $sql = 'SELECT email, password FROM users WHERE email = ?';
        $results = $this->db->getrow($sql, array($email));
        $user = $results;
        $password_db = $user[1];

        if(password_verify($password, $password_db)) {
            return true;
        } else{
            return false;
        }
    }

    public function getUserFromEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $results = $this->db->getrow($sql, array($email));
        $user = $results;
        return $user;
    }

    public function getUserFromID($uID)
    {
        $sql = 'SELECT * FROM users WHERE uID = ?';
        $results = $this->db->getrow($sql, array($uID));
        $user = $results;
        return $user;
    }

    public function getUserName()
    {
       return $this->first_name . ' ' .$this->last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getID()
    {
        return $this->uID;
    }

    public function isRegistered()
    {
        if(isset($this->user_type)) {
            return true;
        } else {
            return false;
        }
    }

    public function isAdmin()
    {
        if($this->user_type == "1") {
            return true;
        } else {
            return false;
        }
    }

		public function isActive($uID){
			$sql = "SELECT active FROM users WHERE uID = ?";
			$result = $this->db->getrow($sql,array($uID));
			return $result;

			if($this->active == "1") {
					return true;
			} else {
					return false;
			}
	}


    public function deleteUser($uID){
        $sql = 'DELETE FROM users WHERE uID = ?';

        // perform query
        $results = $this->db->getrow($sql, array($uID));
    }

    public function approveUser($uID){
        $sql = 'UPDATE users SET active = 1 WHERE uID = ?';

        // perform query
        $results = $this->db->getrow($sql, array($uID));
    }

    public function editUser($data){
        $sql = 'UPDATE users SET first_name=?, last_name=?, email=?, password=? WHERE uID=?';
        $this->db->execute($sql,$data);
        $message = 'User Edited.';
        return $message;
    }



}
