<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Components</h1>
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
                <button class="btn btn-primary" id="btnadduser" data-toggle="modal" href="#addcomponentModal"><strong><i class='fa fa-plus-circle'></i>Add Component</strong></button>
              	<table class="table table-striped text-center" id="componentsTable">
	              		<thead>
	              			<th>Component Name</th>
	              			<th>Component Icon</th>
                      <th>Component Description</th>
	              			<th>Component Project</th>
	              			<th>Component Path</th>
	              			<th>Action</th>
                      <th>Action</th>
	              		</thead>
	              		 <tbody id="tbody">
                     <?php foreach($components as $d): ?>
	              				<tr>
                          
	              					<td><input type="hidden" id="componentID"  value="<?= $d->componentID ?>"><input type="hidden"  id="<?= $d->componentID ?>"><?= $d->componentName ?></td>
	              					<td><?= $d->componentIcon ?></td>
	              					<td><?= $d->componentDesc ?></td> 
	              					<td><?= $d->componentProject ?></td>
	              					<td><?= $d->componentPath ?></td>
	              					<td><a href="#" class="btn btn-danger" id="del" value="<?= $d->componentID ?>"> Delete </a></td>
	              					<td><button href="#updatecomponentModal"  data-toggle="modal" class="btn btn-primary" id="update"> Update </button></td>
	              					
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

   	<form id="auform" method="POST" class="form" action="">
	      <div class="modal-header">
	        <h5 class="modal-title">New Components</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	           <div class="form-group">
              <label for="component_icon" class="">Component Name</label>
              <input type="text" class="form-control"  name="componentName" placeholder="Component Name" id="componentNameID"required>
              <p id="emptyError"></p>
            </div>
            
            <div class="form-group">
              <label for="component_icon" class="">Component Icon</label>
              <input type="text" class="form-control" name="componentIcon" placeholder="Component Icon" required>
            </div>


            <div class="form-group">
              <label for="component_desc" class="">Component Description</label>
              <input type="text" class="form-control" name="componentDesc" placeholder="Component Description" required>
            </div>


            <div class="form-group">
              <label for="component_proj" class="">Component Project</label>
              <input type="text" class="form-control" name="componentProject" placeholder="Component Project" required>
            </div>

            <div class="form-group">
              <label for="component_path" class="">Component Path</label>
              <input type="text" class="form-control" name="componentPath" placeholder="Component Path" required>
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




<div class="modal fade" tabindex="-1" role="dialog" id="updatecomponentModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   	<form id="euform" method="POST" class="form" action="">


     <div class="modal-header">
	        <h5 class="modal-title">Update Component</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
            <input type="hidden" id="update_modal_id" value="">

	           <div class="form-group">
              <label for="component_icon" class="">Component Name</label>
              <input type="text" class="form-control" id="updateComponentName"  name="componentName" placeholder="Component Name" required>
              <p id="updateEmptyError"></p>
            </div>
            
            <div class="form-group">
              <label for="component_icon" class="">Component Icon</label>
              <input type="text" class="form-control" id="updateComponentIcon"  name="componentIcon" placeholder="Component Icon" required>
            </div>


            <div class="form-group">
              <label for="component_desc" class="">Component Description</label>
              <input type="text" class="form-control" id="updateComponentDesc"  name="componentDesc" placeholder="Component Description" required>
            </div>


            <div class="form-group">
              <label for="component_proj" class="">Component Project</label>
              <input type="text" class="form-control" id="updateComponentProject"  name="componentProject" placeholder="Component Project" required>
            </div>

            <div class="form-group">
              <label for="component_path" class="">Component Path</label>
              <input type="text" class="form-control" id="updateComponentPath"  name="componentPath" placeholder="Component Path" required>
            </div>


            </div>
         
	      <div class="modal-footer">
	        <button type="submit" id="updateFormbtn"  class="btn btn-primary">Update</button>
	        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
	      </div>
    </form>

	    </div>
  </div>
</div>
