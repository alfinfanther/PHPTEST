<style>
        .col-lg-2{
            width:150px;
           
        }
        .col-lg-10{
            width: 300px;
        }
    </style>
<div class="row" >
            
                <div class="well" style="margin: 350px; margin-top: 100px;">
                    <form class="form-horizontal" action="<?php echo site_url('login/cek');?>" method="post">
                        <fieldset>
                            <legend>Login</legend>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Id Pegawai</label>
                                <div class="col-lg-10">
                                    <input type="text" name="username" class="form-control" id="inputEmail" placeholder="Id Pegawai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                                    
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">&nbsp;</label>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <button class="btn btn-default">Batal</button>
                                    
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            
           
        </div>