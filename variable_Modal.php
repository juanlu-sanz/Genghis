<?php 
function pop_modal($name_id, $var_properties){
	?> 
	<div <?php echo "id=\"".implode("-", explode(" ", $name_id))."modal\""; ?> class="modal hide fade span8" style="display: none; margin-left: -370px; ">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">×</button>
			<h3>Edicion de variable: <?php echo $name_id; ?></h3>
		</div>
		<div class="modal-body">
			
			 <div class="span2" style="padding: 8px 0; margin-left:-8px;">
                <ul id="tab" class="nav nav-list">
                    <li class="nav-header">Tipo de variable</li>
                    <li class=""><a href="#Random_Number" data-toggle="tab"><i class="icon-random"></i> Random Number</a></li>
                    <li class=""><a href="#Random_Name" data-toggle="tab"><i class="icon-user"></i> Random Name</a></li>
                </ul>
            </div>

            <div id="myTabContent" class="span5 tab-content">
                <div class="tab-pane fade" id="Random_Number">
                    <h2>Random Number selected</h2>
                    <p>This works</p>
                </div>
                <div class="tab-pane fade" id="Random_Name">
                    <h2>Random Name selected</h2>
                    <p>This also works</p>
                </div>
        	</div>

		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-danger" data-dismiss="modal">Delete Variable</a>
			<a href="#" class="btn" data-dismiss="modal">Cancel</a>
			<a href="#" class="btn btn-primary">Save</a>
		</div>
	</div>
	<?php
	}
?>
