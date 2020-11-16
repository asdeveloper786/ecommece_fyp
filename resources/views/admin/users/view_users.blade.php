@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Users
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data</li>
        </ol>

    </div>

    <div id="page-inner">


        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">
                    <div class="card-action">
                        Users List
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="userTable">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Pincode</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Registered on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr class="gradeX">
                                      <td class="center">{{ $user->id }}</td>
                                      <td class="center">{{ $user->name }}</td>
                                      <td class="center">{{ $user->address }}</td>
                                      <td class="center">{{ $user->city }}</td>
                                      <td class="center">{{ $user->state }}</td>
                                      <td class="center">{{ $user->country }}</td>
                                      <td class="center">{{ $user->pincode }}</td>
                                      <td class="center">{{ $user->mobile }}</td>
                                      <td class="center">{{ $user->email }}</td>
                                      <td class="center">
                                        @if($user->status==1)
                                          <span style="color:green">Active</span>
                                        @else
                                          <span style="color:red">Inactive</span>
                                        @endif
                                      </td>
                                      <td class="center">{{ $user->created_at }}</td>
                                    </tr>
                                    @endf
                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

        @endsection
        @section('scripts')
        <script>
            jQuery(function () {



                $('#userTable').DataTable();




            });

        </script>
        @endsection

