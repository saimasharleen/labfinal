@extends('layouts.admin')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection
@section('content')



<div class="main-panel">
  <br>
                    <div class="table-responsive">
                      <table class="table info-table">
                        <center><h3>User List</h3></center>
                        <br>
                        <thead>
                          {{-- <tr>
                            
                            <th>Email</th>
                            <th>Usertype</th>
                            <th>status</th>
                            
                          </tr> --}}
                          <tr>
                            
                            <th>Email</th>
                            <th>Usertype</th>
                            <th>status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($userlogin as $user)
                          <tr>
                    
                            <td>{{$user->email}}</td>
                            <td>{{$user->usertype}}</td>
                            <td>
                              @if ($user->status == 0)
                                {{-- expr --}}
                                <a href="{{route('userlist.block', [$user->id])}}"><button>Block</button></a>
                              
                              @elseif($user->status == 1)
                              <a href="{{route('userlist.unblock', [$user->id])}}"><button>UnBlock</button></a>
                              @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

          @endsection

@section('title')
    Userlist 
  @endsection
