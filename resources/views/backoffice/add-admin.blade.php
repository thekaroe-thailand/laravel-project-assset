@extends('backoffice.layout')

@php
    $action = route('backoffice-add-admin-submit');

    if (!empty($admin)) {
        $action = route('backoffice-edit-admin-submit', $admin->id);
    }
@endphp

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold mb-4">เพิ่มผู้ดูแลระบบ</h1>
        <form action="{{ $action }}" method="post" class="space-y-4">
            @csrf

            <div>
                <label for="name">ชื่อ</label>
                <input type="text" id="name" name="name" value="{{ $admin->name ?? '' }}" />
            </div>
            <div>
                <label for="username">ชื่อผู้ใช้งาน</label>
                <input type="text" id="username" name="username" value="{{ $admin->username ?? '' }}" />
            </div>
            <div>
                <label for="password">รหัสผ่าน</label>
                <input type="password" id="password" name="password" />
            </div>
            <div>
                <label for="password_confirmation">ยืนยันรหัสผ่าน</label>
                <input type="password" id="password_confirmation" name="password_confirmation" />
            </div>
            <div>
                <label for="role">สิทธิ์</label>
                <select id="role" name="role" class="w-full">
                    <option value="admin" {{ !empty($admin) ?? $admin->level == 'admin' ? 'selected' : '' }}>ผู้ดูแลระบบ</option>
                    <option value="user" {{ !empty($admin) ?? $admin->level == 'user' ? 'selected' : '' }}>ผู้ใช้งาน</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-check mr-1"></i>
                บันทึก
            </button>
        </form>
    </div>
@endsection