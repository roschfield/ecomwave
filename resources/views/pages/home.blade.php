@extends('template')
@section('page_title')
Home-Ecomwave
@endsection
@section('content')
<!-- Hero Section-->
@php
    $bgImage = asset('storage/images/hero-banner.jpg');
    $ctaImage = asset('storage/images/cta.jpg');

@endphp
<div class="hero w-full mx-auto py-10  flex justify-start  h-dvh px-6 sm:px-20 bg-[url('{{ $bgImage }}')] bg-cover bg-center">
    <div class="w-[1200px] mx-auto flex flex-col justify-center gap-8">

        <p class="border border-2 rounded-full max-w-max px-4 py-2 border-gray-300 bg-white">Exclusive Collections</p>
        <h1 class="text-3xl max-w-3xl sm:text-6xl">PREMIUM <span class="font-bold text-white">CLOTHES</span> FOR <span class="font-bold text-white">COMFORT</span> WEAR</h1>
        <p class="text-xl">Step into Ecomwave, where every garment tells a story of enduring style and quality.</p>
        <a class="bg-black max-w-max py-3 px-4 text-white shadow" href="{{ route('shop') }}">Explore Shop</a>
    </div>
</div>
<!-- Category Section-->
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
<!-- Collection Products Section-->
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
<!-- CTA Section-->
<div class="cta w-[1200px] mx-auto flex flex-col justify-center gap-8 py-10 px-10  h-96 sm:px-16  mb-20 bg-[url('{{ $ctaImage }}')] bg-cover bg-center">

    <h1 class="text-3xl max-w-3xl sm:text-6xl font-medium">Exclusive Fashion Offers Waiting For You</h1>
    <a class="bg-black max-w-max py-3 px-4 text-white shadow" href="{{ route('shop') }}">Explore Products</a>
</div>
<!-- Testimonial Section-->
<!-- Newsletter Section-->
<section class="w-full bg-gradient-to-r from-[#00766e] via-green-800 to-[#00766e] py-16 px-4">
  <div class="max-w-[1200px] mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
      Subscribe to our Newsletter
    </h2>
    <p class="text-green-200 mb-8 max-w-2xl mx-auto">
      Get the latest updates, articles, and resources straight to your inbox.
    </p>

    <form class="flex flex-col sm:flex-row items-center justify-center gap-4 max-w-2xl mx-auto">
      <input 
        type="email" 
        placeholder="Enter your email" 
        class="w-full sm:flex-1 px-4 py-3  border  focus:outline-none focus:ring-2 focus:ring-green-400"
      >
      <button 
        type="submit" 
        class="px-6 py-3 bg-black  text-white font-medium  transition-colors duration-200 w-full sm:w-auto"
      >
        Subscribe
      </button>
    </form>
  </div>
</section>

@endsection