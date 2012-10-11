<div id="sidebarLeft" class="sidebar">

<?php /*?><?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>

	<h2>Topics</h2>  
		<ul>
			<?php wp_list_cats('sort_column=name&hierarchical=0'); ?>
    	</ul>
		<ul>

<?php endif; ?><?php */?>

<h2>Find an Affiliate Program</h2>
<div class="find-search">
<input name="directorysrch" id="directorysrch" type="text" placeholder="search" />
<input name="directorysubmit" id="directorysubmit" type="submit" onclick="return getAffiliateProgramlist()" />
</div>
<div class="af-list">
  
<ul class="af-left-menu">
<?php
	$maincats=mysql_query("SELECT wt.term_id, wt.name, wt.slug FROM wpdp_terms wt, wpdp_term_taxonomy wtt WHERE wtt.term_id = wt.term_id
AND wtt.taxonomy = 'category' AND wtt.parent =0  and wt.term_id != 1 order by wt.name asc");
	while($fet_maincats=mysql_fetch_object($maincats)){
		$subcats=mysql_query("SELECT wt.name, wt.slug FROM wpdp_terms wt, wpdp_term_taxonomy wtt WHERE wtt.term_id = wt.term_id
AND wtt.taxonomy = 'category' AND wtt.parent =".$fet_maincats->term_id." order by wt.name asc");
		if(mysql_num_rows($subcats)){
			echo "<li><a href='/directory/".$fet_maincats->slug."/' class='acc_trigger'>".$fet_maincats->slug."</a>";
			echo "<ul style='display: none;' class='acc_container'>";
			while($fet_subcats=mysql_fetch_object($subcats)){
				echo "<li><a href='/directory/".$fet_maincats->slug."/".$fet_subcats->slug."/'>- ".$fet_subcats->name."</a></li>";
			}
			echo "</ul></li>";
		}else{
			echo "<li><a href='/directory/".$fet_maincats->slug."/' class='acc_trigger'>".$fet_maincats->slug."</a></li>";
		}
	}

?>
</ul>
</div>
<div class="add-own"><a href="/directory/package-info/"><img src="<?php bloginfo('template_url'); ?>/images/plus-icon.png" /></a> <a href="/directory/package-info/">Add</a> your own affiliate program</div>


</div>