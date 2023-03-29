<x-app-layout>

    <x-container class="px-4 py-12">

        <div class="card card-body">

            <h1 class="text-4xl text-darkblue mb-4">Haz tu pedido <span class="uppercase">{{ $line->name }}</span></h1>

            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 mb-12">
                <ul class="flex flex-wrap -mb-px">

                    @foreach ($lines as $line)

                        <li class="mr-2">
                            <a href="{{route('products.index', $line)}}"
                                class="inline-block p-4 border-b-2 rounded-t-lg active uppercase {{ request()->url() == route('products.index', $line) ? 'text-magenta border-magenta' : 'border-transparent hover:text-gray-600 hover:border-gray-300'}}">
                                {{ $line->name }}
                            </a>
                        </li>

                    @endforeach
                    
                </ul>
            </div>

            <div class="space-y-16">
                @foreach ($categories as $category)
                
                    <section>
                        <h1 class="uppercase mb-4">
                            {{ $category->name }}
                        </h1>

                        <div class="grid grid-cols-4 gap-6">

                            @foreach ($category->products as $product)
                            
                                <article class="border border-gray-200 p-4">

                                    <figure class="mb-4">
                                        <img src="{{$product->image}}" alt="">
                                    </figure>

                                    <p class="font-semibold">
                                        C.N. {{ $product->code }}
                                    </p>

                                    <h1 class="text-lg text-darkblue font-semibold mb-2">
                                        {{ $product->name }}
                                    </h1>

                                    <a href="" class="btn btn-magenta block text-center w-full">
                                        VER PRODUCTO
                                    </a>

                                </article>

                            @endforeach

                        </div>

                    </section>

                @endforeach
            </div>

        </div>
        
    </x-container>

</x-app-layout>
