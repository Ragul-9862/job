       <style>
.hk-wrapper.hk-vertical-nav .hk-nav .navbar-nav .nav-item .nav-link>i {
    font-size: 20px;
    margin-right: 7px;
    line-height: 25px;
    min-width: 25px;
    color: #2e2e2e;
}

.hk-wrapper.hk-vertical-nav .hk-nav .navbar-nav .nav-item .nav-link-text {
    display: inline-block;
    color: #6FBF44;
    font-weight: 800;
}
       </style>
       <nav class="hk-nav hk-nav-light">
           <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                       data-feather="x"></i></span></a>
           <div class="nicescroll-bar">
               <div class="navbar-nav-wrap">
                   <ul class="navbar-nav flex-column">

                       <li class="nav-item">
                           <a class="nav-link" href="dashboard.php">
                               <i class="ion ion-ios-keypad"></i>
                               <span class="nav-link-text">DASHBOARD</span>
                           </a>
                       </li>

                       <li class="nav-item">
                           <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                               data-target="#user_drp">
                               <i class="fa fa-user"></i>
                               <span class="nav-link-text">USERS</span></a>
                           <ul id="user_drp" class="nav flex-column collapse collapse-level-1">
                               <li class="nav-item">
                                   <ul class="nav flex-column">
                                       <li class="nav-item">
                                           <a class="nav-link" href="add-user.php">Add</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" href="manage_user.php">Manage</a>
                                       </li>
                                   </ul>
                               </li>
                           </ul>
                       </li>

                       <li class="nav-item">
                           <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                               data-target="#Gallery_drp">
                               <i class="fa fa-tags"></i>
                               <span class="nav-link-text">CATEGORY</span></a>
                           <ul id="Gallery_drp" class="nav flex-column collapse collapse-level-1">
                               <li class="nav-item">
                                   <ul class="nav flex-column">
                                       <li class="nav-item">
                                           <a class="nav-link" href="add_category.php">Add</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" href="manage_category.php">Manage</a>
                                       </li>
                                   </ul>
                               </li>
                           </ul>
                       </li>

                       <li class="nav-item">
                           <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                               data-target="#product_drp">
                               <i class="fa fa-image"></i>
                               <span class="nav-link-text">GALLERY</span></a>
                           <ul id="product_drp" class="nav flex-column collapse collapse-level-1">
                               <li class="nav-item">
                                   <ul class="nav flex-column">
                                       <li class="nav-item">
                                           <a class="nav-link" href="add-product.php">Add</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" href="manage_product.php">Manage</a>
                                       </li>
                                   </ul>
                               </li>
                           </ul>
                       </li>


                       <li class="nav-item">
                           <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                               data-target="#blog_drp">
                               <i class="fa fa-book"></i>


                               <span class="nav-link-text">BLOG</span></a>
                           <ul id="blog_drp" class="nav flex-column collapse collapse-level-1">
                               <li class="nav-item">
                                   <ul class="nav flex-column">
                                       <li class="nav-item">
                                           <a class="nav-link" href="add-blog.php">Add</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" href="manage_blog.php">Manage</a>
                                       </li>
                                   </ul>
                               </li>
                           </ul>
                       </li>


                       <li class="nav-item">
                           <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                               data-target="#process_drp">
                               <i class="fa fa-cogs"></i>

                               <span class="nav-link-text">MACHINERY</span></a>
                           <ul id="process_drp" class="nav flex-column collapse collapse-level-1">
                               <li class="nav-item">
                                   <ul class="nav flex-column">
                                       <li class="nav-item">
                                           <a class="nav-link" href="add-production.php">Add</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" href="manage_production.php">Manage</a>
                                       </li>
                                   </ul>
                               </li>
                           </ul>
                       </li>





                   </ul>






                   <hr class="nav-separator">

               </div>
           </div>
       </nav>