@extends('layout')

@section('content')
    <div>
        <div class='text-2xl font-bold'>ลงประกาศ</div>
        <form action="{{ route('post') }}" method="post">
            @csrf 
            <div>
                <div>ประเภทของทรัพย์</div>
                <select name="asset_categories_id">
                    @foreach ($assetCategories as $item) 
                    <option value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2">
                <div>ชื่อทรัพย์</div>
                <input name="name" />
            </div>

            <div class="mt-2">
                <div>ราคา</div>
                <input name="price" type="number" />
            </div>

            <div class="mt-2">
                <div>รายละเอียด</div>
                <textarea name="detail"></textarea>
            </div>

            <div class="mt-2">
                <div>ข้อมูลการติดต่อ</div>
                <input name="contact" />
            </div>

            <div class="mt-2">
                <button type="submit">
                    <i class="fa fa-check mr-2"></i>
                    ลงประกาศ
                </button>
            </div>
        </form>
    </div>
@endsection