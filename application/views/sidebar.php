<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?php echo base_url()?>asset/js/sidebar.js"></script>
<link href="<?php echo base_url()?>asset/css/sidebar.css" rel="stylesheet">

<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a>Admin Page</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">Mr
            <strong id="user"></strong>
          </span>
          <span class="user-role" id="ip"></span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
     
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>Menu </span>
          </li>
          <li>
            <a href="<?php echo base_url()?>admin/dashboard">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
        
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-gem"></i>
              <span>Bengkel</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url()?>admin/view/bengkel/mobil">Mobil</a>
                </li>
                <li>
                  <a href="<?php echo base_url()?>admin/view/bengkel/motor">Motor</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="<?php echo base_url()?>admin/view/bengkel/users">
              <i class="fa fa-book"></i>
              <span>Users</span>
            </a>
        </li>
         
        <li>
            <a href="<?php echo base_url()?>admin/view/unapprove">
              <i class="fa fa-book"></i>
              <span>Need to Review</span>
              <span class="badge badge-pill badge-primary notification junapprove" >0</span>
            </a>
        </li>
         
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
   
    <div class="sidebar-footer">
    <a href="https://github.com/sogatanco/nemu-bengkel/blob/master/app-debug.apk">
        <i class="fab fa-android"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="https://github.com/sogatanco">
        <i class="fab fa-github"></i>
      </a>
      <a href="https://www.instagram.com/sogatanco/">
        <i class="	fab fa-instagram"></i>
      </a>
      <a id="logout">
        <i class="fa fa-power-off" ></i>
      </a>
    </div>
  </nav>