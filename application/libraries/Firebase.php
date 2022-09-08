<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/../../vendor/autoload.php';

use Kreait\Firebase\Factory;

class Firebase
{

    protected $config = array();
    public $factory;

    public function __construct()
    {

        $this->CI = &get_instance();

        $this->factory = (new Factory)->withServiceAccount($this->CI->config->item('firebase_app_key'));
    }

    public function init()
    {

        return $this->factory;
    }

    public function getdatase()
    {
        //$database = $factory->createDatabase();

    }
}