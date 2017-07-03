<form action="components/update-profile.php" method="post" enctype="multipart/form-data" id="UploadForm">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#general" data-toggle="tab">General</a></li>
      <li><a href="#personal" data-toggle="tab">Personal</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">         
            <div class="col-md-6">
                <div class="form-group float-label-control">                      
                    <label for="">Name</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['username'];?>" name="username" value="<?php echo $rws['username'];?>">
                </div>
               
                <div class="form-group float-label-control">
                    <label for="">Avatar</label>
                    <input name="ImageFile" type="file" id="uploadFile"/>
                    <div class="col-md-6">
                        <div class="shortpreview">
                            <label for="">Previous Avatar </label>
                            <br> 
                            <img src="userfiles/avatars/<?php echo $rws['passport'];?>" width="200px" height= "300px" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="shortpreview" id="uploadImagePreview">
                            <label for="">Current Uploaded Avatar </label>
                            <br> 
                            <div id="imagePreview"></div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-md-6">
                <label for="">Username</label>
                <div class="form-group float-label-control">
                         
                        <div class="input-group">
                            <fieldset disabled> 
                                <input type="text" class="form-control" placeholder="<?php echo $rws['login'];?>" name="login" value="<?php echo $rws['login'];?>" id="disabledTextInput" autocomplete="off">
                            </fieldset>  
                        </div>
                    </a>
                </div>
                <div class="form-group float-label-control">
                  
                    <label for="">Password</label>
                   <fieldset disabled>  
                    <input type="password" class="form-control" placeholder="<?php echo $rws['pass'];?>" name="pass" value="<?php echo $rws['pass'];?>">
                   </fieldset>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Email</label> 
                    <input type="text" class="form-control" placeholder="<?php echo $rws['email'];?>" name="email" value="<?php echo $rws['email'];?>">
                </div>  
            </div>
        </div>
        <div class="tab-pane fade" id="personal">
            <div class="col-md-6">
               
                <div class="form-group float-label-control">
                    <label for="">Birthday</label>   
                    <input type="date" class="form-control" placeholder="<?php echo $rws['dob'];?>" name="dob" value="<?php echo $rws['dob'];?>">      
                </div>
                <div class="form-group float-label-control">
                    <label for="">Profession</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['user_profession'];?>" name="user_profession" value="<?php echo $rws['user_profession'];?>" id="profession">    
                </div>  
                <label for="">Gender</label>              
                <div class="form-group float-label-control">
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="user_gender" id="optionsRadios1" value="Male" checked>Male</label>
                    </div>              
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="user_gender" id="optionsRadios1" value="Female">Female</label>
                    </div>
                </div>
                <div class="form-group float-label-control">
                    <label for="">City</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['city'];?>" name="city" value="<?php echo $rws['city'];?>" id="city">    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group float-label-control">
                    <label for="">Address</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['address'];?>" name="address" value="<?php echo $rws['address'];?>">    
                </div>
                <label for="">Security Question</label>
                <div class="form-group float-label-control">
                                      
                    <input type="text" class="form-control" placeholder="<?php echo $rws['security_question'];?>" name="security_question" value="<?php echo $rws['security_question'];?>">                  
                    
                </div>
                 <div class="form-group float-label-control">
                    <label for="">Answer</label>
                    
                    <input type="password" class="form-control" placeholder="<?php echo $rws['answer'];?>" name="answer" value="<?php echo $rws['answer'];?>">    
                  
                    </div>
            </div>
           
        </div>
    </div>     
    <br>
    <div class="submit">
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
</form>