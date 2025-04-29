@php
    use App\Models\AssetCategoriesModel;
    $categories = AssetCategoriesModel::all();
@endphp

<div class="p-4">
    <div class="text-lg font-bold">ประเภททรัพย์</div>
    <div class="mt-3">
        @foreach ($categories as $category)
            <a href="{{ route('asset-in-categories', ['id' => $category->id]) }}"
                class="flex justify-between py-1">
                <div>{{ $category->name }}</div>
                <div>{{ $category->assets->count() }}</div>
            </a>
        @endforeach
    </div>
</div>