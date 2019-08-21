@extends('layouts.customer')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection
@section('content')

<div class="main-panel">
  <br>
              <div class="col-sm-2">
                    <form class="ml-auto search-form d-none d-md-block" action="#">
                     <div class="form-group">
                     <input type="search" id="search"class="form-control" placeholder="Search Here">
                     </div>
                    </form>
              </div>
                    <div class="table-responsive">
                      <table class="table info-table">
                        <center><h3>Product List</h3></center>
                        <br>
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Product Review</th>
                            <th>Product Price</th> 
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($userdata as $userdata)
                          <tr>
                            <td>{{$userdata->name}}</td>
                            <td>{{$userdata->review}}</td>
                            <td>{{$userdata->price}}</td>
                          </tr>
                          @endforeach
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
<script type="text/javascript">
$('#search').on('keyup',function(){
$value=$(this).val();
console.log($value);
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){
  console.log(data);
$('tbody').html(data);
}
});
})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

          @endsection
@section('title')
    Productlist 
  @endsection