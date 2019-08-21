@extends('layouts.admin')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
                  <h3 style="color:Tomato;"> {{ Session::get('message')}} </h3> 
                    <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Registration form</h4>
                        <p class="card-description">Information Form </p>
                        <form class="forms-sample" method="post">
                          @csrf
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Enter First Name">
                          </div>
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name">
                          </div>
                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter User Name">
                          </div>
                          <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" placeholder="Password">
                          </div>
                          <div class="form-group">
                            <label>Usertype</label>
                          </div>
                          <div class="form-radio form-radio-flat disabled">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="usertype" id="flatRadios3" value="admin"> Admin </label>
                          </div>
                          <div class="form-radio form-radio-flat disabled">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="usertype" id="flatRadios3" value="customer"> Customer </label>
                          </div>
                          <button type="submit" class="btn btn-success mr-2">Submit</button>
                          <button class="btn btn-light">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div>
                    @if($errors->any())
                     @foreach($errors->all() as $err)
                     {{$err}} <br>
                     @endforeach
                    @endif
                  </div>
                  
          @endsection
          <!-- content-wrapper ends -->
          @section('footer')
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
              </span>
            </div>
          </footer>
          <!-- partial -->
  @endsection

  @section('title')
    Signup 
  @endsection