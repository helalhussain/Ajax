@extends('app')
@section('content')
<div class="col-lg-4 mx-auto pt-3">
    <a href="{{ url('/') }}" class="btn btn-success">All user</a>
    <div class="p-3">
        <form action="{{ route('add.user') }}" id="frm" method="POST">
            @csrf
            <x-form-group label="name" :value="$user->name ?? ''" placeholder="Name" />
            <x-form-group label="email" :value="$user->email ?? '' " placeholder="Email" />

                <x-form-group label="password" placeholder="Password" />


<br>
        <button type="submit" class="btn btn-info">SUBMIT</button>
        </form>

    </div>
</div>
@endsection
