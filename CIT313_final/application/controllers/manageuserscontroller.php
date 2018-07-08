<?php

class ManageUsersController extends Controller{

	public $userObject;

   	public function users($uID){

		$this->userObject = new Users();
		$user = $this->userObject->getUser($uID);
	  	$this->set('user',$user);
			$this->set('title', 'Member ' . $uID);

   	}

	public function index(){

		$this->userObject = new Users();
		$users = $this->userObject->getAllUsers();
		$this->set('title', 'Users');
		$this->set('users',$users);
		$this->set('first_name',$first_name);
		$this->set('last_name',$last_name);
		$this->set('email',$email);

	}

	public function profile(){

		$this->userObject = new Users();
		$user = $this->userObject->getUser($_SESSION['uID']);
	  $this->set('user',$user);
	}
	public function delete($uID){

		$this->userObject = new Users();
		$user = $this->userObject->deleteUser($uID);
		$this->set('message', 'User Successfully deleted!');

		$users = $this->userObject->getAllUsers();
		$this->set('title', 'Users');
		$this->set('users',$users);
		$this->set('first_name',$first_name);
		$this->set('last_name',$last_name);
		$this->set('email',$email);
	}
	public function approve($uID){

		$this->userObject = new Users();
		$user = $this->userObject->approveUser($uID);
		$this->set('message', 'User Successfully approved!');

		$users = $this->userObject->getAllUsers();
		$this->set('title', 'Users');
		$this->set('users',$users);
		$this->set('first_name',$first_name);
		$this->set('last_name',$last_name);
		$this->set('email',$email);
	}
}
