<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Google\Cloud\Firestore\FirestoreClient;

class Settings_model extends CI_Model
{
  public function getall_settings()
  {
    $x = $this->config->item('firebase_app_key');
    $db = new FirestoreClient([
      'projectId' => 'travelclub-696dc',
      'keyFile' => json_decode(file_get_contents($x), true)
    ]);

    $citiesRef = $db->collection('Settings');
    $documents = $citiesRef->documents();
    $output = array();
    foreach ($documents as $document) {
      if ($document->exists()) {
        //echo json_encode($document->data(), JSON_PRETTY_PRINT);
        $output[$document->id()] = $document->data();
      }
    }
    $settings = $output;
    return $settings;
  }

  public function update_settings($data)
  {
    $x = $this->config->item('firebase_app_key');
    $db = new FirestoreClient([
      'projectId' => 'travelclub-696dc',
      'keyFile' => json_decode(file_get_contents($x), true)
    ]);
    try {
      $prices = array();
      foreach ($data["Prices"] as $key => $value) {
        $d['path'] = $key;
        $d['value'] = $value;
        array_push($prices, $d);
      }

      $driverShare = array();
      $d['path'] = "percent";
      $d['value'] = $data["driverShare"];
      array_push($driverShare, $d);

      $batch = $db->collection('Settings')->document("Prices");
      $response = $batch->update($prices);

      $batch = $db->collection('Settings')->document("driverShare");
      $response = $batch->update($driverShare);
    } catch (\Throwable $th) {
      return False;
    }
    return TRUE;
  }
}
