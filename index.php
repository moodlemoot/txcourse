<?php
  require('../../config.php');
	
	require_login();
	
	$context = context_system::instance();
    	$PAGE->set_context($context);	
	$PAGE->set_url('/local/txcourse/index.php');
	
	echo $OUTPUT->header();
	echo $OUTPUT->heading('Term Data');
		 
	$table = new html_table();

	$table->head = array();
	$table->head[] = 'TID';
	$table->head[] = 'COURSE';
	$table->head[] = 'COMPONENT';

	$table->size = array('5%', '40%','40%');

	$records = taxonomy_termdata_list();
	foreach ($records as $key => $record)	{
		$id = $record->id;
		$actions = array();
		$actions[] = html_writer::link(new moodle_url( sprintf('/local/taxonomy/forms/VocabularyEditPage.php?id=%d', $id)), 'Modifier');
		$actions[] = html_writer::link(new moodle_url( sprintf('/local/taxonomy/forms/VocabularyDeletePage.php?id=%d', $id)), 'Supprimer');
		$table->data[] = array (
			$id,
			$record->name,
			$record->description,
			$record->weight,
			implode('<br/>', $actions)
		);
	}
	echo html_writer::table($table);
	
	$add_new_url = new moodle_url('/local/taxonomy/forms/VocabularyEditPage.php');
	echo html_writer::link($add_new_url, 'Ajouter nouveau vocabulaire');
	
	echo $OUTPUT->footer();
?>
