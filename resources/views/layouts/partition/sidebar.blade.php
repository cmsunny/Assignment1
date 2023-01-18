
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas" style="min-height: 607px;">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../../img/avatar3.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="seach" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="../../index.html">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('company.index')}}">
                                <i class="fa fa-th"></i> <span>Companies</span> 
                            </a>
                        </li>
                        <li>
                            <a href="{{route('employee.index')}}">
                                <i class="fa fa-th"></i> <span>Employee</span>
                            </a>
                        </li>
                       
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

           