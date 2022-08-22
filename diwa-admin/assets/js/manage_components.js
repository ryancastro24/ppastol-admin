(function($){






	$('#auform').on("submit", function(e){
		e.preventDefault();
		let $d = $("#auform").serializeArray();
		$.ajax({
			url: location.origin+"/diwa-admin/api/addComponent",
			type: 'post',
			data: $d,
			success: function(res){
				

				$res = JSON.parse(res);
				console.log($res);

				

				if($res['response'] == 'error'){
					Swal.fire({
						title: "Unable to add user",
						text: '',
						icon: "error",
						timer: 2000,
						showConfirmButton: false
					})
				}

				else if($res['response'] == 'invalid'){
					$("#componentNameID").css({'border':'2px solid red'});
					$("#emptyError").html("data already exist!").css({'color':'red', 'font-weight':'700'})
				
				}
			
				else{
					$('.modal').hide();
					$('.fade').hide();	
					Swal.fire({
							title: "Succesfully Added",
							text: "",
							icon: "success",
							timer: 2000,
							showConfirmButton:false
						}).then(function(){

							
						let myTable = $("#componentsTable").DataTable();

							let row = [];
							row.push(`<input type="hidden" id="componentID" value="<?= $d->componentID ?>">${$d[0]['value']}`);
							row.push(`${$d[1]['value']}`);
							row.push(`${$d[2]['value']}`);
							row.push(`${$d[3]['value']}`);
							row.push(`${$d[4]['value']}`);
							row.push(`<a href="#" class="btn btn-danger" id="del" value="<?= $d->componentID ?>"> Delete </a>`)
							row.push(`<button href="#updatecomponentModal"  data-toggle="modal" class="btn btn-primary" id="update"> Update </button>`)
							myTable.row.add(row).draw();
							$('#auform')[0].reset(); 
						});
				}
					
			}
		});
	})





$(document).on("click", "#closeFormModal",function(e){
	e.preventDefault();
	$("#auform")[0].reset();
})



$(document).on("click", '#del', function(){

	
	let del_id = $(this).attr('value');
	
	let myTable = $("#componentsTable").DataTable();
	myTable.row($(this).parents('tr')).remove().draw();


	if(del_id == ''){
		alert("delete is required!");
	}
	else {
		$.ajax({
			url: location.origin + "/diwa-admin/api/deleteComponent",
			type: "post",
			dataType: 'json',
			data: {
				del_id : del_id
			},
			success: function(){
			Swal.fire({
							title: "Succesfully Deleted",
							text: "",
							icon: "success",
							timer: 2000,
							showConfirmButton:false
						})
					}
				});
	}
})


$(document).on('click', '#update', function(){
	
	let update_id = $(this).closest('tr').children().children('#componentID').val();
	

	if (update_id == ''){
		alert("Update is required!");
	}
	else{
		$.ajax({
			url: location.origin + "/diwa-admin/api/updateComponentDetails",
			type: 'post',
			dataType: 'json',
			data: {
				update_id : update_id
			},
			success:function(data){
				
				if(data.responce == 'success'){
					$("#update_modal_id").val(data.post.componentID);
					$("#updateComponentName").val(data.post.componentName);
					$("#updateComponentIcon").val(data.post.componentIcon);
					$("#updateComponentDesc").val(data.post.componentDesc);
					$("#updateComponentProject").val(data.post.componentProject);
					$("#updateComponentPath").val(data.post.componentPath);
				}
				else{
					
				}
				
			}
		})
	}
	
})


$(document).on("click", '#updateFormbtn', function(e){
	e.preventDefault();

	let updateComponentID = $('#update_modal_id').val();
	let updateComponentName = $("#updateComponentName").val();
	let updateComponentIcon = $("#updateComponentIcon").val();
	let updateComponentDesc = $("#updateComponentDesc").val();
	let updateComponentProject = $("#updateComponentProject").val();
	let updateComponentPath = $("#updateComponentPath").val();

	if(updateComponentName == '' || updateComponentIcon == '' || updateComponentDesc == "" ||  updateComponentProject == "" || updateComponentPath == ''){
		alert("Input field is required!");
	}


	else {
		$.ajax({
			url: location.origin + '/diwa-admin/api/updateComponentDetailsForm',
			type: 'post',
			data: {
				updateComponentID : updateComponentID,
				updateComponentName : updateComponentName,
				updateComponentIcon : updateComponentIcon,
				updateComponentDesc : updateComponentDesc, 
				updateComponentProject : updateComponentProject,
				updateComponentPath : updateComponentPath
			},
			success:function(data){
				$res = JSON.parse(data);


				if($res['response'] == 'error'){
					Swal.fire({
						title: "invalid data",
						text: "",
						icon: "error",
						timer: 2000,
						showConfirmButton:false
					})
				}


				else if($res['response'] == 'invalid') {
				

					$("#updateComponentName").css({'border':'2px solid red'});
					$("#updateEmptyError").html("data already exist").css({"color":'red','font-weight': '700'});
				
				
				}
				else{


					$('.modal').hide();
					$('.fade').hide();

						let sampleID = $("#update_modal_id").val();

						console.log(sampleID);
						
								let myTable = $("#componentsTable").DataTable();

                             	let row = myTable.row($('#' + sampleID).closest('tr'));
                             	let irow = row.index();
                             	console.log(irow);
                       
                             	
								myTable.cell({row:irow,column:0}).data(`${updateComponentName}`);
								myTable.cell({row:irow,column:1}).data(`${updateComponentIcon}`);
								myTable.cell({row:irow,column:2}).data(`${updateComponentDesc}`);
								myTable.cell({row:irow,column:3}).data(`${updateComponentProject}`);
								myTable.cell({row:irow,column:4}).data(`${updateComponentPath}`);
		                        
									
						




					//myTable.row('#myrow'+ updateComponentID).data(data).draw()
					Swal.fire({
						title: "Succesfully Updated",
						text: "",
						icon: "success",
						timer: 2000,
						showConfirmButton:false
					}).then(function(){
						 	
									
			$("#euform")[0].reset();
						
					});
				
				}



			
			}
		
	
			
		})
	}
});


})(jQuery);