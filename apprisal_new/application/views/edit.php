<div class="well">
    <div class="errorresponse">
        
    </div>
    <form class="form" id="frmupdate" role="form" action="<?php echo base_url()?>index.php/home/update" method="POST">
    <?php foreach($query->result() as $row):

    
    ?>
                          
                            <div class="form-group">
                            <label for="exampleInputEmail2">Emp code</label>
                            <input type="text" name="emp_code" class="form-control" value="<?php echo $row->emp_code?>">
                            </div>

                          <div class="form-group">
                            <label for="exampleInputEmail2">Email</label>
                            <input class="form-control" name="email" type="email" value="<?php echo $row->email?>" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword2">password</label>
                            <input type="text" class="form-control" name="password" value="<?php echo $row->password?>">
                          </div>
                            <div class="form-group">
                            <label for="exampleInputPassword2">name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row->name?>">
                             </div>

                              <div class="form-group">
                               <label for="exampleInputPassword2">institute_id</label>
                                <input type="text" name="institute_id" class="form-control" value="<?php echo $row->institute_id ?>">
                              </div>

                              <div class="form-group">
                               <label for="exampleInputPassword2">designation_id</label>
                                <input type="text" name="designation_id" class="form-control" value="<?php echo $row->designation_id ?>">
                              </div>

                              <div class="form-group">
                               <label for="exampleInputPassword2">date_of_joining</label>
                                <input type="text" name="date_of_joining" class="form-control" value="<?php echo $row->date_of_joining ?>">
                              </div>

                              <div class="form-group">
                               <label for="exampleInputPassword2">date_of_leaving</label>
                                <input type="text" name="date_of_leaving" class="form-control" value="<?php echo $row->date_of_leaving ?>">
                              </div>

                              <div class="form-group">
                               <label for="exampleInputPassword2">role_id</label>
                                <input type="text" name="role_id" class="form-control" value="<?php echo $row->role_id?>">
                              </div>

                              <div class="form-group">
                               <label for="exampleInputPassword2">last_login_in</label>
                                <input type="text" name="last_login_in" class="form-control" value="<?php echo $row->last_login_in ?>">
                              </div>


                              <div class="form-group">
                               <label for="exampleInputPassword2">department_id</label>
                                <input type="text" name="department_id" class="form-control" value="<?php echo $row->department_id?>">
                              </div>

                              <div class="form-group">
                               <label for="exampleInputPassword2">set_profile</label>
                                <input type="text" name="set_profile" class="form-control" value="<?php echo $row->set_profile?>">
                              </div>

                              <div class="form-group">
                               <label for="exampleInputPassword2">is_active</label>
                                <input type="text" name="is_active" class="form-control" value="<?php echo $row->is_active ?>">
                              </div>









                            <div class="form-group">
                                <input type="hidden" name="hidden" value="<?php echo $id ?>"/>
                            <input type="submit" class="btn btn-success" id="exampleInputPassword2" value="update">
                          </div>
        <?php endforeach;?>
                        </form>
                    </div>
</div>

<script>
$(document).ready(function (){
    $("#frmupdate").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url() ?>index.php/home/update',
            type:'POST',
            dataType:'json',
            data: $("#frmupdate").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else{
                $(".errorresponse").text('');
                $('#frmupdate')[0].reset();
                $("#response").html(mydata['success']);
                
                $.colorbox.close();
                $("#response").html(mydata['success']);
                }
        });
    });    
});

    
</script>
</body>
</html>