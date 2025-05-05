@extends('backoffice.layout')

<script>
    function deleteAsset(id) {
        Swal.fire({
            title: 'คุณต้องการลบทรัพย์นี้หรือไม่?',
            text: 'หากลบทรัพย์นี้จะไม่สามารถกู้คืนได้',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('backoffice-asset-delete', ['id' => ':id']) }}".replace(':id', id);
            }
        })
    }
</script>

@section('content')
    <h1 class="text-2xl font-bold">ทรัพย์ที่ลงประกาศไว้</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th width="120px">รูปภาพ</th>
                    <th>ชื่อทรัพย์</th>
                    <th>ประเภททรัพย์</th>
                    <th>ผู้ลงประกาศ</th>
                    <th style="text-align: right">ราคา</th>
                    <th width="180px"></th>
                </tr>
            </thead> 
            <tbody>
                @foreach ($assets as $asset) 
                <tr>
                    <td style="padding: 0px" class="flex justify-center items-center h-[100px]">
                        @if ($asset->assetImage())
                            <img src="{{ url('image/'.$asset->assetImage()->image) }}"
                                alt="Asset image"
                                width="100"
                                class="rounded-md mx-4 my-4" />
                        @else
                            <i class="fas fa-image text-8xl text-gray-400"></i>
                        @endif
                    </td>
                    <td>{{ $asset->name }}</td>
                    <td>{{ $asset->assetCategories->name ?? '' }}</td>
                    <td>{{ $asset->user->name }}</td>
                    <td style="text-align: right">{{ number_format($asset->price) }}</td>
                    <td>
                        <div class="flex gap-1 justify-center items-center">
                            <a href="{{ route('backoffice-asset-info', ['id' => $asset->id]) }}"
                                class="btn-edit">
                                <i class="fas fa-info mr-1"></i>
                                ข้อมูล
                            </a>
                            <a class="btn-delete" onclick="deleteAsset({{ $asset->id }})">
                                <i class="fas fa-trash mr-1"></i>
                                ลบ
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection