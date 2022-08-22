<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Access</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1.0</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button class="btn btn-primary" id="btnadduser" data-toggle="modal" href="#addcomponentModal"><strong><i class='fa fa-plus-circle'></i>  Add Access</strong></button>
              	<table class="table table-striped text-center" id="userstable">
	              		<thead>
	              			<th>AccessID</th>
	              			<th>ComponentID</th>
                      <th>userJurID</th>
	              			<th>userTypeID</th>
	              			<th>agencyID</th>
	              			<th>Action</th>
                      <th>Action</th>
	              		</thead>
	              		 <tbody id="tbody">
    
    
                  
                     <?php foreach($accessDetails as $d): ?>
	              				<tr>
                          
	              					<td><?= $d->accessID?></td>
	              					<td><?= $d->componentID?></td>
	              					<td><?= $d->userJurID?></td> 
	              					<td><?= $d->userTypeID?></td>
	              					<td><?= $d->agencyID?></td>
	              					<td><a href="#" class="btn btn-danger" id="del" value="<?= $d->accessID ?>" > Delete </a></td>
	              					<td><button href="#updateAccessModal"  data-toggle="modal" class="btn btn-primary" id="update" value="<?= $d->accessID?>" > Update </button></td>
	              					
	              				</tr>
	              			<?php endforeach; ?>
	           
	              		</tbody>
	              	</table>

              </div>
             </div>
            </div>
          </div>
        </div>
      </section>

</div>
 <!-- add component modal-->

<div class="modal fade" tabindex="-1" role="dialog" id="addcomponentModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   	<form id="aAccForm" method="POST" class="form" action="">
	      <div class="modal-header">
	        <h5 class="modal-title">Add Access</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">


          <div class="form-group">
              <label for="componentAccessID" class="">Component ID</label>
              <select type="text" class="form-control" name="componentID" id="userJurID" required>
                <?php foreach($componentID as $d) { ?>
                   <option value="<?=$d->componentID?>"><?=$d->componentName?></option>
                <?php } ?>
              </select>
            </div>


	           <div class="form-group">
              <label for="userJurID" class="">User Jurisdiction</label>
              <select type="text" class="form-control" name="userJurID" id="userJurID" required>
                <?php foreach($userJurID as $d) { ?>
                   <option value="<?=$d->userJurID?>"><?=$d->userJurName?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="userTypeID" class="">UserType ID</label>
              <select type="text" class="form-control" name="userTypeID" id="userJurID" required>
                <?php foreach($userTypeID as $d) { ?>
                   <option value="<?=$d->userTypeID?>"><?=$d->userTypeName?></option>
                <?php } ?>
              </select>
            </div>


            <div class="form-group">
              <label for="agencyAccessID" class="">Agency ID</label>
              <select type="text" class="form-control" name="agencyID" id="userJurID" required>
                <?php foreach($agencyID as $d) { ?>
                   <option value="<?=$d->agencyID?>"><?=$d->agencyName?></option>
                <?php } ?>
              </select>
            </div>


                     </div>
         
	      <div class="modal-footer">
	        <button type="submit" id="create"  class="btn btn-primary">Create</button>
	        <button type="button" class="btn btn-secondary" id="closeFormModal" data-dismiss="modal">Close</button>
	      </div>

    </form>
	    </div>
  </div>
</div>






<!--access update modal--> 

<div class="modal fade" tabindex="-1" role="dialog" id="updateAccessModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    <form id="updateAccForm" method="POST" class="form" action="">
        <div class="modal-header">
          <h5 class="modal-title">Add Access</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
          <input type="hidden" name=""  id="updateAccessID" value="">
            
          <div class="form-group">
              <label for="componentAccessID" class="">Component ID</label>
              <select type="text" class="form-control" name="componentID" id="componentAccessID" required>
                <?php foreach($componentID as $d) { ?>
                  <option value="<?=$d->componentID?>"><?=$d->componentName?></option>
                <?php } ?>
              </select>
            </div>


             <div class="form-group">
              <label for="userJurAccessID" class="">User Jurisdiction</label>
              <select type="text" class="form-control" name="userJurID" id="userJurAccessID" required>
                <?php foreach($userJurID as $d) { ?>
                   <option value="<?=$d->userJurID?>"><?=$d->userJurName?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="userTypeAccessID" class="">UserType ID</label>
              <select type="text" class="form-control" name="userTypeID" id="usertypeAccessID" required>
                <?php foreach($userTypeID as $d) { ?>
                   <option value="<?=$d->userTypeID?>"><?=$d->userTypeName?></option>
                <?php } ?>
              </select>
            </div>


            <div class="form-group">
              <label for="agencyAccessID" class="">Agency ID</label>
              <select type="text" class="form-control" name="agencyID" id="agencyAccessID" required>
                <?php foreach($agencyID as $d) { ?>
                   <option value="<?=$d->agencyID?>"><?=$d->agencyName?></option>
                <?php } ?>
              </select>
            </div>


                     </div>
         
        <div class="modal-footer">
          <button type="submit" id="updateFormBtn"  class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" id="closeFormModal" data-dismiss="modal">Close</button>
        </div>

    </form>
      </div>
  </div>
</div>


