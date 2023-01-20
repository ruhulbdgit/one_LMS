<div>
    <div>

        <table class="w-full table-auto ">
            <tr>

                <th class="border px-4 py-2 text-left">Name </th>
                <th class="border px-4 py-2 text-left">Permission </th>
                <th class="border px-4 py-2">Action</th>
            </tr>

            @foreach ($roles as $role)
                <tr>
                    <td class="border px-4 py-2">{{ $role->name }}</td>
                    <td class="border px-4 py-2 text-center">
                        @foreach($role->permissions as $permission)
                            <span class="px-2 py-2 bg-green-400 rounded-full text-white">{{$permission->name}}</span>
                            @endforeach
                    </td>
                    <td>
                        <div class="flex items-center justify-center display-inline-block ">
                            <a href="{{ route('role.edit',$role->id) }}">
                                @include('components.icons.edit')
                            </a>
                            <form onsubmit="return confirm('Are you sure?');" wire:submit.prevent="roleDelete({{ $role->id }})">
                                <button type="submit">
                                    @include('components.icons.trash')
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        </table>


    </div>

</div>
