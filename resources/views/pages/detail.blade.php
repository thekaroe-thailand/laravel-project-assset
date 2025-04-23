@extends('layout')

@section('content')
    <div class="container">
        <div class="flex gap-4">
            <div class="w-2/3">
                <h1 class="text-2xl font-bold mb-4">{{ $asset->name }}</h1>
                <h2 class="text-gray-800 mb-4">{{ $asset->detail }}</h2>

                @if ($asset->assetImage()) 
                    <img src="{{ url('image/'.$asset->assetImage()->image) }}"
                        alt="รูปภาพหลัก"
                        class="w-full rounded-xl mb-4" />
                @else
                    <div class="rounded-xl bg-gray-200 h-[300px] flex items-center justify-center mb-4">
                        <i class="fa fa-image fa-2x"></i>
                    </div>
                @endif

                <div class="grid grid-cols-4 gap-4">
                    @foreach ($asset->images as $image)
                        <img src="{{ url('image/'.$image->image) }}" alt="รูปภาพทรัพย์สิน"
                            class="w-full h-[100px] rounded-xl object-cover" />
                    @endforeach
                </div>
            </div>

            <div class="w-1/3">
                <div class="bg-white rounded-xl shadow-md p-4">
                    <div class="mb-4">
                        <div class="text-2xl font-bold text-primary">
                            <i class="fa-solid fa-baht-sign"></i>
                            {{ number_format($asset->price) }}
                        </div>
                    </div>
                    <div class="border-t pt-4">
                        <div class="mb-2">
                            <i class="fa-solid fa-user"></i>
                            {{ $asset->user->name }}
                        </div>
                        <div class="mb-2">
                            <i class="fa-solid fa-phone"></i>
                            {{ $asset->contact }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection