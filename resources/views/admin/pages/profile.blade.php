@extends('layouts.admin')
@section('style')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('content')
<hr>
<div class="container bootstrap snippet">
    
    <div class="row">
        <div class="col-sm-3"><!--left col-->
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <img src="{{asset('images')}}/{{$user->img}}" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block file-upload" name="image">
                </div>
                </hr>
                <br>
                </div><!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
                <li class="active"><a data-toggle="tab" href="#edit-profile">Edit Profile</a></li>
                <li><a data-toggle="tab" href="#change-password">Change Password</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="profile">
                        <hr>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>First name</h4></label>
                                <br>
                                <label>{{$user->firstname}}</label>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Last name</h4></label>
                                <br/>
                                <label>{{$user->lastname}}</label>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="username"><h4>Username</h4></label>
                                <br/>
                                <label>{{$user->username}}</label>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <br/>
                                <label>{{$user->email}}</label>
                            </div>
                        </div>
                        
                        </div>

                </div><!--/tab-pane-->
                <div class="tab-pane" id="edit-profile">

                    <h2></h2>

                    <hr>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>First name</h4></label>
                                <input type="text" class="form-control" name="firstname" id="first_name" placeholder="first name" value="{{$user->firstname}}" >
                            </div>
                        </div>
                        
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Last name</h4></label>
                                <input type="text" class="form-control" name="lastname" id="last_name" placeholder="last name" value="{{$user->lastname}}" >
                            </div>
                        </div>
                        
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="username"><h4>Username</h4></label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{$user->username}}" >
                            </div>
                        </div>
                        </div>
                        
                   </div><!--/tab-pane-->
                <div class="tab-pane" id="change-password">

                    <hr>
                             <div class="col-xs-7">
                                <label for="password"><h4>New Password</h4></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password" value="{{$userlogin->password}}">
                            </div>

                        <div class="form-group">

                            <div class="col-xs-7">
                                <label for="confirm_password"><h4>Confirm Password</h4></label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="confirm password" title="enter your confirm password.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success pull-left" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               
                            </div>
                        </div>
                    
            </div><!--/tab-pane-->
        </div><!--/tab-content-->
    </div><!--/col-9-->
    </form>
</div><!--/row-->
</div>
@endsection
	

	@section('title')
	Profile
	@endsection