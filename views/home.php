<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard 
                    <button class="pull-right btn btn-info btn-sm" data-toggle="modal" data-target="#help">
                        <i class="fa  fa-question fa-2x"></i>
                    </button>
                </h1>
                <!-- Modal -->
                <div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Help</h4>
                            </div>
                            <div class="modal-body">
								<h3>Records you can manage.
								</h3>
									<ul>
										<li>Customers</li>
										<?php 
										if($_SESSION['admin'] == 1){
										?>
										<li>Employees</li>
										<li>Users</li>
										<?php
											}								
										?>										
										<li>Merchants</li>
										<li>Products</li>
										<li>Rates</li>
										<li>Transactions</li>
										<li>Items sold</li>
										<li>Stock</li>
									</ul> 
								<br>
								<h3>What you can see on Home?
								</h3>
									<ul>
										<li>Numbers of customers, transactions, items sold & employees</li>									
										<li>Latest transactions</li>
										<li>Live market rate for USD, Gold and Silver.</li>
									</ul> 
								<br>
								<h3>Pages
									<small>(Info)</small>
								</h3>
								<p><a href="/customers">Customers</a>: This page is for modifying customer records.</p>					
								<p><a href="/merchants">Merchants</a>: This page is for modifying merchant records.</p>
								<?php 
								if($_SESSION['admin'] == 1){
								?>
								<p><a href="/employees">Employees</a>: This page is for modifying employee records.</p>
								<p><a href="/users">Users</a>: This page is for modifying user records.</p>
								<?php
									}								
								?>
								<p><a href="/products">Products</a>: This page is for modifying products.</p>
								<p><a href="/rates">Rates</a>: This page is for viewing rates.</p>
								<p><a href="/transactions">Transactions</a>: This page is for managing transaction details.</p>
								<p><a href="/items_sold">Items sold</a>: This page is for managing sold item details.</p>
								<p><a href="/stocks">Stock</a>: This page is for managing stock.</p>
								<p><a href="/profile">Profile</a>: You can edit your details(if you're admin) or only change password(if you're not an admin).</p>
								<br>                                                   
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->                
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div id="customers" class="huge"></div>
                                <div>Customers!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/customers">
                        <div class="panel-footer">
                            <span class="pull-left">View Customers</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-black-tie fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div id="employees" class="huge"></div>
                                <div>Employees!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/employees">
                        <div class="panel-footer">
                            <span class="pull-left">View Employees</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div id="sold-items" class="huge"></div>
                                <div>Items sold!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/items_sold">
                        <div class="panel-footer">
                            <span class="pull-left">View Items sold</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-credit-card fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div id="transactions" class="huge"></div>
                                <div>Transactions!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/transactions">
                        <div class="panel-footer">
                            <span class="pull-left">View Transactions</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div CLASS="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart fa-fw"></i> Live Rates(INR)
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="list-group">
                            <a class="list-group-item">
                                1 USD
                                <span id="usd" class="pull-right text-muted">
                                    </span>
                            </a>
                            <a class="list-group-item">
                                Gold 10g
                                <span id="au" class="pull-right text-muted">
                                    </span>
                            </a>
                            <a class="list-group-item">
                                Silver 1KG
                                <span id="ag" class="pull-right text-muted">
                                    </span>
                            </a>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div CLASS="col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-credit-card fa-fw"></i> Latest Transactions
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Weight</th>
                                    <th>Purity</th>
                                    <th>Rate</th>
                                </tr>
                                </thead>
                                <tbody class="latest-transactions">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->