<?php

/*
Plugin Name: WPEFAF
Plugin URI: http://wordpresseasy.uk
Description:
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
    }

    function install_WPEFAF()
    {
    }

    function init_WPEFAF()
    {
        $this->register_scripts_and_styles();
        add_shortcode('my_shortcode', array(&$this, 'render_shortcode'));
        if (is_admin()) {
        } else {
        }
        add_action('your_action_here', array(&$this, 'action_callback_method_name'));
        add_filter('your_filter_here', array(&$this, 'filter_callback_method_name'));
    }

    function action_callback_method_name()
    {
    }

    function filter_callback_method_name()
    {
    }

    function render_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'attr1' => 'foo',
            'attr2' => 'bar'
        ), $atts));
    }

    private function register_scripts_and_styles()
    {
        if (is_admin()) {
            $this->load_file(self::slug . '-admin-script', '/js/admin.js', true);
            $this->load_file(self::slug . '-admin-style', '/css/admin.css');
        } else {
            $this->load_file(self::slug . '-script', '/js/widget.js', true);
            $this->load_file(self::slug . '-style', '/css/widget.css');
        }
    }

    private function load_file($name, $file_path, $is_script = false)
    {

        $url = plugins_url($file_path, __FILE__);
        $file = plugin_dir_path(__FILE__) . $file_path;

        if (file_exists($file)) {
            if ($is_script) {
                wp_register_script($name, $url, array('jquery')); //depends on jquery
                wp_enqueue_script($name);
            } else {
                wp_register_style($name, $url);
                wp_enqueue_style($name);
            }
        }
    }
}

new WPEFAF();