<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">My Profile</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Security
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-6">
                            <div class="row">
                                <form id="update_user" role="form">
                                <div class="form-group">
                                    <label>Employee ID</label>
                                    <input class="form-control" name="employee" type="number" value="<?php echo $uid; ?>" <?php echo $disabled; ?>>
                                </div>
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input class="form-control" name="email" type="email" <?php echo $disabled; ?>>
                                </div>
                                <div class="form-group">
                                    <label>Password*</label>
                                    <input class="form-control" name="password" type="password"
                                           placeholder="Current or new password">
                                </div>
                                <div class="form-group">
                                    <label>Password again*</label>
                                    <input class="form-control" name="password_confirmation" type="password"
                                           placeholder="Confirm password">
                                </div>
                                <button type="submit" id="user_submit" class="btn btn-default">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Employee Information
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-6">
                            <div class="row">
                                <form id="update_employee" role="form">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input class="form-control" name="name" type="text"
                                           <?php echo $disabled; ?>>
                                </div>
                                <div class="form-group">
                                    <label>Phone*</label>
                                    <input class="form-control" name="phone" type="number"
                                           <?php echo $disabled; ?>>
                                </div>
                                <div class="form-group">
                                    <label>Address*</label>
                                    <textarea class="form-control" id="address" rows="5"
                                              <?php echo $disabled; ?>></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="M" checked>Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="F">Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date of joining*</label>
                                    <input class="form-control" name="doj" type="text"
                                           <?php echo $disabled; ?>>
                                </div>
                                <button type="submit" id="employee_submit" class="btn btn-default">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->