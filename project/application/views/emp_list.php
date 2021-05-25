<?php $this->load->view('frontend/header');?>
<div class="container"  style="margin-top:40px;">
    <div class="col-md-11">
    <h3 style="margin-left:300px;">Empolyee List Information</h3>
    <hr>
 <table id="myTable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                    <thead>
                       <tr>
                       <th class="th-sm">SNo</th>
                        <th class="th-sm">Empolyee Name</th>
                        <th class="th-sm">Empolyee Email</th>
                        <th class="th-sm">Empolyee Phone</th>
                        <th class="th-sm">Empolyee Image</th>
                        <th class="th-sm">Empolyee DOB</th>
                        <th class="th-sm">Empolyee Code</th>
                        <th class="th-sm">Empolyee Status</th>
                        <th class="th-sm">Action</th>
                       </tr>
                    </thead>
                  <tbody>
                      <?php if(!empty($emp_list)){
                          $i = 1;
                          foreach ($emp_list as $value){?>
                          <tr>
                            <td class="th-sm"><?php echo $i;?></td>
                            <td class="th-sm"><?php echo $value->emp_name;?></td>
                            <td class="th-sm"><?php echo $value->emp_email ;?></td>
                            <td class="th-sm"><?php echo $value->emp_phone ;?></td>
                            <td class="th-sm"><img src="<?php echo base_url()?>upload/images/<?php echo $value->emp_pro_img;?>" width="100" height="50"></td>
                            <td class="th-sm"><?php echo $value->emp_dob ;?></td>
                            <td class="th-sm"><?php echo $value->emp_code ;?></td>
                            <?php  $status = $value->emp_status == 1? "<span style='color:green'>Active</span>": "<span style='color:red'>Inactive</span>";?>
                            <td class="th-sm"><?php echo $status ;?></td>
                            <td class="th-xs" width="100%;"><a href="<?php echo base_url()?>index.php/employee/index?id=<?php echo base64_encode($value->emp_id);?>" class="btn btn-info">Edit</a><a href="<?php echo base_url()?>index.php/employee/delete_data?id=<?php echo base64_encode($value->emp_id);?>" class="btn btn-success">Delete</a> </td>
                          </tr>
                         <?php $i++; } }?>
                   
                 </tbody>
             </table>
        </div>
  <div class="col-md-1">
  <a href="<?php echo base_url();?>index.php/employee/index" class="btn btn-warning">Add Employee</a></div>
<?php $this->load->view('frontend/footer');?>