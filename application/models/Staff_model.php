<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Google\Cloud\Firestore\FirestoreClient;

class Staff_model extends CI_Model
{
	public  function update_customerpassword($id, $pwd)
	{
		$firebase = $this->firebase->init();
		$db = $firebase->createDatabase();

		$auth = $firebase->createAuth();
		try {
			$updatedUser = $auth->changeUserPassword($id, $pwd);
			return True;
		} catch (\Throwable $th) {
			return False;
		}
	}


	public function add_staff($data)
	{
		$firebase = $this->firebase->init();

		$auth = $firebase->createAuth();


		$userProperties = [
			'email' => $data['email'],
			'name' => $data['firstName'],
			'password' => $data['password'],
		];

		try {
			$auth->createUser($userProperties);
		} catch (Throwable $e) {
			echo 'An error has occurred: ' . $e->getMessage;
		}

		$signInResult = $auth->signInWithEmailAndPassword($userProperties['email'], $userProperties['password']);
		$my = $signInResult->data();


		$x = $this->config->item('firebase_app_key');
		$firebaseProjectID = $this->config->item('firesbase_project_id');
		$firestore = new FirestoreClient([
			'projectId' => $firebaseProjectID,
			'keyFile' => json_decode(file_get_contents($x), true)
		]);
		$batch = $firestore->collection('staff')->document($my['localId']);


		try {
			$batch->set($data);
			return true;
		} catch (Throwable $e) {
			echo 'A firestore error has occurred: ' . $e->getMessage;
		}
	}

	public function delete_customer($id)
	{
		$firebase = $this->firebase->init();
		$db = $firebase->createDatabase();

		$auth = $firebase->createAuth();
		try {
			$auth->deleteUser($id);
		} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
			return FALSE;
		} catch (\Kreait\Firebase\Exception\AuthException $e) {
			return FALSE;
		}
		return TRUE;
	}

	public function getall_emergency()
	{
		//		return $this->db->select('*')->from('customers')->order_by('c_id','desc')->get()->result_array();

		$x = $this->config->item('firebase_app_key');
		$firebaseProjectID = $this->config->item('firesbase_project_id');
		$db = new FirestoreClient([
			'projectId' => $firebaseProjectID,
			'keyFile' => json_decode(file_get_contents($x), true)
		]);

		$citiesRef = $db->collection('Emergency');
		$documents = $citiesRef->documents();
		$output = array();
		foreach ($documents as $document) {
			if ($document->exists()) {
				//echo json_encode($document->data(), JSON_PRETTY_PRINT);
				$path = substr($document->path(), 6);
				$output[$path] = $document->data();
			}
		}
		//$output;
		return $output;
	}
	public function get_allstaff()
	{

		$x = $this->config->item('firebase_app_key');
		$firebaseProjectID = $this->config->item('firesbase_project_id');
		$firestore = new FirestoreClient([
			'projectId' => $firebaseProjectID,
			'keyFile' => json_decode(file_get_contents($x), true)
		]);

		$staffRef = $firestore->collection('staff')->where('userRole', '=', 'staff');
		$documents = $staffRef->documents();
		$output = array();
		foreach ($documents as $document) {
			if ($document->exists()) {
				$path = substr($document->path(), 6);
				$output[$path] = $document->data();
			}
		}
		$da['staff'] = $output;
		return $da;
	}
	public function get_customerdetails($c_id)
	{
		$x = $this->config->item('firebase_app_key');
		$firebaseProjectID = $this->config->item('firesbase_project_id');
		$db = new FirestoreClient([
			'projectId' => $firebaseProjectID,
			'keyFile' => json_decode(file_get_contents($x), true)
		]);
		$document = $db->collection('Users')->document($c_id)->snapshot()->data();

		return $document;
	}
	public function update_customer($data)
	{
		$x = $this->config->item('firebase_app_key');
		$firebaseProjectID = $this->config->item('firesbase_project_id');
		$db = new FirestoreClient([
			'projectId' => $firebaseProjectID,
			'keyFile' => json_decode(file_get_contents($x), true)
		]);
		try {
			$citiesRef = $db->collection('Users')->where('email', '=', $data["old"]["email"]);
			$documents = $citiesRef->documents();
			$documentId = NULL;
			foreach ($documents as $documentId => $document) {
				$documentId = $document->id();
			}
			if (empty($documentId)) {
				return False;
			}
			$customerData = array();
			foreach ($data["new"] as $key => $value) {
				$d['path'] = $key;
				$d['value'] = $value;
				array_push($customerData, $d);
			}

			$batch = $db->collection('Users')->document($documentId);
			$response = $batch->update($customerData);
		} catch (\Throwable $th) {
			return False;
		}
		return TRUE;
	}
}