@extends('template')
@section('page_title')
Home-Ecomwave
@endsection
@section('content')
@php
    $bgImage = asset('storage/images/hero-banner.jpg');
@endphp
<div class="hero max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex flex-col justify-center gap-8 h-dvh px-20 w-full bg-[url('{{ $bgImage }}')] bg-cover bg-center">

    <p class="border border-2 rounded-full max-w-max px-4 py-2 border-gray-300 bg-white">Exclusive Collections</p>
    <h1 class="text-3xl max-w-3xl sm:text-6xl">PREMIUM <span class="font-bold text-white">CLOTHES</span> FOR <span class="font-bold text-white">COMFORT</span> WEAR</h1>
    <p class="text-xl">Step into Ecomwave, where every garment tells a story of enduring style and quality.</p>
    <a class="bg-black max-w-max py-3 px-4 text-white shadow" href="{{ route('shop') }}">Explore Shop</a>
</div>

<div class="flex flex-col gap-6 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    
            <!-- Heading -->
            <div class="flex justify-start items-center">
              <h2 class="text-2xl sm:text-3xl font-semibold text-black">SHOP BY CATEGORY</h2>
            </div>
        
            <!-- Categories Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
              
              @foreach ($categories as $category )
                  
              <div class="h-56 rounded-[32px] flex items-end p-4" 
                 style="background-image: url('{{ asset('storage/' . $category->image) }}'); background-size: cover; background-position: center;">
                <a href="{{ route('category',[$category->id,$category->slug]) }}" class="px-4 py-2.5 bg-white rounded-full font-semibold text-black text-lg">
                  {{ $category->name }}
                </a>
              </div>
              @endforeach
        

        
            </div>
</div>
<div class="container max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">  
    @foreach($collections as $collection)
       <div class="category-section mb-12">
        <h2 class="text-2xl font-bold mb-4">{{ $collection->name }}</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($collection->products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>

        <!-- Button to category page -->
        <div class="mt-4 text-center">
            <a href="{{ route('collection', [$collection->id, $collection->slug]) }}" 
               class="px-6 py-3 bg-black text-white  font-semibold ">
               View Collection
            </a>
        </div>
      </div>
   @endforeach
</div>
@endsection