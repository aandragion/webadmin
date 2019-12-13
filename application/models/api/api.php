<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : API - Ruby Pedia
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://www.rubypedia.com/
 */
class api extends CI_Model
{

    public function get_blog()
    {
        $query = $this->db->get("film");
        return $query->result();
    }

}