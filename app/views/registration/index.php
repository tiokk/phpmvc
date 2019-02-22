    <div class="row  ">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btnAdd" data-toggle="modal" data-target="#ModalInput">
            Create
            </button>
        </div>    
    </div>    
    <div class="row mt-3 ">
		<div class="col-lg-6">
		<form  > 
			<input class="form-control mr-sm-2"name="search" id="search" type="search" placeholder="Search" autocomplete="off"aria-label="Search"> 
		</form>
   
		</div>    
    </div>    

    <div class="row mb-5">
        <div class="col-lg-6">
        <h3 class=>List User</h3>
             <ul  id="userView" class="list-group listUser"></ul>
        </div>
    
    </div>

<!-- Modal -->
<div class="modal fade" id="ModalInput"  tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel"></h5>
        <button id="btnXInput" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- body -->
      <div class="modal-body">
 				<div class="alert alert-danger " role="alert" id="alert" align="center">
 				</div>
                 <div class="form-group">
                     <input type="hidden" id="id" name="id" class="form-control form-control-sm disabled readonly">
                </div>      
                <div class="form-group" >
                    <label for="register">Register Id</label>
                    <input type="text" id="register" name="register" class="form-control form-control-sm" disabled readonly>
                </div> 
				<div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm">
                </div>      
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm">
                </div>      
				
                <div class="form-group">
                    <ul class="list-unstyled row my-0">
					<li class="list-item col-sm-4 my-0"> 
						<label id="passwordLabel" for="password">Password</label>
					</li>
					<li class="list-item col-sm-2 my-0"> </li>
					<li class="list-item col-sm-6 my-0 mx-0"  align="right" > 
							<div class="form-check form-check-inline" id="checkBtn" style="display:none">
							<input class="form-check-input" type="checkbox" id="Check" value="option1">
							<label class="form-check-label " for="inlineCheckbox1">change password</label>

							</div>
					</li>
					</ul>
					

                    <input type="text" id="password" name="password" class="form-control form-control-sm">
                </div>       
                <div class="form-group">
  				<ul class="list-unstyled row">
					<li class="list-item col-sm-2 my-2"> </li>
					<li class="list-item col-sm-8 " align="center">Select Profile Image</li>
					<li class="list-item col-sm-2 "> </li>
					<li class="list-item col-sm-2 "> </li>
					<li class="list-item col-sm-8 " align="center">image type jpg and size under 2Mb</li>
					<li class="list-item col-sm-2 my-2"> </li>
					<li class="list-item col-sm-2 my-2"> </li>
					<li class="list-item col-sm-8 my-2" align="center">
						<img id="blah" src="<?= BASEURL?>img/picture.jpg" width ="150" height="150"alt="your image" />
					</li>
					<li class="list-item col-sm-2 my-2"> </li>
					<li class="list-item col-sm-2 my-2"> </li>
					<li class="list-item col-sm-8 my-2" align="center">
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="uploadId" for="upload_image" disabled readonly>
							<div class="input-group-append">
								<label for="upload_image" class="btn btn-sm btn-primary labelfrm">Upload Image</label>
								<input type="file" class="text-center form-control-file  custom_file" id="upload_image" name="upload_image">
							</div>
						</div>							 
					</li>
					<li class="list-item col-sm-2 my-2"> </li>
				</ul>
 					<div id="uploaded_image"></div>
				</div> 
     </div>
      <!-- footer -->
      <div class="modal-footer">
		<button type="btn" id="buttonSave" class="btn btn-primary">Save</button>

        <button type="button" id="btnCloseInput" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
			    <h4 class="modal-title">Crop Image</h4>
       		</div>
      		<div class="modal-body">
              <div class="row">
                <div class="col-md-8 text-center">
                  <div id="image_demo" style="width:350px; margin-top:30px"></div>
                </div>
              <div class="col-md-4" style="padding-top:30px;">
                  
               </div>
              </div>
      		</div>
      		<div class="modal-footer">
 				      <button type="btnsubmit " class="btn btn-primary crop_image">Crop</button>
       		</div>
    	</div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ModalDetails"  tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">User Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- body -->
		<div class="modal-body">
			<ul class="list-unstyled row">
				<li class="list-item col-sm-4"></li>
				<li class="list-item col-sm-4" align="center" >Profil Image</li>
				<li class="list-item col-sm-4 " ></li>
				<li class="list-item col-sm-4"></li>
				<li class="list-item col-sm-4 mb-3" >
				<img id="blah"  src="<?= BASEURL?>img/picture.jpg" width ="150" height="150"alt="your image" />
				</li>
				<li class="list-item col-sm-4 " ></li>
				<li class="list-item col-sm-3">Register Id</li>
				<li class="list-item col ">:</li>
				<li class="list-item col-sm-8"><p id="register"></p></li>
				<li class="list-item col-sm-3">Name</li>
				<li class="list-item col ">:</li>
				<li class="list-item col-sm-8"><p id="name"></p></li>
				<li class="list-item col-sm-3">Email</li>
				<li class="list-item col ">:</li>
				<li class="list-item col-sm-8"><p id="email"></p></li>
			</ul>
		</div>
      <!-- footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
    