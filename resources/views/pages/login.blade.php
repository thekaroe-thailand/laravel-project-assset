@extends('layout')

@section('content')
    <h1>เข้าสู่ระบบ</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf 
        <div>
            <label for="email">อีเมล</label>
            <input type="text" name="email" placeholder="อีเมล" />
        </div>

        <div class="mt-2">
            <label for="password">รหัสผ่าน</label>
            <input type="password" name="password" placeholder="รหัสผ่าน" />
        </div>

        <div class="mt-2">
            <button type="submit">เข้าสู่ระบบ</button>
        </div>
    </form>
@endsection

