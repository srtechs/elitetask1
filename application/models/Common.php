<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Google\Cloud\Firestore\FirestoreClient;

class Common extends CI_Model
{

    function adddatamodel($collectionname, $documentname, $data)
    {
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $firestore = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        $cityRef = $firestore->collection($collectionname)->document($documentname);

        if ($cityRef->set($data)) {
            return true;
        } else {
            return false;
        }
    }

    function getAddress($latitude, $longitude)
    {
        //google map api url
        $API_KEY = "AIzaSyAe_Fm2ja1OuDHswu4mgZKQN9DRakGyzzs";
        $url = "https://maps.google.com/maps/api/geocode/json?latlng=$latitude,$longitude&key=" . $API_KEY;
        // send http request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $address = $json->results[0]->formatted_address;
        return $address;
    }

    function get_iechartdata()
    {
        $date = $this->createDateRangeArray(date('Y-m-d', strtotime('-5 day')), date('Y-m-d'));
        $arr  = array();
        foreach ($date as $key => $dates) {
            $income = 0;
            $expense = 0;
            $triplist = $this->readdatafromcollectionbetween("Bookings", "bookingDate", ">", strtotime($dates) * 1000, "bookingDate", "<", strtotime($dates) * 86400000);
            if (!empty($triplist)) {
                foreach ($triplist as $tripId => $tripDetails) {
                    $income = $income + ((float)$tripDetails["price"] * 20 / 100);
                }
            }
            $triplist = $this->readdatafromcollectionbetween("Bookings", "bookingDate", ">", strtotime($dates) * 1000, "bookingDate", "<", strtotime($dates) * 86400000);
            if (!empty($triplist)) {
                foreach ($triplist as $tripId => $tripDetails) {
                    $expense = $expense + ((float)$tripDetails["price"] * 80 / 100);
                }
            }
            // $triplist = $this->readdatafromcollectionbetweenwhere("Payouts", "status" , "=", "paid", "completionTimeStamp" , ">", strtotime($dates)*1000, "completionTimeStamp" , "<", strtotime($dates)*86400000);
            // if(!empty($triplist)) {
            //     foreach ($triplist as $tripId => $tripDetails) {
            //         $expense = $expense + (float)$tripDetails["amount"];
            //     }
            // }
            $arr[$dates]['income']  = ($income) ? $income : 0;
            $arr[$dates]['expense'] = ($expense) ? $expense : 0;
        }
        return $arr;
    }

