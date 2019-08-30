<?php include ('modal/connection.php'); ?> 
<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="google-signin-client_id" content="766701981763-kgf2t90ph3ic4ami2ej9rle030u4a3ks.apps.googleusercontent.com">
  <meta name="author" content="">
  <title>Firebrick</title>
  <link href="css/cdn/google-fonts.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/cdn/bootstrap.min.css">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="css/cdn/datepicker.min.css" />
  <link rel="stylesheet" href="css/cdn/bootstrap-timepicker.min.css"/>
  <link rel=stylesheet href="css/cdn/selectize.css">
  <link rel="stylesheet" href="css/cdn/animate.min.css">
  <link rel="stylesheet" href="css/cdn/angular-material.min.css">
</head>

<body class="sidenav-toggled" id="page-top" ng-app="myApp" ng-controller="MainCtrl" ng-init="session_fun()" >
 
 
  <!-- Navigation-->
  <nav class="navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  
    <button class="navbar-toggler navbar-toggler-right " type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item"  data-placement="right" title="Dashboard">
          <a class="nav-link" href="javascript:void(0)">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Firebrick</span>
          </a>
        </li>
       
       
        <li class="nav-item" data-placement="right" title="Boards" ng-show="login_id">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"  data-target="#collapseComponents"  data-parent="#exampleAccordion">
            <i class="fa fa-table"></i>
            <span class="nav-link-text" ng-init="boards_show();"> Boards</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li  ng-repeat="board in boards">
              <a href="#!Boards" ng-click="board_session(board)"><i class="fa fa-credit-card-alt"></i><span class="nav-link-text"> {{board.name}}</span></a> 
            </li>
            <li class="board_color" ng-show="board_show">
              <input type="text" name="hello" class="board_type" ng-blur="board_add(board_data);board_show = false" ng-model="board_data">
            </li>
            <li ng-show="!board_show">
              <a href="javascript:void(0);" ng-click="board_show = true"><i class="fa fa-credit-card-alt"></i><span class="nav-link-text"> Add...</span></a>
            </li>
          </ul>
        </li>
         <li class="nav-item"  data-placement="right" title="Managemet Boards" ng-show="login_id">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#collapseComponents0" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text"> Managemet Boards</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents0">
            <li>
              <a href="#!PersonBlocks"><i class="fa fa-user"></i><span class="nav-link-text"> Person Blocks</span></a> 
            </li>
            <li>
              <a href="#!TagBlocks"><i class="fa fa-hashtag"></i><span class="nav-link-text"> Master Tag Blocks</span></a>
            </li>
             <li>
              <a href="#!ArchivedBlocks"><i class="fa fa-recycle"></i><span class="nav-link-text"> Archived Blocks</span></a>
            </li>
          </ul>
        </li>
         <li class="nav-item"  data-placement="right" title="Accounts and Settings" ng-show="login_id">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#collapseComponents1" data-parent="#exampleAccordion">
            <i class="fa fa-cog"></i>
            <span class="nav-link-text"> Accounts and Settings</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents1">
            <li>
              <a href="#!AccountProfile"><i class="fa fa-users"></i><span class="nav-link-text"> Account Profile</span></a> 
            </li>
            <li>
              <a href="#!ConnectedServices"><i class="fa fa-cloud"></i><span class="nav-link-text"> Connected Services</span></a>
            </li>
             <li>
              <a href="#!Files"><i class="fa fa-folder-open"></i><span class="nav-link-text"> Files</span></a>
            </li>
          </ul>
        </li>
         <li class="nav-item"  data-placement="right" title="Analytics" ng-show="login_id">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-bar-chart"></i>
            <span class="nav-link-text"> Analytics</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
            <li>
              <a href="#!PerBoard"><i class="fa fa-table"></i><span class="nav-link-text"> Per Board</span></a> 
            </li>
            <li>
              <a href="#!PerPerson"><i class="fa fa-user"></i><span class="nav-link-text"> Per Person</span></a>
            </li>
             <li>
              <a href="#!PerTag"><i class="fa fa-hashtag"></i><span class="nav-link-text"> Per Tag</span></a>
            </li>
          </ul>
        </li>
        <li class="nav-item"  data-placement="right" title="Register" ng-hide="login_id">
          <a class="nav-link" href="#!register">
            <i class="fa fa-fw fa-address-card-o"></i>
            <span class="nav-link-text">Register</span>
          </a>
        </li>
        <li class="nav-item"  data-placement="right" title="Login" ng-hide="login_id" value={{login_id}}>
          <a class="nav-link" href="#!login">
            <i class="fa fa-fw fa-sign-in"></i>
            <span class="nav-link-text">Login</span>
          </a>
        </li>
        <li class="nav-item"  data-placement="right" title="Logout" ng-show="login_id">
          <a class="nav-link" href="javascript:void(0)" ng-click="Logout()">
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Logout</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      
    </div>
  </nav>