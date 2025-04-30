@php 
    $user = session()->get('user');
@endphp

<div class="header p-10">
    <h1 class="text-2xl font-bold">ขายอสังหาริทรัพย์ ออนไลน์ ที่ดีที่สุด</h1>
    <div class="flex justify-between">
        <ul class="header-menu">
            <li>
                <a href="{{ route('home') }}">
                    <i class="fa-solid fa-house"></i>
                    หน้าแรก
                </a>
            </li>
            <li>
                <a href="{{ route('popular') }}">
                    <i class="fa-solid fa-star"></i>
                    ทรัพย์ยอดนิยม
                </a>
            </li>

            @if (!isset($user))
            <li>
                <a href="{{ route('register') }}">
                    <i class="fa-solid fa-user-plus"></i>
                    สมัครสมาชิก
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}">
                    <i class="fa-solid fa-user"></i>
                    เข้าสู่ระบบ
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('contact') }}">
                    <i class="fa-solid fa-phone"></i>
                    ติดต่อเรา
                </a>
            </li>

            @if (isset($user))
            <li>
                <a href="{{ route('post') }}">
                    <i class="fa-solid fa-plus"></i>
                    ลงประกาศ
                </a>    
            </li>
            <li>
                <a href="{{ route('my-post') }}">
                    <i class="fa-solid fa-file-lines"></i>
                    ประกาศของฉัน
                </a>
            </li>
            @endif
        </ul>

        @if (isset($user)) 
        <div class="user-info flex gap-4 items-center">
            <span><i class="fa-solid fa-user"></i> {{ $user->name }}</span>

            <a href="{{ route('edit-profile') }}" 
                class="border border-white rounded-md px-4 py-2">
                <i class="fa-solid fa-pencil mr-1"></i>
                แก้ไขข้อมูล
            </a>

            <a href="{{ route('logout') }}" class="border border-white rounded-md px-4 py-2">
                <i class="fa-solid fa-right-from-bracket"></i>
                ออกจากระบบ
            </a>
        </div>
        @endif
    </div>
</div>