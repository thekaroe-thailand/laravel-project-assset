@php
    use App\Models\AdminModel;

    if (!session('admin')) {
        return redirect()->route('backoffice-signin');
    }

    $admin = session('admin');
    $adminId = $admin['id'];
    $adminData = AdminModel::find($adminId);
@endphp

<script>
    function signout() {
        Swal.fire({
            title: 'ยืนยันการออกจากระบบ',
            text: 'คุณต้องการออกจากระบบหรือไม่',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('backoffice-signout') }}';
            }
        });
    }
</script>

<div class="w-85 h-screen bg-gray-800 text-white shadow-md">
    <div class="p-4 bg-gray-900 mb-5">
        <h1 class="text-2xln font-bold">BackOffice</h1>
        <p class="text-sm mt-2">
            <i class="fas fa-user"></i>
            {{ $adminData->name }} : {{ $adminData->level }}
        </p>
        <p class="mt-4 mb-4 flex gap-2">
            <a class="sidebar-btn-edit" href="{{ route('backoffice-edit-profile') }}">
                <i class="fas fa-user-edit"></i>
                แก้ไข
            </a>
            <a class="sidebar-btn-signout" onclick="signout()" href="javascript:void(0)">
                <i class="fas fa-sign-out-alt"></i>
                ออกจากระบบ
            </a>
        </p>
    </div>
    <div class="flex flex-col space-y-4 px-4">
        <a href="{{ route('backoffice-dashboard') }}">
            <i class="fas fa-chart-bar"></i>
            <span>Dashboard</span>
        </a>
        <a>
            <i class="fas fa-user"></i>
            <span>สมาชิก</span>
        </a>
        <a>
            <i class="fas fa-house"></i>
            <span>ทรัพย์ที่ลงประกาศ</span>
        </a>
        <a>
            <i class="fas fa-chart-line"></i>
            <span>สถิติการดูทรัพย์</span>
        </a>
        <a href="{{ route('backoffice-list') }}">
            <i class="fas fa-user-cog"></i>
            <span>ผู้ใช้งานระบบ</span>
        </a>
    </div>
</div>