@foreach ($categorys as $categoryitem)
<div class="productcategory py-6">
    <!-- Category Title -->
    <div class="flex items-center mb-6">
        
        <div class="w-1/3">
            <h1 class="font-bold text-2xl uppercase text-gray-700">{{ $categoryitem->name }}</h1>
        </div>
        <div class="w-2/3">
            <ul class="flex justify-end space-x-4">
                @php
                    $categoryid = $categoryitem->id;
                @endphp
                <x-sub-list-category :categoryid="$categoryid" />
            </ul>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="grid md:grid-cols-4 grid-cols-2 gap-6">
        <x-home-product-category :categoryitem="$categoryitem" />
    </div>
</div>
@endforeach