@extends('backoffice.layout')

<script>
    function deleteAdmin(id) {
        Swal.fire({
            title: 'ยืนยันการลบผู้ใช้งาน',
            text: 'คุณต้องการลบผู้ใช้งานนี้หรือไม่',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('backoffice-delete-admin', ['id' => ':id']) }}'.replace(':id', id);
            }
        });
    }
</script>

@section('content')
    <h1 class="text-2xl font-bold">รายชื่อผู้ดูแลระบบ</h1>
    <div class="container">

        @if (session('success'))
            <div class="border border-green-700 text-green-700 p-2 rounded-md mb-4">
                <i class="fas fa-check mr-1"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-2">
            <a class="btn-add" href="{{ route('backoffice-add-admin') }}">
                <i class="fas fa-plus mr-1"></i>
                เพิ่มผู้ใช้งาน
            </a>
        </div>
        <table class="mt-5">
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>ชื่อผู้ใช้งาน</th>
                    <th width="120">ระดับสิทธิ์</th>
                    <th width="120"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->getLevelName() }}</td>
                    <td class="flex gap-2">
                        <a class="btn-edit" href="{{ route('backoffice-edit-admin', $admin->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>

                        @if ($admin->id != session('admin')['id'])
                        <a class="btn-delete" onclick="deleteAdmin({{ $admin->id }})">
                            <i class="fas fa-trash"></i>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection