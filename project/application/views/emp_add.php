<?php $this->load->view('frontend/header');?>
<?php if(!empty($emp_data)){
    $emp_name       =  $emp_data->emp_name;
    $emp_email      =  $emp_data->emp_email;
    $emp_phone      =  $emp_data->emp_phone;
    $emp_dob        =  $emp_data->emp_dob;
    $emp_address    =  $emp_data->emp_address;
    $emp_code       =  $emp_data->emp_code;
    $emp_status     =  $emp_data->emp_status;
    $emp_img        =  $emp_data->emp_pro_img;
    $id             =  $emp_data->emp_id;
    $txtbutton      = "Update Information";
    $readonly       = "readonly";
    $heading        = "Empolyee Update Information";?>
       <style>
         .dynamic{
            margin-left: -150px;
            margin-top: -70px;
           }
           .dybutton{
            margin-left: 579px;
            margin-top: -10px;
           }
           .head{
            margin-top: 17px;
           }
           .result{
            margin-top: 25px;
            margin-left: 25px;
           }
           .cart{
            margin-top: 47px;
           }
           
           </style>
<?php } else{
    $emp_name       =  "";
    $emp_email      =  "";
    $emp_phone      =  "";
    $emp_dob        =  "";
    $emp_address    =  "";
    $emp_code       =  "";
    $emp_status     =  "";
    $emp_img        =  "";
    $id             =  "";
    $txtbutton      = "Submit Information";
    $heading        = "New Empolyee Registration";
    $imgbox         = "";
    $readonly       = "";

} ?>
<main class="my-form top-marg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                            <?php if(!empty($emp_img)){?>
                                <img src="<?php echo base_url()?>upload/images/<?php echo $emp_img;?>" width="150" height="80">
                                <?php }?>
                    </div>
                    <div class="col-md-4">
                    <h3 class="left-margin"><?php echo $heading ?> </h3>
                    </div>
                    <div class="col-md-2">
                    <?php  if(!empty($emp_data)){?>
                        <a href="<?php echo base_url();?>index.php/employee/index" class="btn btn-warning top-margin left-margin">Add Employee</a>
                        <?php }?>
                    </div>
                    <div class="col-md-1"></div>
                    </div>
                    <hr>
                      <div class="col-md-8 top-marg">
                      <div class="card dynamic">
                      <div id="success_message" class="result"></div>
                        <div class="card-body cart">
                            <form id="my_form" align="center" enctype="multipart/form-data">
                            <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $id;?>">
                            <input type="hidden" name="emp_img" id="emp_img" value="<?php echo $emp_img;?>">
                                <div class="form-group row">
                                    <label for="emp_name" class="col-md-4 col-form-label text-md-right">Empolyee Name<span style="color:red"> *</span></label>
                                    <div class="col-md-6"> 
                                        <input type="text" id="emp_name" class="form-control" name="emp_name" placeholder="Enter Empolyee Name" value="<?php echo $emp_name?>">
                                        <span id="name_error" style="color:red"></span>                                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="emp_email" class="col-md-4 col-form-label text-md-right">E-Mail Address<span style="color:red"> *</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="emp_email"  <?php echo $readonly;?> class="form-control" name="emp_email" placeholder="Enter E-Mail Address" value="<?php echo $emp_email?>">
                                        <span id="email_error" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="emp_phone" class="col-md-4 col-form-label text-md-right">Empolyee Phone<span style="color:red"> *</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="emp_phone" class="form-control" name="emp_phone" placeholder="Enter Empolyee Phone" value="<?php echo $emp_phone?>">
                                        <span id="phone_error" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="emp_code" class="col-md-4 col-form-label text-md-right">Empolyee Code<span style="color:red"> *</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="emp_code" name="emp_code" class="form-control" placeholder="Enter Empolyee Code" value="<?php echo $emp_code ?>">
                                        <span id="code_error" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="emp_img" class="col-md-4 col-form-label text-md-right">Empolyee Image<span style="color:red"> *</span></label>
                                    <div class="col-md-6">
                                        <input type="file" id="emp_img"  name="emp_img" class="form-control">
                                        <span id="img_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emp_dob" class="col-md-4 col-form-label text-md-right">Empolyee DOB<span style="color:red"> *</span></label>
                                    <div class="col-md-6">
                                        <input type="date" id="emp_dob" class="form-control" name="emp_dob" value="<?php echo $emp_dob ?>">
                                        <span id="dob_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emp_address" class="col-md-4 col-form-label text-md-right">Empolyee Address<span style="color:red"> *</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="emp_address" class="form-control" name="emp_address" placeholder="Enter Empolyee Address" value="<?php echo $emp_address?>">
                                        <span id="address_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emp_status" class="col-md-4 col-form-label text-md-right">Empolyee Status<span style="color:red"> *</span></label>
                                    <div class="col-md-6">
                                    <?php  $selected = $emp_status == 1? "": "";?>
                                        <select class="form-control" name="emp_status" id="emp_status">
                                            <option value="">Select Status</option>
                                            <option value="1"<?php echo $emp_status == 1 ? "selected":"";?>>Active</option>
                                            <option value="2"<?php echo $emp_status == 2 ? "selected":"";?>>Inactive</option>
                                        </select>
                                        <span id="status_error" style="color:red"></span>
                                    </div>
                                </div>
                                    <div class="col-md-6 offset-md-4 button">
                                        <button type="submit" class="btn btn-primary" id="information_save">
                                         <?php echo $txtbutton;?>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <a href="<?php echo base_url();?>index.php/employee/emp_list" class="btn btn-success">Employee List</a>
                        </div>
                    </div>
            </div>
        </div>
  </div>
</main>
<?php $this->load->view('frontend/footer');?>