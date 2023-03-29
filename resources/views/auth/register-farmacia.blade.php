<x-guest-layout>

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
            .select2-selection__rendered {
                line-height: 42px !important;
            }

            .select2-container .select2-selection--single {
                height: 42px !important;
            }

            .select2-selection__arrow {
                height: 42px !important;
            }
        </style>
    @endpush

    <x-container class="px-4 py-12">

        <div class="card">
            <div class="card-body">
                <h1 class="text-3xl text-darkblue mb-4">Registro</h1>

                <div class="bg-gray-50 p-4 mb-4">
                    <p class="text-darkblue text-lg font-semibold">Detalles de farmacia</p>
                </div>


                <form action="{{route('register.store')}}" method="POST">

                    @csrf

                    <x-validation-errors class="mb-4" />

                    
                    @include('auth.register-form')

                    {{-- Role --}}
                    <input type="hidden" name="role" value="farmacia">

                    {{-- Cooperativas --}}
                    <div class="mb-4">

                        <div class="grid grid-cols-5 gap-6 mb-1">

                            <div class="col-span-3">
                                <x-label>
                                    Cooperativa habitual
                                </x-label>
                            </div>

                            <div class="col-span-2">
                                <x-label>
                                    Número de cooperante
                                </x-label>
                            </div>

                        </div>


                        <div class="grid grid-cols-5 gap-6">

                            <div class="col-span-3">
                                <select name="cooperative1_id" class="cooperatives" style="width: 100%">
                                    
                                    @if ($cooperative1_old)
                                        <option value="{{$cooperative1_old->id}}" selected>{{$cooperative1_old->name}}</option>                                
                                    @endif
                                
                                </select>
                            </div>

                            <div class="col-span-2">
                                <x-input type="number" name="cooperative1_number" value="{{old('cooperative1_number')}}" class="block mt-1 w-full" />
                            </div>

                            <div class="col-span-3">
                                <select name="cooperative2_id" class="cooperatives" style="width: 100%">
                                
                                    @if ($cooperative2_old)
                                        <option value="{{$cooperative2_old->id}}" selected>{{$cooperative2_old->name}}</option>                                
                                    @endif

                                </select>
                            </div>

                            <div class="col-span-2">
                                <x-input type="number" name="cooperative2_number" value="{{old('cooperative2_number')}}" class="block mt-1 w-full" />
                            </div>

                            <div class="col-span-3">
                                <select name="cooperative3_id" class="cooperatives" style="width: 100%">
                                
                                    @if ($cooperative3_old)
                                        <option value="{{$cooperative3_old->id}}" selected>{{$cooperative3_old->name}}</option>                                
                                    @endif

                                </select>
                            </div>

                            <div class="col-span-2">
                                <x-input type="number" name="cooperative3_number" value="{{old('cooperative3_number')}}" class="block mt-1 w-full" />
                            </div>
                        </div>
                    </div>

                    {{-- Checkbox --}}
                    <div class="my-10">

                        <label class="flex items-center">

                            <x-checkbox id="terms" name="terms" class="mr-2" :checked="old('terms')" />

                            <p>Lee y acepta la <a href="#" class="text-magenta">política y privacidad</a></p>

                        </label>

                        <label class="flex items-center">

                            <x-checkbox id="oferts" name="oferts" class="mr-2" />

                            <p>Me gustaría recibir ofertas exclusivas e información sobre las novedades de TENA por correo
                            electronico <span class="text-gray-400">(Opcional)</span></p>

                        </label>

                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-between">
                        <a href="/register" class="btn btn-outline-magenta">
                            Volver
                        </a>

                        <button class="btn btn-blue" id="submit" @disabled(old('terms') == null)>
                            Enviar
                        </button>
                    </div>

                </form>
            </div>
        </div>


    </x-container>

    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <script>
            $(document).ready(function() {
                $('#provinces').select2({
                    placeholder: 'Seleccione un municipio',

                    ajax: {
                        url: "{{ route('select2.provinces') }}",
                        dataType: 'json',
                        data: function(params) {
                            return {
                                term: params.term,
                            }
                        },
                        processResults: function(data, page) {
                            return {
                                results: data
                            };
                        },
                    }

                });


                $('#towns').select2({
                    placeholder: 'Seleccione una población',

                    ajax: {
                        url: "{{ route('select2.towns') }}",
                        dataType: 'json',
                        data: function(params) {
                            return {
                                term: params.term,
                                province_id: $('#provinces').val()
                            }
                        },
                        processResults: function(data, page) {
                            return {
                                results: data
                            };
                        },
                    }

                });

                $('.cooperatives').select2({
                    placeholder: 'Seleccione una cooperativa',

                    ajax: {
                        url: "{{ route('select2.cooperatives') }}",
                        dataType: 'json',
                        data: function(params) {
                            return {
                                term: params.term,
                            }
                        },
                        processResults: function(data, page) {
                            return {
                                results: data
                            };
                        },
                    }

                });

                //Si cambia la provincia, se vacía el select de poblaciones
                $('#provinces').on('change', function() {
                    $('#towns').val(null).trigger('change');
                });
            });



            const termsCheckbox = document.getElementById("terms");
            const submitButton = document.getElementById("submit");

            termsCheckbox.addEventListener("click", function() {
                if (termsCheckbox.checked) {
                    submitButton.disabled = false;
                } else {
                    submitButton.disabled = true;
                }
            });

        </script>
    @endpush

</x-guest-layout>
