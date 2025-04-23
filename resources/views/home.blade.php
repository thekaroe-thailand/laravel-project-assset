@extends('layout')

@section('content')
    <form action="{{ route('search') }}" method="post" class="flex gap-1">
        @csrf
        <input type="text" name="search" placeholder="ค้นหาทรัพย์สิน" value="{{ $search ?? '' }}" />
        <button type="submit" class="flex items-center gap-2">
            <i class="fa fa-search"></i>
            ค้นหา
        </button>
    </form>

    <div class="grid grid-cols-4 gap-4 mt-4">
        @foreach ($assets as $asset) 
            <div class="bg-white shadow-md rounded-xl">
                <div class="">
                    <a href="{{ route('detail', $asset->id) }}">
                    @if ($asset->assetImage())
                        <img src="{{ url('image/'.$asset->assetImage()->image) }}"
                            alt="รูปภาพทรัพย์สิน"
                            class="rounded-t-xl h-[150px] w-full" />
                    @else
                        <div class="rounded-t-xl bg-gray-200 h-[150px] flex items-center justify-center">
                            <i class="fa fa-image"></i>
                        </div>
                    @endif
                    </a>

                    <div class="p-4 min-h-[115px]">
                        <h2 class="text-gray-800 mb-2">{{ $asset->name }}</h2>
                        <div>
                            <i class="fa-solid fa-user"></i>
                            {{ $asset->user->name }}
                        </div>
                    </div>
                    <div class="flex justify-between border-t border-gray-300 p-4 bg-gray-100">
                        <div>
                            <i class="fa-solid fa-baht-sign"></i>
                            {{ number_format($asset->price) }}
                        </div>
                        <div>
                            <i class="fa-solid fa-eye"></i>
                            999
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection