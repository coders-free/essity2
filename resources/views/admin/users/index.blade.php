<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'url' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
    ]
]">


    <div class="flex justify-end">

        <a href="{{route('admin.users.create')}}" class="btn btn-magenta">
            Nuevo usuario
        </a>

    </div>

</x-admin-layout>