<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Google\Cloud\Firestore\FirestoreClient;

class Drivers_model extends CI_Model
{
	public function add_drivers($data)
	{
		$firebase = $this->firebase->init();
		$db = $firebase->createDatabase();

		$auth = $firebase->createAuth();
		$userProperties = [
			'email' => $data["driver"]['email'],
			'emailVerified' => false,

			'password' => $data["driver"]['password'],
			'displayName' => $data["driver"]['firstName'],
			'disabled' => false,
		];

		try {
			$createdUser = $auth->createUser($userProperties);
		} catch (\Throwable $th) {
			return False;
		}

		$signInResult = $auth->signInWithEmailAndPassword($userProperties['email'], $userProperties['password']);
		$my = $signInResult->data();

		$x = $this->config->item('firebase_app_key');
		$firestore = new FirestoreClient([
			'projectId' => 'travelclub-696dc',
			'keyFile' => json_decode(file_get_contents($x), true)
		]);

		$batch = $firestore->collection('Users')->document($my['localId']);
		$response = $batch->create($data["driver"]);

		$data["vehicle"]["userId"] = $my['localId'];

		$batch = $firestore->collection('Vehicle')->document(time());
		$response = $batch->create($data["vehicle"]);

		return TRUE;
	}

	public function delete_driver($id)
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

	public function getall_drivers()
	{
		$x = $this->config->item('firebase_app_key');
		$db = new FirestoreClient([
			'projectId' => 'travelclub-696dc',
			'keyFile' => json_decode(file_get_contents($x), true)
		]);

		$citiesRef = $db->collection('Users')->where('userRole', '=', 'driver');
		$documents = $citiesRef->documents();
		$output = array();
		foreach ($documents as $document) {
			if ($document->exists()) {
				$output[$document->id()] = $document->data();
			}
		}
		$da['user'] = $output;
		return $da;
		//return $this->db->select('*')->from('drivers')->order_by('d_id','desc')->get()->result_array();
	}

	public function get_driverdetails($d_id)
	{
		$x = $this->config->item('firebase_app_key');
		$db = new FirestoreClient([
			'projectId' => 'travelclub-696dc',
			'keyFile' => json_decode(file_get_contents($x), true)
		]);
		$document = $db->collection('Users')->document($d_id)->snapshot()->data();

		return $document;
	}

	public function edit_driver()
	{
		$this->db->where('d_id', $this->input->post('d_id'));
		return $this->db->update('drivers', $this->input->post());
	}
}
