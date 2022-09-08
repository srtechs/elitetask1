<?php

defined('BASEPATH') or exit('No direct script access allowed');
function xssclean($post)
{
	$rtn = true;
	if ($post) {
		foreach ($post as $key => $data) {
			if (preg_match("/</i", $data, $match)) {
				$rtn = false;
			}
		}
	}
	return $rtn;
}

function getusername($id)
{

	$mydata = "";
	$CI = get_instance();

	// You may need to load the model if it hasn't been pre-loaded
	$CI->load->model('common');

	// Call a function of the model
	$mydata = $CI->common->readusername($id);
	return $mydata;




	//		return "ABxc";
}

function gettravelname($id)
{

	$mydata = "";
	$CI = get_instance();

	// You may need to load the model if it hasn't been pre-loaded
	$CI->load->model('common');

	// Call a function of the model
	$mydata = $CI->common->readtravelname($id);
	return $mydata;




	//		return "ABxc";
}

// function getAddress($lat, $lng)
// {
// 	$mydata = "";
// 	$CI = get_instance();
// 	$CI->load->model('common');
// 	$mydata = $CI->common->getAddress($lat, $lng);
// 	return $mydata;
// }


// function getImage($id)
// {

// 	$mydata = "";
// 	$CI = get_instance();

// 	// You may need to load the model if it hasn't been pre-loaded
// 	$CI->load->model('common');

// 	// Call a function of the model
// 	$mydata = $CI->common->readImage($id);
// 	return $mydata;




// 	//		return "ABxc";
// }






function convertTime($data)
{
	if (isset($data)) {
		return date("d/m/Y h:i:s", $data / 1000);
	} else {
		return '';
	}
}
function convertTimeinMonth($data)
{
	if (isset($data)) {
		return date("Y-m-d", $data / 1000);
	} else {
		return '';
	}
}




function output($data)
{
	if (isset($data)) {
		return html_escape($data);
	} else {
		return '';
	}
}
function pointInPolygon($point, $polygon, $pointOnVertex = true)
{
	$pointOnVertex = $pointOnVertex;
	$point = pointStringToCoordinates($point);
	$vertices = array();
	foreach ($polygon as $vertex) {
		$vertices[] = pointStringToCoordinates($vertex);
	}
	if ($pointOnVertex == true and pointOnVertex($point, $vertices) == true) {
		return "vertex";
	}
	$intersections = 0;
	$vertices_count = count($vertices);
	for ($i = 1; $i < $vertices_count; $i++) {
		$vertex1 = $vertices[$i - 1];
		$vertex2 = $vertices[$i];
		if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) { // Check if point is on an horizontal polygon boundary
			return "boundary";
		}
		if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) {
			$xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x'];
			if ($xinters == $point['x']) { // Check if lat lng is on the polygon boundary (other than horizontal)
				return "boundary";
			}
			if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
				$intersections++;
			}
		}
	}
	if ($intersections % 2 != 0) {
		return "inside";
	} else {
		return "outside";
	}
}

function pointOnVertex($point, $vertices)
{
	foreach ($vertices as $vertex) {
		if ($point == $vertex) {
			return true;
		}
	}
}
function pointStringToCoordinates($pointString)
{
	$coordinates = explode(" ", $pointString);
	return array("x" => $coordinates[0], "y" => $coordinates[1]);
}

// function sitedata()
// {
// 	$CI = &get_instance();
// 	$CI->db->from('settings');
// 	$query = $CI->db->get();
// 	$siteinfo = $query->result_array();
// 	if (count($siteinfo) >= 1) {
// 		return $siteinfo[0];
// 	}
// }

function userpermission($link)
{
	return true;
}
