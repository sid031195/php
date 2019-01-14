

                    <div class="col-lg-12">
                      
                         <p class="bg-success">
                            <?php echo display_msg(); ?>
                        </p>
                        <h1 class="page-header">
                            Users
                         
                        </h1>
                         

                        <a href="index.php?add_user" class="btn btn-primary">Add User</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        
                                        <th>Username</th>
                                        
                                        <th>Email </th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php //foreach($users as $user): ?>

                                    <tr>

                                        <?php show_user(); ?>
                                    </tr>


                                <?php //endforeach; ?>


                                    
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>










                        
                    </div>
    












            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
