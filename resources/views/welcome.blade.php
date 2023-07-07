@extends('app')
@section('content')
<div class="row">

    <div class="col-lg-5 mx-auto pt-3">
        <a href="{{ route('user') }}" class="btn btn-success">Add</a>
        <br>

        <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key=>$user)
                    <tr class="">
                        <td scope="row">{{ $key+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('edit.user',$user->id) }}" class="btn btn-primary">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>





@endsection
