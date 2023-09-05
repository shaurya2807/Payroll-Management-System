<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `event`";
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
function delete_event(event_id)
{
	if(confirm("Do you want to delete the event?"))
	{
		this.frm_event.event_id.value=event_id;
		this.frm_event.act.value="delete_event";
		this.frm_event.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Event Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_event" action="lib/event.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Name</td>
						<td scope="col">Date</td>
						<td scope="col">Description</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[event_id]?></td>
						<td><?=$data[event_title]?></td>
						<td><?=$data[event_edate]?></td>
						<td><?=$data[event_description]?></td>
						<td style="text-align:center">
							<a href="event.php?event_id=<?php echo $data[event_id] ?>">Edit</a> | <a href="Javascript:delete_event(<?=$data[event_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="event_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
