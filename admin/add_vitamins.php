
<div class="modal fade" id="Addvitamins" aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-header">
        <h5 class="modal-title" id="AddSuppliesLabel" style="font-size: 20px; font-weight: bold;">Add Vitamins</h5>
      </div>
		<div style="    width: max-content;"class="modal-content">
        <form id="" action="vitamins_query.php" method="POST">
   

            <div class="input-group mb3">
                <span class="input-group-text" id="addon-wrapping" style="width: 20%;">Product</span>
                <input  class="form-control" name="Product" required="true"  style="width: 50%;">
            </div>

            <div class="input-group mb3">
                <span class="input-group-text" id="addon-wrapping" style="width: 20%; margin-top: 15px;">Quantity</span>
                <input type="number" class="form-control" min="0" name="Quantity" required="true" style="width: 50%; margin-top: 15px;">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01" required= "true" style="margin-top: 15px; width: 20%;">Unit</label>
                    <select class="form-select" name="Unit"  id="inputGroupSelect01" required="true" style="width: 79%; margin-top: 15px;" required>
                        <option selected>Choose...</option>
                        <option value="Pieces">Pieces</option>
                        <option value="Pack">Pack</option>
                        <option value="Kls">Kls</option>
                    </select>
            </div>

            <div class="input-group mb3">
                <span class="input-group-text" id="addon-wrapping" style="width: 20%; margin-top: 15px; margin-bottom: 15px;">Expiration</span>
                <input type="date" id="Expiry_date" name="Expired_date" required="true" style="width: 79%; margin-top: 15px; margin-bottom: 15px;">
            </div>

        <!-----modal footer-->

        <div class="modal-footer">					
        <input type="submit" name="save" class="btn btn-primary" value="Save"> 
                <a type="button" class="btn cancel" href="supplies.php" style="border: solid;">Close</a>
        </div>  

       
    </form>
		</div>
	
</div>
