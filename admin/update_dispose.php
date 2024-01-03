
<div class="modal fade" id="update_dispose<?php echo $r['ca_id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div style="width: max-content;"class="modal-content">
			<form method="POST" action="dispose_query.php">
				<div class="modal-header">
					<h3 class="modal-title">Add Disposed quails</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Number of Disposed quails</label>
              
							<input type="hidden" name="ca_id" value="<?php echo $r['ca_id']?>"/>
							<input type="number" name="disposes" value="0" class="form-control" required="required"/>
						</div>
						
					</div>
				</div>
				<div style="clear:both;"></div>
				<div style="align-items: center;
    display: flex;
    justify-content: center;" class="modal-footer">
					<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
				<a	class="btn btn-danger" type="button" href="device.php"><span class="glyphicon glyphicon-remove"></span> Close</a>
				</div>
				</div>
			</form>
		</div>
	
</div>
