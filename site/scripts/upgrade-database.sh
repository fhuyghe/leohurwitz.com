#!/bin/sh
# Database changes needed when moving from the Sage 9 theme to the Sage 11 theme.
# Run from the Bedrock root (/srv/www/leohurwitz.org/current) after importing a
# database from the old (WordPress 5.4, Sage 9) site. Safe to run twice.
set -e
wp --skip-themes --skip-plugins eval '
$old = "leohurwitz2019/resources"; $new = "leohurwitz2019";
if (get_option("stylesheet") === $old) {
    $mods = get_option("theme_mods_$old");
    if ($mods !== false) { update_option("theme_mods_$new", $mods); }
    update_option("template", $new); update_option("stylesheet", $new);
    echo "theme switched\n";
}
global $wpdb;
echo $wpdb->query("UPDATE {$wpdb->postmeta} SET meta_value = REPLACE(meta_value, \"views/\", \"\") WHERE meta_key = \"_wp_page_template\" AND meta_value LIKE \"views/%\""), " page templates remapped\n";
'
# Drop plugins that are no longer installed from the active list.
wp --skip-themes --skip-plugins eval '
$active = get_option("active_plugins");
update_option("active_plugins", array_values(array_filter($active, fn ($p) => file_exists(WP_PLUGIN_DIR . "/" . $p))));
'
wp --skip-themes core update-db
wp --skip-themes rewrite flush
wp --skip-themes cache flush