    function createDateRangeArray($strDateFrom, $strDateTo)
    {
        $aryRange  = array();
        $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
        $iDateTo   = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));
        if ($iDateTo >= $iDateFrom) {
            array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
            while ($iDateFrom < $iDateTo) {
                $iDateFrom += 86400; // add 24 hours
                array_push($aryRange, date('Y-m-d', $iDateFrom));
            }
        }
        return $aryRange;
    }


    function updatedatamodel($collectionname = "", $documentname = "", $data = array())
    {

        $ceta = array();
        foreach ($data as $key => $value) {
            $d['path'] = $key;
            $d['value'] = $value;
            array_push($ceta, $d);
        }

        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $firestore = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        $cityRef = $firestore->collection($collectionname)->document($documentname);

        $cityRef->update($ceta);
        return true;
    }

    function deletedatamodel($collectionname, $documentname)
    {
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $firestore = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        if ($firestore->collection($collectionname)->document($documentname)->delete()) {
            return true;
        } else {
            return false;
        }
    }



    function readusername($documentname = "")
    {
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $firestore = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        $docRef = $firestore->collection("Users")->document($documentname);
        $snapshot = $docRef->snapshot();

        if ($snapshot->exists()) {
            $j = $snapshot->data();
            if (!empty($j['userName']) && $j['userName'] != "")
                return $j['userName'];
            else
                return $j['firstName'] . " " . $j['lastName'];
        } else {
            return '';
        }
    }

    function readtravelname($documentname = "")
    {
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $firestore = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        $docRef = $firestore->collection("Travels")->document($documentname);
        $snapshot = $docRef->snapshot();

        if ($snapshot->exists()) {
            $j = $snapshot->data();
            if (!empty($j['name']) && $j['name'] != "")
                return $j['name'];
            else
                return " ";
        } else {
            return '';
        }
    }

    function readImage($documentname = "")
    {
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $firestore = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        $docRef = $firestore->collection("Users")->document($documentname);
        $snapshot = $docRef->snapshot();

        if ($snapshot->exists()) {
            $j = $snapshot->data();
            return $j['image'];
        } else {
            return '';
        }
    }



    function readdatadocument($collectionname = "", $documentname = "")
    {
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $firestore = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        $docRef = $firestore->collection($collectionname)->document($documentname);
        $snapshot = $docRef->snapshot();

        if ($snapshot->exists()) {

            return $snapshot->data();
        } else {
            return '';
        }
    }

    function readdatacollection($collectionname, $subCollectionname, $documentname)
    {
        $citiesRef = "";
        $documents = "";
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $db = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        if ($subCollectionname != "") {
            $citiesRef = $db->collection($collectionname)->document($documentname)->collection($subCollectionname);
            $documents = $citiesRef->documents();
        } else {
            $citiesRef = $db->collection($collectionname);
            $documents = $citiesRef->documents();
        }

        $output = array();

        foreach ($documents as $document) {
            if ($document->exists()) {
                $j = array();
                $output[$document->id()] = $document->data();
            }
        }

        return $output;
    }


    function readdatafromcollectionwhereclause($collectionname, $collectionkey = "", $collectiontype = "", $collectionkeyvalue = "")
    {
        $citiesRef = "";
        $documents = "";
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $db = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        if ($collectionkey != "" && $collectiontype != "" && $collectionkeyvalue != "") {
            $citiesRef = $db->collection($collectionname)->where($collectionkey, $collectiontype, $collectionkeyvalue);
            $documents = $citiesRef->documents();
        } else {
            $citiesRef = $db->collection($collectionname);
            $documents = $citiesRef->documents();
        }

        $output = array();

        foreach ($documents as $document) {
            if ($document->exists()) {
                $j = array();
                $output[$document->id()] = $document->data();
            }
        }

        return $output;
    }

    function readdatafromcollectionbetween($collectionname, $collectionkey = "", $collectiontype = "", $collectionkeyvalue = "", $collectionkey2 = "", $collectiontype2 = "", $collectionkeyvalue2 = "")
    {
        $citiesRef = "";
        $documents = "";
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');

        $db = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);
        if ($collectionkey2 != "" && $collectiontype2 != "" && $collectionkeyvalue2 != "") {
            $citiesRef = $db->collection($collectionname)->where($collectionkey, $collectiontype, $collectionkeyvalue)->where($collectionkey2, $collectiontype2, $collectionkeyvalue2);
            $documents = $citiesRef->documents();
        } elseif ($collectionkey != "" && $collectiontype != "" && $collectionkeyvalue != "") {
            $citiesRef = $db->collection($collectionname)->where($collectionkey, $collectiontype, $collectionkeyvalue);
            $documents = $citiesRef->documents();
        } else {
            $citiesRef = $db->collection($collectionname);
            $documents = $citiesRef->documents();
        }

        $output = array();

        foreach ($documents as $document) {
            if ($document->exists()) {
                $j = array();
                $output[$document->id()] = $document->data();
            }
        }

        return $output;
    }

    function readnumberofdocumentsincollectionbetween($collectionname, $collectionkey = "", $collectiontype = "", $collectionkeyvalue = "", $collectionkey2 = "", $collectiontype2 = "", $collectionkeyvalue2 = "")
    {
        $citiesRef = "";
        $documents = "";
        $documentsCount = 0;
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');

        $db = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);
        if ($collectionkey2 != "" && $collectiontype2 != "" && $collectionkeyvalue2 != "") {
            $citiesRef = $db->collection($collectionname)->where($collectionkey, $collectiontype, $collectionkeyvalue)->where($collectionkey2, $collectiontype2, $collectionkeyvalue2);
            $documents = $citiesRef->documents();
        } elseif ($collectionkey != "" && $collectiontype != "" && $collectionkeyvalue != "") {
            $citiesRef = $db->collection($collectionname)->where($collectionkey, $collectiontype, $collectionkeyvalue);
            $documents = $citiesRef->documents();
        } else {
            $citiesRef = $db->collection($collectionname);
            $documents = $citiesRef->documents();
        }

        foreach ($documents as $document) {
            if ($document->exists()) {
                $documentsCount++;
            }
        }

        return $documentsCount;
    }

    function readdatafromcollectionbetweenwhere($collectionname, $collectionkey = "", $collectiontype = "", $collectionkeyvalue = "", $collectionkey2 = "", $collectiontype2 = "", $collectionkeyvalue2 = "", $collectionkey3 = "", $collectiontype3 = "", $collectionkeyvalue3 = "")
    {
        $citiesRef = "";
        $documents = "";
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');

        $db = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);
        if ($collectionkey3 != "" && $collectiontype3 != "" && $collectionkeyvalue3 != "") {
            $citiesRef = $db->collection($collectionname)->where($collectionkey, $collectiontype, $collectionkeyvalue)->where($collectionkey2, $collectiontype2, $collectionkeyvalue2)->where($collectionkey3, $collectiontype3, $collectionkeyvalue3);
            $documents = $citiesRef->documents();
        } else {
            $citiesRef = $db->collection($collectionname)->where($collectionkey, $collectiontype, $collectionkeyvalue);
            $documents = $citiesRef->documents();
        }

        $output = array();

        foreach ($documents as $document) {
            if ($document->exists()) {
                $j = array();
                $output[$document->id()] = $document->data();
            }
        }

        return $output;
    }


    function readdatadocumentwithcondition($collectionname = "Settings", $documentname = "testing", $where = "")
    {
        $x = $this->config->item('firebase_app_key');
        $firebaseProjectID = $this->config->item('firesbase_project_id');
        $firestore = new FirestoreClient([
            'projectId' => $firebaseProjectID,
            'keyFile' => json_decode(file_get_contents($x), true)
        ]);

        $docRef = $firestore->collection($collectionname)->document($documentname);
        $snapshot = $docRef->snapshot();

        if ($snapshot->exists()) {

            return $snapshot->data();
        } else {
            return '';
        }
    }
}