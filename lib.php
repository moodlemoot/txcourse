<?php
/**
 * Setup Gérer le public link for selected users.
 *
 * @param array     $settings
 * @param object    $context
 * @return void
 */
function local_txcourse_extends_settings_navigation($settings, $context) {
    global $CFG;

    // If we're viewing course and the course is not the front page.
    if ( ($context instanceof context_course || $context instanceof context_module )  && $context->instanceid > 1) {

            $url = new moodle_url(
                '/local/txcourse/forms/AssocEditPage.php',
                array('id'=> $context->instanceid)
            );
            $root = $settings->find('courseadmin', navigation_node::TYPE_COURSE);
            $root->add('Taxonomy', $url);

    }
}
