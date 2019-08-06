<?php

function github_temp_session_table()
{
global $wpdb;
 $table_name = $wpdb->prefix . "temp_table"; 
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE IF NOT EXISTS $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  user_name text NOT NULL,
  user_pass text NOT NULL,
  PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
}
register_activation_hook(__FILE__,'github_temp_session_table');
