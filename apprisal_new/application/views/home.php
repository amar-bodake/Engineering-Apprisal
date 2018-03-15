
<?php include 'header1.php'; ?>
<div class="row clear_fix">
    <div class="col-md-12">

        <div id="response"></div>

        <div class="well">
            <form class="form-inline" role="form" id="frmadd" action="<?php echo base_url() ?>index.php/home/create" method="POST">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">emp_code</label>
                    <input type="text" name="emp_code" class="form-control" id="emp_code" placeholder="emp_code">
                </div>
                 <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="email">
                </div>

                 <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">password</label>
                    <input type="text" name="password" class="form-control" id="password" placeholder="password">
                </div>
              
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="name">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">institute_id</label>
                    <input type="text" name="institute_id" class="form-control" id="exampleInputPassword2" placeholder="institute_id">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">designation_id</label>
                    <input type="text" name="designation_id" class="form-control" id="designation_id" placeholder="designation_id">
                </div>
                
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">date_of_joining</label>
                    <input type="text" class="form-control" name="date_of_joining" id="date_of_joining" placeholder="date_of_joining">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">date_of_leaving</label>
                    <input type="text" name="date_of_leaving" class="form-control" id="date_of_leaving" placeholder="date_of_leaving">
                </div>
                    <div class="form-group">
                    <label class="sr-only" for="role_id">role_id</label>
                    <input type="text" class="form-control" name="role_id" id="role_id" placeholder="role_id">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="last_login_in">last_login_in</label>
                    <input type="text" name="last_login_in" class="form-control" id="exampleInputPassword2" placeholder="last_login_in">
                </div>
                    <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">department_id</label>
                    <input type="text" class="form-control" name="department_id" id="department_id" placeholder="department_id">
                </div>
                 <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">set_profile</label>
                    <input type="text" class="form-control" name="set_profile" id="set_profile" placeholder="set_profile">
                </div>
                 <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">is_active</label>
                    <input type="text" class="form-control" name="is_active" id="is_active" placeholder="is_active">
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-success" id="exampleInputPassword2" value="submit">
                </div>
            </form>
        </div>

        <table class="table">
            <thead><tr><th>Emp code</th><th>Email</th><th>password</th><th>name</th><th>    institute_id</th><th>designation_id</th><th style = "display:none">date_of_joining</th><th style = "display:none">date_of_leaving</th>
            <th>role_id</th><th style = "display:none">last_login_in</th><th>department_id</th><th>set_profile</th><th>    is_active</th></tr></thead>
            <tbody id="fillgrid">
            
            </tbody>
            <tfoot></tfoot>
        </table>


    </div>
</div>
</div>



<script>
$(document).ready(function (){
    //fill data
    var btnedit='';
    var btndelete = '';
        fillgrid();
        // add data
        $("#frmadd").submit(function (e){
            e.preventDefault();
            $("#loader").show();
            var url = $(this).attr('action');
            var data = $(this).serialize();
            console.log(data);
            $.ajax({
                url:url,
                type:'POST',
                data:data
            }).done(function (data){
                $("#response").html(data);
                $("#loader").hide();
                fillgrid();
            });
        });
    
    
    
    function fillgrid(){
        $("#loader").show();
        $.ajax({
            url:'<?php echo base_url() ?>index.php/home/fillgrid',
            type:'GET'
        }).done(function (data){
            $("#fillgrid").html(data);
            $("#loader").hide();
            btnedit = $("#fillgrid .btnedit");
            btndelete = $("#fillgrid .btndelete");
            var deleteurl = btndelete.attr('href');
            var editurl = btnedit.attr('href');
            //delete record
            btndelete.on('click', function (e){
                e.preventDefault();
                var deleteid = $(this).data('id');
                //alert(deleteid);
                if(confirm("are you sure")){
                    $("#loader").show();
                    $.ajax({
                    url:deleteurl,
                    type:'POST' ,
                    data:'id='+deleteid
                    }).done(function (data){
                    $("#response").html(data);
                    $("#loader").hide();
                    fillgrid();
                    });
                }
            });
            
            //edit record
            btnedit.on('click', function (e){
                e.preventDefault();
                var editid = $(this).data('id');

                $.colorbox({
                href:"<?php echo base_url()?>index.php/home/edit/"+editid,
                top:50,
                width:500,
                onClosed:function() {fillgrid();}
                });
            });
            
        });
    }
    
});
</script>
</body>
</html>
