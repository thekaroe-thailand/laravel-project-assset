@extends('backoffice.layout')

<script>
    function deleteUser(id) {
        Swal.fire({
            title: 'คุณต้องการระงับการใช้งานผู้ใช้งานนี้หรือไม่',
            text: 'ผู้ใช้งานนี้จะไม่สามารถเข้าสู่ระบบได้',
            icon: 'warning',
            showConfirmButton: true,
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('backoffice-user-delete', ['id' => ':id']) }}".replace(':id', id);
            }
        })
    }

    function activeUser(id) {
        Swal.fire({
            title: 'คุณต้องการเปิดใช้งานผู้งานนี้หรือไม่?',
            text: 'ผู้ใช้งานจะสามารถเช้าสู่ระบบได้',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('backoffice-user-active', ['id' => ':id']) }}".replace(':id', id);
            }
        })
    }
</script>

@section('content')
    <h1>รายชื่อสมาชิก</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>email</th>
                    <th width="130px">สถานะ</th>
                    <th width="160px">&nbsp;</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getStatusName() }}</td>
                    <td class="flex justify-center">
                        @if ($user->status == 'active')
                            <a onclick="deleteUser({{ $user->id }})"
                                class="btn-delete" href="javascript:void(0)">
                                <i class="fas fa-trash mr-1"></i>
                                ระงับการใช้งาน
                            </a>
                        @else
                            <a onclick="activeUser({{ $user->id }})"
                                class="btn-edit" href="javascript:void(0)">
                                <i class="fas fa-check mr-1"></i>
                                เปิดใช้งาน
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection