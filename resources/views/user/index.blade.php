{{-- ini user index --}}
<h1>Data User</h1>
<a href="{{ route('user.create')}}">TAMBAH DATA</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Hak Akses</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
            <td>{{$item->hak_akses}}</td>

            <td><button><a href="{{ route('user.edit', $item->id) }}">
                Edit</a></button>
            </td>

            <td>
                <form onsubmit="return confirm('Delete this user permanently?')"
                    action="{{ route('user.destroy',$item->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="DELETE">
                </form>
            </td>
        </tr>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $user->links() !!}
{{-- {{ print_r($user->toArray())}} --}}
