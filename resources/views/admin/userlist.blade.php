@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clerk.css') }}" rel="stylesheet">
    <link href="{{ asset('css/student.css') }}" rel="stylesheet">
@endsection

@section('content')
     <div class="container-fluid pr-md-5 pl-md-5 clerk-verify-show">
         <div class="row pr-md-5 pl-md-5 full-height">
             <div class="col-md-12 pr-md-5 pl-md-5">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <div class="row text-right pr-3">
                            <div class="col-md-4 text-left pt-2 pl-5">
                                <div style="font-size: 22px;">USERS LISTS</div>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <form action="" method="POST">
                                    <div class="row form-group align-items-center pt-2">
                                        <label for="search_case" class="col-md-4">Search :</label>
                                        <input type="text" class="form-control col-md-8">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>User ID</th>
                                    <th>Role</th>
                                    <th>E-mail Address</th>
                                    <th>Updated at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @if( count($users) > 0)
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td class="assign-case">
                                        <a href="" class="btn btn-success">View User</a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                    <div class="card-footer">{{$users->links()}}</div>
                </div>
             </div>
         </div>
     </div>
@endsection
