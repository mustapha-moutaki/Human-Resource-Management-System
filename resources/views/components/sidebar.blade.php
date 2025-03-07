<aside id="sidebar" class="w-64 bg-gray-200 text-gray-800 h-screen p-4 fixed left-0 top-0 transform -translate-x-full transition-transform duration-300 md:translate-x-0">
    <ul class="mt-16">
    @hasrole('Admin|Manager')
        <li class="mb-4"><a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-300">Dashboard</a></li>
        @endhasrole
        @hasrole('Admin|Manager|HR')
        <li class="mb-4"><a href="{{ route('users.index') }}" class="block py-2 px-4 hover:bg-gray-300">Manage Users</a></li>
        @endhasrole
        @hasrole('Admin|Manager|HR')
        <li class="mb-4"><a href="{{route('careers.create')}}" class="block py-2 px-4 hover:bg-gray-300">Manage jobs</a></li>
        @endhasrole
        @hasrole('Admin|HR')
        <li class="mb-4"><a href="{{ route('formations.index') }}" class="block py-2 px-4 hover:bg-gray-300">Manage formations</a></li>
        @endhasrole
        @hasrole('Admin|HR')
        <li class="mb-4"><a href="{{ route('departements.index') }}" class="block py-2 px-4 hover:bg-gray-300">manage departments</a></li>
        <li class="mb-4"><a href="{{ route('contracts.index') }}" class="block py-2 px-4 hover:bg-gray-300">manage contracts</a></li>
        @endhasrole
        @hasrole('Admin|HR|Manager')
        <li class="mb-4"><a href="{{ route('grads.index') }}" class="block py-2 px-4 hover:bg-gray-300">manage grads</a></li>
        @endhasrole
        <li class="mb-4"><a href="" class="block py-2 px-4 hover:bg-gray-300">Manage Employee</a></li>
        @hasrole('Admin|HR|Manager|Employee')
        <li class="mb-4"><a href="" class="block py-2 px-4 hover:bg-gray-300"> Organigramme</a></li>
        @endhasrole
        @hasrole('Admin')
        <li class="mb-4"><a href="{{route('roles.index') }}" class="block py-2 px-4 hover:bg-gray-300"> manage roles</a></li>
        @endhasrole
        @hasrole('Admin|HR|Manager')
        <li class="mb-4"><a href="{{route('manageapps.index')}}" class="block py-2 px-4 hover:bg-gray-300"> Leave Administration</a></li>
        @endhasrole
        @hasrole('Employee')
        <li class="mb-4"><a href="{{route('administrations.create') }}" class="block py-2 px-4 hover:bg-gray-300">Leave Application</a></li>
        @endhasrole
    </ul>
</aside>
