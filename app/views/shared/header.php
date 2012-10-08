<?php
$db = new query;
$main_links = $db->select('*','pavs_main_links','','order_by',0,0,10);
?>

<div id="topBar" class="topBarWidth">
	<div class="topBarLinks">
		<?php
		for ($p = 0; $p < count($main_links); $p++)
		{
			$name = $main_links[$p]['name'];
			$id = $main_links[$p]['id'];
			?>
			<div class="bubble_viewer">
				<?php
				if ($name == $tab)
				{
					?>
					<div class="bubble bgc_dark" style="display:block;">
					</div>
					<?php
				}
				else
				{
					?>
					<div class="bubble bgc_dark"></div>
					<?php
				}
				?>
				<a href="<?php echo $main_links[$p]['url']; ?>" <?php if ($name == $tab) { echo "class='selected'"; } ?> title="<?php echo $main_links[$p]['title']; ?>" drop-down="<?php echo $id; ?>_menu" class="drop_down_menu" drop-down="<?php echo $id; ?>_menu" class="drop_down_menu">
					<?php echo $name; ?>
				</a>
				<?php drop_down(array(array('Link1','link1.php'),array('Link2','link2.php')), $id.'_menu', 86); ?>
			</div>
			<?php
		}

		require(ROOT."app/views/shared/search.php");
		?>
		<div class="cbo"></div>
	</div>
</div>