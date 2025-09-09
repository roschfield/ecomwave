@extends('template')
@section('page_title')
Shop-Ecomwave
@endsection
@section('content')
<section class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex justify-center">
          <div class="flex flex-col gap-6">
            
            <!-- Heading -->
            <div class="flex justify-start items-center">
              <h2 class="text-2xl sm:text-3xl font-semibold text-black">Browse Categories</h2>
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

            <!-- Prodcuts Grid -->
             <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
           
                @if($products->isEmpty())
                   <p class="text-gray-500">No products available at the moment.</p>
                @endif
                @foreach($products as $product)
                
                <x-product-card :product="$product" />
         
              @endforeach
            </div>
          </div>
        </section>
@endsection