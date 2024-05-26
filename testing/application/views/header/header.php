<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dist/img/cashboilg.png">

    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/new_datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/new_datatables/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">-->

    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">-->
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/new_datatables/js/jquery-3.5.1.js">
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->


    <!-- date picker -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <style>
        .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        position: relative;
        vertical-align: middle;
        width:inherit !important;
    }
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: calc(2.25rem + 2px);;
        user-select: none;
        -webkit-user-select: none;
    }
    .select2-container--default
	.select2-selection--single
	.select2-selection__rendered {
        color: #444;
        line-height: 1.5;
    }
    .box1{
        height:85px;
    }
        .small-box .icon > i.fa, .small-box .icon > i.fas, .small-box .icon > i.far, .small-box .icon > i.fab, .small-box .icon > i.glyphicon, .small-box .icon > i.ion {
      font-size: 40px;
      top: 30px;
    }
    /*.small-box:hover .icon > i {*/
    /*  font-size: 55px;*/
    /*}*/
    .small-box:hover .icon > i.fa, .small-box:hover .icon > i.fas, .small-box:hover .icon > i.far, .small-box:hover .icon > i.fab, .small-box:hover .icon > i.glyphicon, .small-box:hover .icon > i.ion {
      font-size: 45px;
    }
    @media (min-width: 1200px) {
      .col-xl-2 .small-box h3,
      .col-lg-2 .small-box h3,
      .col-md-2 .small-box h3 {
        font-size: 2.2rem;
      }
      .col-xl-3 .small-box h3,
      .col-lg-3 .small-box h3,
      .col-md-3 .small-box h3 {
        font-size: 1.8rem;
      }
    }
    .modal-footer .modal-header{
        background-color:#dee2e6 !important;
    }
    #example_wrapper{
        margin-top:20px;
        display:flex;
        flex-direction:column;
    }
  .dt-buttons .dt-button{
        background-color: #bed6ff;
        color:black;
    }
    
    .dt-button :hover{
        color:  #6400ff;
    }
    .datepicker {
      z-index: 9999 !important;
      padding: 5px !important;
    }
@media print {
          .dataTables_filter,
          .dataTables_length,
          .dataTables_info,
          .dataTables_paginate,
          .dt-buttons .dt-button {
            display: none;
          }
        }

    .card-header
    {
        background-color:#9cdbff7a;
    }
    .select2-container--default .select2-dropdown.select2-dropdown--below {
    border-top: 0;
    background-color: #c0e2ff;
    }
    
</style>
</head>
