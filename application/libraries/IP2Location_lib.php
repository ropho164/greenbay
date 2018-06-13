<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once (APPPATH . 'third_party/ip2locationlite.class.php');
class IP2Location_lib extends ip2location_lite {
 function __construct($params = array()) {
 	parent::__construct();
 }
}