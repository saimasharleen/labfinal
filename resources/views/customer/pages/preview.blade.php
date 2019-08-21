@extends('layouts.customer')
@section('content')
        
        <div class="main-panel">
          <h3 style="color:Tomato;"> {{ Session::get('message')}} </h3> 
          <div class="content-wrapper">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <h4 align="center"><b>Products Review Post</b></h4>
                        <form class="forms-sample" method="post" action="">
                          @csrf
                          <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Product Name">
                          </div>
                          <div class="form-group">
                            <label>Products Review</label>
                            <textarea name="comment" rows="10" cols="40" autofocus></textarea>
                          </div>
                          <button type="submit" class="btn btn-success mr-2">Add Product Information</button>
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
    product Review Post
  @endsection