<?php
/**
 * PAWSIC - Auto-capitalize member names on signup
 *
 * WPCode Snippet for memberships.pawsic.org
 * Ensures first_name and last_name are stored with proper capitalization
 * (e.g. "john doe" becomes "John Doe") regardless of how the user typed it.
 *
 * HOW TO INSTALL:
 * 1. Go to WPCode > Add Snippet > Custom Snippet > PHP Snippet
 * 2. Paste this entire file's contents
 * 3. Set "Insert Method" to "Auto Insert"
 * 4. Set "Location" to "Run Everywhere"
 * 5. Activate the snippet
 */

add_action('mepr-signup', function ($txn) {
    $user = $txn->user();
    $uid  = $user->ID;

    $first = get_user_meta($uid, 'first_name', true);
    $last  = get_user_meta($uid, 'last_name', true);

    if ($first) {
        update_user_meta($uid, 'first_name', ucwords(strtolower($first)));
    }
    if ($last) {
        update_user_meta($uid, 'last_name', ucwords(strtolower($last)));
    }
});
