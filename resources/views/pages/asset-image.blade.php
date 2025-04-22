@extends('layout')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        async function setMainImage(id) {
            const button = await Swal.fire({
                title: 'ยืนยันการตั้งภาพหลัก', 
                text: 'คุณต้องการตั้งภาพหลักเป็นภาพนี้หรือไม่',
                icon: 'question',
                showCancelButton: true,
                showConfirmButton: true
            });

            if (button.isConfirmed) {
                window.location.href = "{{ route('set-main-image', ['id' => ':id']) }}".replace(':id', id);
            }
        }
    </script>

    <div class="container">
        <h2 class="text-xl">ภาพของ : {{ $asset->name }}</h2>

        <form 
            action="{{ route('asset-image-submit', ['id' => $asset->id]) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="mt-3">   
                <div>เลือกไฟล์ภาพ</div>
                <input type="file" name="image" id="image" />
            <div>

            <button type="submit" class="btn mt-2">
                <i class="fa fa-plus"></i> เพิ่มภาพ
            </button>

        </form>

        <div class="grid grid-cols-3 gap-2 mt-3">
            @foreach ($assetImages as $assetImage)
                <div class="relative">
                    <div class="">
                        <img src="{{ url('image/'.$assetImage->image) }}"
                            class="w-full rounded-lg h-[200px]"
                        />
                    </div>
                    @if ($assetImage->is_main)
                    <div class="absolute top-3 right-2">
                        <span class="bg-gray-200 text-gray-lll800 px-3 py-1 rounded-md">
                            <i class="fa fa-image mr-1"></i>
                            ภาพหลัก
                        </span>
                    </div>
                    @endif
                    <div class="absolute bottom-2 right-2 flex gap-2">
                        <a class="btn-primary" onclick="setMainImage('{{ $assetImage->id }}')">
                            <i class="fa fa-check mr-1"></i> ภาพหลัก
                        </a>
                        <a class="btn-danger" onclick="deleteImage('{{ $assetImage->id }}')">
                            <i class="fa fa-times mr-1"></i> ลบ
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection