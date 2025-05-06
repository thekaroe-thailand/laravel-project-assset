@extends('backoffice.layout')

@section('content')
    <h1 class="text-2xl font-semibold">{{ $asset->name }}</h1>
    <div class="container flex flex-col gap-4">
        <div class="flex gap-4">
            <div>ผู้ลงประกาศ</div>
            <div>{{ $asset->user->name }}</div>
        </div>
        <div class="flex gap-4">
            <div>ข้อมูลการติดต่อ</div>
            <div>{{ $asset->contact }}</div>
        </div>
        <div class="flex gap-4">
            <div>ราคา</div>
            <div>{{ number_format($asset->price) }}</div>
        </div>
        <div class="flex gap-4">
            <div>รายละเอียด</div>
            <div>{{ $asset->detail }}</div>
        </div>
    </div>

    <div class="container">
        <div class="flex flex-col gap-4">
            <div class="text-xl font-semibold">รูปภาพ</div>
            <div class="flex gap-4">
                @foreach ($asset->images as $image)
                    <img src="{{ url('image/'.$image->image) }}"
                        alt="Asset Image"
                        class="rounded-lg w-[200px]" />
                @endforeach
            </div>
        </div>
    </div>

    <div class="mt-5">
        <a href="{{ route('backoffice-asset-list') }}" class="btn-edit">
            <i class="fas fa-arrow-left mr-2"></i>
            กลับหน้าหลัก
        </a>
    </div>
@endsection