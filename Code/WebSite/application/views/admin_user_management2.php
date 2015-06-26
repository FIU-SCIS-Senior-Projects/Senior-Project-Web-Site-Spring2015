<?php $this->load->view("template_header"); ?>
<script src="<?php echo base_url() ?>js/jquery.redirect.js"></script>
<h3>User Management</h3>



<br>
<div id="machines">
<div class="machine col-md-12">

<table class="table table-bordered" id="machines_table">
    <thead>
		<tr></tr>
        <tr>
            <!-- Filters -->
            <th></th>
            <th></th>
            <th>
                <input id="fn" class="input-small text-filter" type="text" value="<?php echo $fn ?>">
            </th>
            <th>
                <input id="ln" class="input-small text-filter" type="text" value="<?php echo $ln ?>">
            </th>
            <th>
                <input id="email" class="input-medium text-filter" type="text" value="<?php echo $email ?>">
            </th>
            <th>
                <select class="field-custom dropdown" id="role">
                  <?php echo '<option '.($role==='ALL ROLES'?'selected="selected"':'').' value="ALL ROLES">ALL ROLES</option>'; ?>
                  <?php echo '<option '.($role==='STUDENT'?'selected="selected"':'').' value="STUDENT">STUDENT</option>'; ?>
                  <?php echo '<option '.($role==='PROFESSOR'?'selected="selected"':'').'value="PROFESSOR">PROFESSOR</option>'; ?>
                  <?php echo '<option '.($role==='HEAD'?'selected="selected"':'').' value="HEAD">HEAD</option>'; ?>
                </select>
            </th>
            <th>
                <select class="field-custom dropdown" id="status">
                  <?php echo '<option '.($status==='ALL STATUS'?'selected="selected"':'').' value="ALL STATUS">ALL STATUS</option>'; ?>
                  <?php echo '<option '.($status==='INACTIVE'?'selected="selected"':'').' value="INACTIVE">INACTIVE</option>'; ?>
                  <?php echo '<option '.($status==='PENDING'?'selected="selected"':'').'value="PENDING">PENDING</option>'; ?>
                  <?php echo '<option '.($status==='ACTIVE'?'selected="selected"':'').' value="ACTIVE">ACTIVE</option>'; ?>
                </select>
            </th>
			<th>
				<select class="field-custom dropdown" id="linkedIn">
				  <?php echo '<option '.($linkedIn==='ALL'?'selected="selected"':'').' value="ALL">ALL</option>'; ?>
                  <?php echo '<option '.($linkedIn==='YES'?'selected="selected"':'').' value="YES">YES</option>'; ?>
                  <?php echo '<option '.($linkedIn==='NO'?'selected="selected"':'').' value="NO">NO</option>'; ?>
                  <?php echo '<option '.($linkedIn==='No Picture'?'selected="selected"':'').' value="No Picture">No Picture</option>'; ?>
                  <?php echo '<option '.($linkedIn==='No LinkedIn'?'selected="selected"':'').' value="No LinkedIn">No LinkedIn</option>'; ?>
                  <?php echo '<option '.($linkedIn==='No Experience'?'selected="selected"':'').' value="No Experience">No Experience</option>'; ?>
                  <?php echo '<option '.($linkedIn==='No Skills'?'selected="selected"':'').' value="No Skills">No Skills</option>'; ?>
                </select>
			</th>
            <th>
				<select class="field-custom dropdown" id="rank">
				  <?php echo '<option '.($rank==='ALL'?'selected="selected"':'').' value="ALL">ALL</option>'; ?>
                  <?php echo '<option '.($rank==='YES'?'selected="selected"':'').' value="YES">YES</option>'; ?>
                  <?php echo '<option '.($rank==='NO'?'selected="selected"':'').' value="NO">NO</option>'; ?>
			</th>
			<th></th>
            <!-- end filters -->
        </tr>
        <tr>
            <th style="display:none;">Id No.</th>
            <th> <input name="selectall" type="checkbox" id="selectall" class="selectall" /> <div id="checkBoxList"> </th>
            <th>Picture</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
			<th>LinkedIn</th>
			<th>Ranks</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requests as $request):?>
        <tr class="rows" id="userRow_<?php echo $request->id ?>" onClick="specialCase(<?php echo $request->id ?>)">
            <td style="display:none;">
                <select id="idRow_<?php echo $request->id ?>" class="field-custom idRow" name="id">
                    <?php echo '<option>'.$request->id.'</option>'?>
                </select>
            </td>
            <td><?php echo " <input class=\"checkbox\" type=\"checkbox\" name=\"userRows\" id=\"userCheck_".$request->id."\" /> " ?> </td>
            <td>
                <div>
                    <a onclick="return emulateUser(<?php echo '\''.$request->email.'\',\''.$request->hash_pwd.'\',\''.$request->role.'\','.$request->id ?>);" href="" data-toggle="tooltip" title="Act as User">
                        <img onError="this.onerror=null;this.src='img/no-photo.jpeg';" src="<?php if($request->picture) echo $request->picture; else echo base_url( getImage($request->id) ); ?>" alt="" class="img-polaroid" height="50" width="50">
                    </a>
                </div>
            </td>
            <td>
                <input id="col_1" name="col_1" class="input-small mg-top-20 inputText" type="text" value="<?php echo $request->first_name ?>">
            </td>
            <td>
                <input id="col_2" name="col_2" class="input-small mg-top-20 inputText" type="text" value="<?php echo $request->last_name ?>">
            </td>
            <td>
                <input id="col_3" name="col_3" class="input-medium mg-top-20 inputText" type="text" value="<?php echo $request->email ?>">
            </td>
            <td>
                <select name="col_4" class="field-custom mg-top-20 inputText" id="col_4">
                    <?php 
                        $roles = array('HEAD','STUDENT','PROFESSOR'
                            );
                                foreach($roles as $st){
                                    if($request->role == $st){
                                        echo'<option value ='.$st.' selected="selected">'.$st.'</option>';
                                    }else{
                                     echo'<option value="'.$st.'">'.$st.'</option>';
                                    }
                                }
                    ?>
                </select>
            </td>
            <td>
                <select name="col_5" class="field-custom mg-top-20 inputText" id="col_5" >
                  <?php 
                        $sta = array('PENDING','ACTIVE','INACTIVE'
                            );
                                foreach($sta as $st){
                                    if($request->status == $st){
                                        echo'<option value ='.$st.' selected="selected">'.$st.'</option>';
                                    }else{
                                     echo'<option value="'.$st.'">'.$st.'</option>';
                                    }
                                }
                    ?>
                </select>
            </td>
			<td> 
				<div class="field-custom mg-top-20" >
				<?php
					//if ($request->headline_linkedIn == NULL){echo "NO";} else {echo "YES";}
								$linkedIn = true;
								$output = "Missing:\n";
								
								if(!($request->picture) || $request->picture = ''){
                                    //$output .= "  Picture <br>\n" ;
									$output .= "  Picture\n" ;
									$linkedIn = false;
                                }
                                if(!($request->headline_linkedIn)){
                                    //$output .= "  LinkedIn <br>\n" ;
                                    $output .= "  LinkedIn\n" ;
									$linkedIn = false;
                                }
								if(!($request->experience)){
                                    //$output .= "  Experience <br>\n" ;
                                    $output .= "  Experience\n" ;
									$linkedIn = false;
                                }
								if(!($request->skill)){
                                    $output .= "  Skills" ;
									$linkedIn = false;
                                }
								if($linkedIn == false){
									echo "<a toggle=\"tooltip\" title=\"".$output."\">NO<br></a>";
									//echo $output;
								}
								else
									echo "YES";
				?>
				</div>
				
			</td>
			<td>
				<div class="field-custom mg-top-20" > 
				<?php
					$min = $this->spw_match_model->getMinimum();
					if($request->rank >= $min)
							echo 'YES';
					elseif($request->rank < $min){
							$need = "Needs " . ($min - $request->rank) . " more to rank";
							//echo 'NO <br>Need ' . ($min-$request->rank) . " more";
							echo "<a toggle=\"tooltip\" title=\"".$need."\">NO</a>";
					}
					else
							echo "N/A";
					
				?>
				</div>
			</td>
            <td>
                <div class="mg-top-20">
            <?php
                $msg = "Are you sure you want to delete user $request->first_name $request->last_name ?";
                $url = "id=$request->id&fn=$fn&ln=$ln&email=$email&role=$role&status=$status&headline_linkedIn=headline_LinkedIn";
                echo("<a data-toggle=\"tooltip\" title=\"Delete User\" href=".base_url('./userManagement?'.$url).
                        " onclick=\"return confirm('$msg')\"> <img id=\"\" src=".
                        base_url('img/deletered.png')." height=\"20\" width=\"20\" > </a> 
						<a data-toggle=\"tooltip\" title=\"Save User\"> <img id=\"\" src=".
                        base_url('img/savegray.png')." height=\"20\" width=\"20\" > </a>");
				echo $fn;
            ?>
                </div>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</div>
<button id="submitRequests" type="button" class="btn btn-primary userBtn" disabled="disabled" style="background-color:gray">Save</button>
</div>
<script type="text/javascript">
function filterForm(){
   
    var fn = $("#fn").val();
    var ln = $('#ln').val();
    var email = $('#email').val();
    var status = $('#status').val();
    var role = $("#role").val();
	var linkedIn = $('#linkedIn').val();
	var rank = $('#rank').val();
    
    var whereto = "./userManagement?";
    
    if(role!=='') whereto+="role="+role+"&";
    if(status!=='') whereto+="status="+status+"&";
	if(linkedIn!=='') whereto+="linkedIn="+linkedIn+"&";
	if(rank!=='') whereto+="rank="+rank+"&";
    if(fn!=='') whereto+="fn="+fn+"&";
    if(ln!=='') whereto+="ln="+ln+"&";
    if(email!=='') whereto+="email="+email+"&";

    var lastChar = whereto.charAt(whereto.length-1);
    console.log("last char: "+lastChar);
    if(lastChar==='&'){
        console.log("in here");
        whereto = whereto.substring(0,whereto.length-1);
    }
    console.log(whereto);
    window.location.href = whereto;
}



$('.text-filter').keyup(function(e){
    if(e.keyCode == 13)
    {
        filterForm();
    }
});

//Test to check for changed fields
$(".inputText").each(function() {
    //Collect the values of each column
    var old_col_1 = ($(this).closest('tr').find('[name=col_1]'));
    var old_col_2 = ($(this).closest('tr').find('[name=col_2]'));
    var old_col_3 = ($(this).closest('tr').find('[name=col_3]'));
    var old_col_4 = ($(this).closest('tr').find('[name=col_4]'));
    var old_col_5 = ($(this).closest('tr').find('[name=col_5]'));
    
    // Save current values of elements
    old_col_1.data('oldFn', old_col_1.val());
    old_col_2.data('oldLn', old_col_2.val());
    old_col_3.data('oldEmail', old_col_3.val());
    old_col_4.data('oldRole', old_col_4.val());
    old_col_5.data('oldStatus', old_col_5.val());

    // Look for changes in the value
    $(this).bind("propertychange change click keyup input paste", function(event){
        var checkExists = false;
        var allChecks = false;
        // Updated stored value, for SCIENCE!
        //    elem.data('oldVal', elem.val());

        var col_1 = ($(this).closest('tr').find('[name=col_1]').val());
        var col_2 = ($(this).closest('tr').find('[name=col_2]').val());
        var col_3 = ($(this).closest('tr').find('[name=col_3]').val());
        var col_4 = ($(this).closest('tr').find('[name=col_4]').val());
        var col_5 = ($(this).closest('tr').find('[name=col_5]').val());
      
      //Testing purposes, use Inspect Element and look at console
      //  console.log(old_col_1.data('oldFn'));
      //  console.log(col_1, col_2, col_3, col_4, col_5);

      // If value has changed...
      if (old_col_1.data('oldFn') != (col_1) || old_col_2.data('oldLn') != (col_2) || old_col_3.data('oldEmail') != (col_3) 
            || old_col_4.data('oldRole') != (col_4) || old_col_5.data('oldStatus') != (col_5) ) {
           	
            $(this).closest('tr').css('background', 'lightyellow');
            $(this).closest('tr').find('[type=checkbox]').prop('checked', true);
	  }else{
            $(this).closest('tr').css('background', '');
            $(this).closest('tr').find('[type=checkbox]').prop('checked', false);
	  }
      
      $('.checkbox').each(function() {
            //If there is at least one checkbox checked...
            if(this.checked){
                checkExists = true;
            }
        });
      //Check if all checkboxes are checked
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            allChecks = true;
        }
        if(checkExists){
                $('.userBtn').each(function() {
                        this.disabled = false;
                        $(this).css('background', '');
                    });
                if(allChecks){
                    $('.selectall').each(function() {
                        this.checked = true;
                        this.indeterminate = false;
                    });
                }else{
                    $('.selectall').each(function() {
                        this.checked = true;
                        this.indeterminate = true;
                    });
                }
        }else{
            $('.selectall').each(function() {
                this.checked = false;
                this.indeterminate = false;
            });
            $('.userBtn').each(function() {
                    this.disabled = true;
                    $(this).css('background', 'gray');
                });
        }
    });
 });

$(".dropdown" ).change(function() {
    filterForm();
});

$('#submitRequests').click(function(){
    console.log("Clicked submit");
    var data = getTableContent();
    var validInput = isValidInput(data);
    console.log("machines: ");
    console.log(data);

    if(validInput){
        uploadMachines(data);
    }
});

//Function for the master/parent checkbox
$('.selectall').on('click', function(event) {
	if(this.checked || this.indeterminate) {
		$('.checkbox').each(function() {
			this.checked = true;
		});
        $('.userBtn').each(function() {
                this.disabled = false;
                $(this).css('background', '');
            });
	}else{
		$('.checkbox').each(function() {
			this.checked = false;                     
		});
        $('.userBtn').each(function() {
                this.disabled = true;
                $(this).css('background', 'gray');
            });   
	}
});

//Check for child checkboxes  that change and reflect it on the parent checkbox
$('.checkbox').change(function(event) {
	var checkExists = false;
	var allChecks = false;
	$('.checkbox').each(function() {
		//If there is at least one checkbox checked...
		if(this.checked){
			checkExists = true;
		}
	});
	
	//Check if all checkboxes are checked
	if ($('.checkbox:checked').length == $('.checkbox').length) {
       	allChecks = true;
    }
	
	if(checkExists){
        $('.userBtn').each(function() {
                this.disabled = false;
                $(this).css('background', '');
            });
		if(allChecks){
			$('.selectall').each(function() {
				this.checked = true;
				this.indeterminate = false;
			});
		}else{
			$('.selectall').each(function() {
				this.checked = true;
				this.indeterminate = true;
			});
		}
	}
	else{
		$('.selectall').each(function() {
			this.checked = false;
			this.indeterminate = false;
		});
        $('.userBtn').each(function() {
                this.disabled = true;
                $(this).css('background', 'gray');
            });
	}
});



function emulateUser(email_address,password,role,id){
    console.log("Redirecting!!!");
    $.redirect("./admin/impersonate", { "email_address": email_address, "password": password, "role":role, "id":id });
    return false;
}

function uploadMachines(machineList){
    var url = "./userManagement";
    console.log(url);
    console.log(JSON.stringify(machineList));
    $.ajax({
        type: "POST",
        url: url,
        data: JSON.stringify(machineList),
        dataType: "json",
        success: function(response){
            console.log("response");
            console.log(response);
            if(response.success){
                //do page reload when success
                location.reload();
            }else{
                //show meassage when not success
                alert("Upload Failed");
            }
        }
    });
    
}

function getTableContent() {
    var data = [];
    var table = $('#machines_table tbody tr');
    for(var i = 0 ; i< table.length;i++){
        var row = table.eq(i);
        var id = row.find('[name="id"]').val();
        var col_1 = row.find('[name="col_1"]').val();
        var col_2 = row.find('[name="col_2"]').val();
        var col_3 = row.find('[name="col_3"]').val();
        var col_4 = row.find('[name="col_4"]').val();
        var col_5 = row.find('[name="col_5"]').val();
		
        var obj = {
            "id":id,
            "col_1":col_1,
            "col_2":col_2,
            "col_3":col_3,
            "col_4":col_4,
            "col_5":col_5
        };
        data.push(obj);
    }
    return data;
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n) && n > 0;
}
function isValidInput(arr){
    for(var i in arr){
        var col_1 = arr[i].col_1;
        var col_2 = arr[i].col_2;
        var col_3 = arr[i].col_3;
        if(isNumber(col_1) || col_1 == ''){
            alert("First Name value: "+ col_1 +" must not be empty or numeric");
            return false;
        }
        if(isNumber(col_2) || col_2 == ''){
            alert("Last Name value: "+ col_2 +" must not be empty or numeric");
            return false;
        }
        if(!isEmail(col_3)){
            alert("Email value: "+ col_3 +" is not correct or empty");
            return false;
        }
    }
    return true;
}

</script>
<?php $this->load->view("template_footer"); ?>