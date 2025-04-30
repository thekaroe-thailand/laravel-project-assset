@extends('layout')

@section('content')
    <h1 class="text-xl font-bold">Edit Profile</h1>
    <form action="{{ route('edit-profile-submit') }}" method="post">
        @csrf
        <div class="mt-2">
            <div>Name</div>
            <input type="text" name="name" value="{{ $user->name }}" />
        </div>
        <div class="mt-2">
            <div>Email</div>
            <input type="email" name="email" value="{{ $user->email }}" />
        </div>
        <div class="mt-2">
            <div>Password</div>
            <input type="password" name="password" />
        </div>
        <div class="mt-2">
            <div>ยืนยันรหัสผ่าน</div>
            <input type="password" name="password_confirmation" />
        </div>
        <div class="mt-2">
            <button type="submit" class="mt-2">
                <i class="fa-solid fa-check mr-1"></i>
                Save
            </button>
        </div>
    </form>
@endsection