<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[event_id])
	{
		$SQL="SELECT * FROM event WHERE event_id = $_REQUEST[event_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?> 
<script>

jQuery(function() {
	jQuery( "#event_edate" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-65:-10",
	   dateFormat: "dd/mm/yy"
	});
});
</script>
<style>
ul.forms li.txt {
	width:150px;
}
</style>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Add Event Details</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/event.php" enctype="multipart/form-data" method="post" name="frm_event">
					<ul class="forms">
						<li class="txt">Title</li>
						<li class="inputfield"><input name="event_title" id="event_title" type="text" class="bar" required value="<?=$data[event_title]?>"/></li>
					</ul>
					</ul>
					<ul class="forms">
						<li class="txt">Date of event</li>
						<li class="inputfield"><input name="event_edate" id="event_edate" type="text" class="bar" required value="
						<?=$data[event_edate]?>" /></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="inputfield">
							<textarea name="event_description" class="bar" required style="height:100px; width:250px;"><?=$data[event_description]?></textarea>
						</li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_event">
					<input type="hidden" name="event_id" value="<?=$data[event_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
