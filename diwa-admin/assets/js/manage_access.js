(function($){

    $('#aAccForm').on("submit", function(e){
        e.preventDefault();
        let $d = $("#aAccForm").serializeArray();
        $.ajax({
            url: location.origin+"/diwa-admin/api/addAccess",
            type: 'post',
            data: $d,
            success: function(res){
                
                $res = JSON.parse(res);
                console.log($res);
                console.log($d);
            
                

                if($res['response'] == 'error'){
                    Swal.fire({
                        title: "Unable to add user",
                        text: '',
                        icon: "error",
                        timer: 2000,
                        showConfirmButton: false
                    });
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

                        $.ajax({
                                url:location.origin + '/diwa-admin/api/getAccess',
                                type:'post',
                                success:function(data){
                                    $res = JSON.parse(data);
                                let accessID = $($res).get(-1)['accessID'];

                             myTable = $("#userstable").DataTable();
                            let row = [];
                            row.push(accessID);
                            row.push(`${$d[0]['value']}`);
                            row.push(`${$d[1]['value']}`);
                            row.push(`${$d[2]['value']}`);
                            row.push(`${$d[3]['value']}`);
                            row.push(`<a href="#" class="btn btn-danger" id="del" value="<?= $d->componentID ?>"> Delete </a>`)
                            row.push(`<button href="#updatecomponentModal"  data-toggle="modal" class="btn btn-primary" id="update"> Update </button>`)
                            myTable.row.add(row).draw();
                            $('#aAccForm')[0].reset(); 
                                }
                            })
                           



                            

                        });
                }
                  
                
            }
        })
    })


$(document).on("click", '#del', function(){

    
    let del_id = $(this).attr('value');
    
    let myTable = $("#userstable").DataTable();
    myTable.row($(this).parents('tr')).remove().draw();


    if(del_id == ''){
        alert("delete is required!");
    }
    else {
        $.ajax({
            url: location.origin + "/diwa-admin/api/deleteAccess",
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
                            showConfirmButton:true
                        })
                    }
                });
    
        
    }
})






$(document).on('click', '#update', function(){
    
    let update_id = $(this).attr('value');

    if (update_id == ''){
        alert("Update is required!");
    }
    else{
        $.ajax({
            url: location.origin + "/diwa-admin/api/updateAccessDetails",
            type: 'post',
            dataType: 'json',
            data: {
                update_id : update_id
            },
            success:function(data){
                console.log(data);
                
                if(data.responce == 'success'){
                    $("#updateAccessID").val(data.post.accessID);
                    $("#componentAccessID").val(data.post.componentID);
                    $("#userJurAccessID").val(data.post.userJurID);
                    $("#usertypeAccessID").val(data.post.userTypeID);
                    $("#agencyAccessID").val(data.post.agencyID);
                   
                }
                else{
                    
                }
                
            }
        })
    }
    
})


$(document).on("click", '#updateFormBtn', function(e){
    e.preventDefault();

    let updateAccessID = $("#updateAccessID").val();
    let updateAccessComponentID = $("#componentAccessID").val();
    let updateAccessUserJurID = $("#userJurAccessID").val();
    let updateAccessUserTypeAccessID = $("#usertypeAccessID").val();
    let updateAccessAgencyID = $("#agencyAccessID").val();
    
    if (updateAccessID == '' ||updateAccessComponentID == '' || updateAccessUserJurID  == '' || updateAccessUserTypeAccessID  == "" ||  updateAccessAgencyID== "" ){
        alert("Input field is required!");
    }
    else {
        $.ajax({
            url: location.origin + '/diwa-admin/api/updateAccessDetailsForm',
            type: 'post',
            dataType: 'json',
            data: {
                updateAccessID: updateAccessID,
                updateAccessComponentID : updateAccessComponentID,
                updateAccessUserJurID : updateAccessUserJurID,
                updateAccessUserTypeAccessID : updateAccessUserTypeAccessID,
                updateAccessAgencyID : updateAccessAgencyID
                
            },
            success:function(data){
            
                if (data.responce == 'success') {
                    $('.modal').hide();
                    $('.fade').hide();

                    
                    Swal.fire({
                        title: "Succesfully Updated",
                        text: "",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton:false
                    }).then(function(){
                            
                            
                        
                    });
                } else {
                    Command: toastr["error"](data.message)

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                    
            $("#updateAccForm")[0].reset();
            }
        
    
            
        })
    }
})


})(jQuery);