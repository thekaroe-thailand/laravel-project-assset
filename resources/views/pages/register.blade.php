@extends('layout')

@section('content')
    <h1 class="text-2xl font-bold mb-3">สมัครสมาชิก</h1>
    <form action="{{ route('register') }}" method="post">
        @csrf 
        <div>
            <div>ชื่อ</div>
            <input type="text" name="name" id="name" />
        </div>

        <div class="mt-2">
            <div>อีเมล</div>
            <input type="email" name="email" id="email" />
        </div>

        <div class="mt-2">
            <div>รหัสผ่าน</div>
            <input type="password" name="password" id="password" />
        </div>

        <div class="mt-2">
            <button type="submit">
                <i class="fa-solid fa-user-plus"></i>
                สมัครสมาชิก
            </button>
        </div>
    </form>
@endsection