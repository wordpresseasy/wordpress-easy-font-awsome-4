<?php

/*
Plugin Name: Wordpress Easy Font Awsome 4
Plugin URI: http://wordpresseasy.uk
Description:  Easy Plugin for Font Awsome in Wordpress
Version: 0.1
Author: Mark Anthony Jones
Author Email: mark@wordpresseasy.uk
License:

  Copyright 2011 Mark Anthony Jones (mark@wordpresseasy.uk)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

class WPEFAF
{

    const name = 'WPEFAF';
    const slug = 'WPEFAF';

    function __construct()
    {
        register_activation_hook(__FILE__, array(&$this, 'install_WPEFAF'));
        add_action('init', array(&$this, 'init_WPEFAF'));
        wp_enqueue_style('FontAwsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array());
    }

    function install_WPEFAF()
    {
    }

    function init_WPEFAF()
    {

    }


    private function load_file($name, $file_path, $is_script = false)
    {

        $url = plugins_url($file_path, __FILE__);
        $file = plugin_dir_path(__FILE__) . $file_path;

        if (file_exists($file)) {
            if ($is_script) {
                wp_register_script($name, $url, array('jquery'));
                wp_enqueue_script($name);
            } else {
                wp_register_style($name, $url);
                wp_enqueue_style($name);
            }
        }
    }
}

new WPEFAF();