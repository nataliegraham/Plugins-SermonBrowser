<?php

function sb_search_results_dictionary() {
	return array(
		'[filters_form]' => '<?php sb_print_filters($atts) ?>',
		'[most_popular]' => '<?php sb_print_most_popular() ?>',
		'[tag_cloud]' => '<?php sb_print_tag_clouds() ?>',
		'[sermons_count]' => '<?php echo $record_count ?>',
		'[sermons_loop]' => '<?php foreach ($sermons as $sermon){ $media = sb_get_stuff($sermon); ?>',
		'[/sermons_loop]' => '<?php } ?>',
		'[sermon_title]' => '<a href="<?php sb_print_sermon_link($sermon) ?>"><?php echo stripslashes($sermon->title) ?></a>',
		'[preacher_link]' => '<a href="<?php sb_print_preacher_link($sermon) ?>"><?php echo stripslashes($sermon->preacher) ?></a>',
		'[series_link]' => '<a href="<?php sb_print_series_link($sermon) ?>"><?php echo stripslashes($sermon->series) ?></a>',
		'[service_link]' => '<a href="<?php sb_print_service_link($sermon) ?>"><?php echo stripslashes($sermon->service) ?></a>',
		'[date]' => '<?php echo sb_formatted_date ($sermon) ?>',
		'[first_passage]' => '<?php $foo = unserialize($sermon->start); $bar = unserialize($sermon->end); if (isset($foo[0]) && isset($bar[0])) echo sb_get_books($foo[0], $bar[0]) ?>',
		'[files_loop]' => '<?php foreach ((array) $media as $media_type => $media_names) { if (is_array($media_names) && $media_type != "Code") { foreach ((array)$media_names as $media_name) { ?>',
		'[/files_loop]' => '<?php } } } ?>',
		'[file]' => '<?php sb_print_url($media_name) ?>',
		'[file_with_download]' => '<?php sb_print_url_link($media_name) ?>',
		'[embed_loop]' => '<?php foreach ((array) $media as $media_type => $media_names) { if (is_array($media_names) && $media_type == "Code") { foreach ((array)$media_names as $media_name) { ?>',
		'[/embed_loop]' => '<?php } } } ?>',
		'[embed]' => '<?php sb_print_code($media_name) ?>',
		'[next_page]' => '<?php sb_print_next_page_link() ?>',
		'[previous_page]' => '<?php sb_print_prev_page_link() ?>',
		'[podcast_for_search]' => '<?php echo sb_podcast_url() ?>',
		'[podcast]' => '<?php echo sb_get_option("podcast_url") ?>',
		'[itunes_podcast]' => '<?php echo str_replace("http://", "itpc://", sb_get_option("podcast_url")) ?>',
		'[itunes_podcast_for_search]' => '<?php echo str_replace("http://", "itpc://", sb_podcast_url()) ?>',
		'[podcasticon]' => '<img alt="Subscribe to full podcast" title="Subscribe to full podcast" class="podcasticon" src="<?php echo SB_PLUGIN_URL ?>/sb-includes/icons/podcast.png"/>',
		'[podcasticon_for_search]' => '<img alt="Subscribe to custom podcast" title="Subscribe to custom podcast" class="podcasticon" src="<?php echo SB_PLUGIN_URL ?>/sb-includes/icons/podcast_custom.png"/>',
		'[editlink]' => '<?php sb_edit_link($sermon->id) ?>',
		'[creditlink]' => '<div id="poweredbysermonbrowser">Powered by <a href="http://www.sermonbrowser.com/">Sermon Browser</a></div>',
	);
}

function sb_sermon_page_dictionary() {
	return array(
		'[sermon_title]' => '<?php echo stripslashes($sermon["Sermon"]->title) ?>',
		'[sermon_description]' => '<?php echo wpautop(stripslashes($sermon["Sermon"]->description)) ?>',
		'[preacher_link]' => '<a href="<?php sb_print_preacher_link($sermon["Sermon"]) ?>"><?php echo stripslashes($sermon["Sermon"]->preacher) ?></a>',
		'[preacher_description]' => '<?php sb_print_preacher_description($sermon["Sermon"]) ?>',
		'[preacher_image]' => '<?php sb_print_preacher_image($sermon["Sermon"]) ?>',
		'[series_link]' => '<a href="<?php sb_print_series_link($sermon["Sermon"]) ?>"><?php echo stripslashes($sermon["Sermon"]->series) ?></a>',
		'[service_link]' => '<a href="<?php sb_print_service_link($sermon["Sermon"]) ?>"><?php echo stripslashes($sermon["Sermon"]->service) ?></a>',
		'[date]' => '<?php echo sb_formatted_date ($sermon["Sermon"]) ?>',
		'[passages_loop]' => '<?php $ref_output = array(); for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): ?>',
		'[/passages_loop]' => '<?php endfor; echo implode($ref_output, ", "); ?>',
		'[passage]' => '<?php $ref_output[] = sb_get_books($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i]) ?>',
		'[files_loop]' => '<?php $media = sb_get_stuff($sermon["Sermon"]); foreach ((array) $media as $media_type => $media_names) { if (is_array($media_names) && $media_type != "Code") { foreach ((array)$media_names as $media_name) {  ?>',
		'[/files_loop]' => '<?php } } } ?>',
		'[file]' => '<?php sb_print_url($media_name) ?>',
		'[file_with_download]' => '<?php sb_print_url_link($media_name) ?>',
		'[embed_loop]' => '<?php $media = sb_get_stuff($sermon["Sermon"]); foreach ((array) $media as $media_type => $media_names) { if (is_array($media_names) && $media_type == "Code") { foreach ((array)$media_names as $media_name) { ?>',
		'[/embed_loop]' => '<?php } } } ?>',
		'[embed]' => '<?php sb_print_code($media_name) ?>',
		'[next_sermon]' => '<?php sb_print_next_sermon_link($sermon["Sermon"]) ?>',
		'[prev_sermon]' => '<?php sb_print_prev_sermon_link($sermon["Sermon"]) ?>',
		'[sameday_sermon]' => '<?php sb_print_sameday_sermon_link($sermon["Sermon"]) ?>',
		'[tags]' => '<?php sb_print_tags($sermon["Tags"]) ?>',
		'[esvtext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "esv"); endfor ?>',
		'[kjvtext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "kjv"); endfor ?>',
		'[asvtext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "asv"); endfor ?>',
		'[nettext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "net"); endfor ?>',
		'[ylttext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "ylt"); endfor ?>',
		'[webtext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "web"); endfor ?>',
		'[akjvtext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "akjv"); endfor ?>',
		'[hnvtext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "hnv"); endfor ?>',
		'[lbrvtext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "rv1909"); endfor ?>',
		'[cornilescutext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "cornilescu"); endfor ?>',
		'[synodaltext]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): echo sb_add_bible_text ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i], "synodal"); endfor ?>',
		'[biblepassage]' => '<?php for ($i = 0; $i < count($sermon["Sermon"]->start); $i++): sb_print_bible_passage ($sermon["Sermon"]->start[$i], $sermon["Sermon"]->end[$i]); endfor ?>',
		'[editlink]' => '<?php sb_edit_link($sermon["Sermon"]->id) ?>',
		'[creditlink]' => '<div id="poweredbysermonbrowser">Powered by <a href="http://www.sermonbrowser.com/">Sermon Browser</a></div>',
	);
}

?>