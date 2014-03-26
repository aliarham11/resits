<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Breadcrumb class
 *
 * DESCRIPTION : Class to show breadcrumb navigation
 *
 * MODIFICATION HISTORY
 * V1.0 2009-07-03 04:05 PM - Ibnu Daqiqil Id   - Created
 *  2009-07-03 02:32 PM     - Ibnu Daqiqil id - change html element to display using <ul>
 *
 * @package    Markeet
 * @author     Ibnu Daqiqil Id
 *
 **/
 
class Breadcrumb
{
 protected $data = array();
 
 /**
  * Class Constructor
  *
  * @return void
  * @author Ibnu Daqiqil Id
  **/
 function __construct() 
 {
 
 }
 
    /**
  * add new crumb element
  *
  * @param  string $title The crumb title
  * @param  string $uri Crumb url path 
  * @return void
  * @author Ibnu Daqiqil Id
  **/
 
 public function add($title, $uri='') 
 {
  $this->data[] = array('title'=>$title, 'uri'=>$uri);
  return $this;
 }
 
 /**
  * Fetch crumb data
  *
  * @return void
  * @author Ibnu Daqiqil Id
  **/
 
 public function fetch() 
 {
  return $this->data;
 }
 public function reset() 
 {
  $this->data = array();
 }
 
 public function show($home_site ="HOME", $id = "crumbs"  ) 
 {
  $ci = &get_instance();
  $site = $home_site;
  $breadcrumbs = $this->data;
  $out  = '<ul id="'.$id.'">';
  if ($breadcrumbs && count($breadcrumbs) > 0) {
   $out .= '<li><a class="pathway" href="' . base_url() .'"/>'. $site . '</a></li>';
   $i=1;
   foreach ($breadcrumbs as $crumb): 
 
    if ($i != count($breadcrumbs)) {
     $out .=  '<li><a class="pathway" href="' .site_url($crumb['uri']). '">'. $crumb['title'] .'</a></li>';
    } else {
     $out .=  '<li >'. $crumb['title'] .'</li>';
    }
    $i++;
   endforeach;
  } else {
   $out .= '<li >' . $site . '</li>';
  }
  $out .= '</ul>';
  return $out; 
 }
 
}
 