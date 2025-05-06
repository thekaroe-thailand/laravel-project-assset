@extends('backoffice.layout')

@section('content')
    <div class="container">
        <h1><i class="fa-solid fa-crown"></i> ทรัพย์ยอดนิยม</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-3">
            @foreach ($assets as $asset) 
            <div class="bg-white shadow-md rounded-xl">
                <div class="">
                    <a href="{{ route('detail', $asset->asset_id) }}">
                        @if ($asset->assetImage())
                            <img src="{{ url('image/'. $asset->assetImage()->image) }}"
                                alt="รูปภาพทรัพย์สิน"
                                class="rounded-t-xl h-[150px] w-full" 
                                />
                        @else
                            <div class="rounded-t-xl bg-gray-200 h-[150px] flex items-center justify-center">
                                <i class="fa fa-image"></i>
                            </div>
                        @endif
                    </a>

                    <div class="p-4 min-h-[115px]">
                        <h2 class="mb-2 text-gray-800">{{ $asset->asset->name }}</h2>
                        <div>
                            <i class="fa-solid fa-user"></i>
                            {{ $asset->asset->user->name }}
                        </div>
                    </div>
                    <div class="flex justify-between border-t border-gray-300 p-4 bg-gray-100">
                        <div>
                            <i class="fa-solid fa-baht-sign"></i>
                            {{ number_format($asset->asset->price) }}
                        </div>
                        <div>
                            <i class="fa-solid fa-eye"></i>
                            {{ $asset->count_views }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
@endsection