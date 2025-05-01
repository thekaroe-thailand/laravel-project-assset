@extends('backoffice.layout')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-semibold mb-3">แก้ไขข้อมูลส่วนตัว</h1>

        <form action="{{ route('backoffice-edit-profile-submit') }}"
            method="post"
            class="flex flex-col gap-3">
            @csrf

            <div>
                <span class="block">ชื่อ</span>
                <input type="text" name="name" value="{{ $admin->name }}" />
            </div>
            <div>
                <span class="block">ชื่อผู้ใช้งาน</span>
                <input type="text" name="username" value="{{ $admin->username }}" />
            </div>
            <div>
                <span class="block">รหัสผ่าน</span>
                <input type="password" name="password" />
            </div>
            <div>
                <span class="block">ยืนยันรหัสผ่าน</span>
                <input type="password" name="password_confirmation" />
            </div>
            <div>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-check mr-1"></i>
                    บันทึก
                </button>
            </div>
        </form>
    </div>
@endsection