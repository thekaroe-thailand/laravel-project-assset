@extends('layout')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    async function confirmSale(id) {
        const button = await Swal.fire({
            title: 'ยืนยันการขาย',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true
        });

        if (button.isConfirmed) {
            window.location.href = "{{ route('sale-asset', ['id' => ':id']) }}".replace(':id', id);
        }
    }

    async function confirmNormal(id) {
        const button = await Swal.fire({
            title: 'ยืนยันการยกเลิก',
            text: 'ทรัพย์นี้จะกลับไปสถานะปกติ',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true
        });

        if (button.isConfirmed) {
            window.location.href = "{{ route('normal-asset', ['id' => ':id']) }}".replace(':id', id);
        }
    }

    async function confirmCancel(id) {
        const button = await Swal.fire({
            title: 'ยืนยันการยกเลิก',
            text: 'ทรัพย์นี้จะถูกลบออกจากระบบ',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true
        });

        if (button.isConfirmed) {
            window.location.href = "{{ route('cancel-asset', ['id' => ':id']) }}".replace(':id', id);
        }
    }

</script>

<div class="container">
    <h1 class="text-2xl font-bold">
        <i class="fa-solid fa-file-lines"></i>
        ประกาศของฉัน
    </h1>
    <div class="grid grid-cols-3 gap-3 mt-2">
        @foreach ($assets as $asset)
        <div class="bg-gray-100 p-3 border border-gray-400 rounded-md">
            <h2 class="text-lg font-bold">{{ $asset->name }}</h2>
            <p class="">ราคา : {{ number_format($asset->price) }}</p>
            <p class="">รายละเอียด : {{ $asset->detail }}</p>
            <p class="">ติดต่อ : {{ $asset->contact }}</p>
            <p class="">สถานะ : {{ $asset->statusText() }}</p>
            <div class="flex justify-center mt-3 gap-1">
                @if ($asset->status == 'normal')
                <a href="javascript:void(0)" onclick="confirmSale({{ $asset->id }})" 
                    class="bg-green-700 text-white px-4 py-2 rounded-md text-sm">
                    <i class="fa-solid fa-check mr-1"></i>
                    ขายแล้ว
                </a>
                @endif 

                @if ($asset->status == 'sale' || $asset->status == 'cancel')
                <a href="javascript:void(0)" onclick="confirmNormal({{ $asset->id }})" 
                    class="bg-gray-700 text-white px-4 py-2 rounded-md text-sm">
                    <i class="fa-solid fa-rotate-left mr-1"></i>
                    ยกเลิก
                </a>
                @endif 

                @if ($asset->status == 'normal')
                <a href="javascript:void(0)" onclick="confirmCancel({{ $asset->id }})" 
                    class="bg-red-500 text-white px-4 py-2 rounded-md text-sm">
                    <i class="fa-solid fa-times mr-1"></i>
                    ลบออก
                </a>
                @endif

                <a href="{{ route('asset-image', $asset->id) }}" 
                    class="bg-purple-600 text-white px-4 py-2 rounded-md text-sm">
                    <i class="fa-solid fa-images mr-1"></i>
                    ภาพ
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection