@extends('admin.layout')
@section('content')
    <div class="container">
        <h2>Lista użytkowników</h2>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Aktywny</th>
                <th>Zablokowany</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_active ? 'Tak' : 'Nie' }}</td>
                    <td>{{ $user->is_blocked ? 'Tak' : 'Nie' }}</td>
                    <td>
                        <!-- Przycisk Usuń jest zawsze widoczny -->
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-danger">Usuń</button>
                        </form>

                        <!-- Przycisk Aktywuj widoczny tylko, gdy użytkownik jest nieaktywny -->
                        @if(!$user->is_active)
                            <form action="{{ route('admin.users.activate', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-success">Aktywuj</button>
                            </form>
                        @else
                            <!-- Przycisk Zablokuj widoczny tylko, gdy użytkownik jest aktywowany i nie jest zablokowany -->
                            @if(!$user->is_blocked)
                                <form action="{{ route('admin.users.block', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-warning">Zablokuj</button>
                                </form>
                            @endif

                            <!-- Przycisk Odblokuj widoczny tylko, gdy użytkownik jest aktywowany i jest zablokowany -->
                            @if($user->is_blocked)
                                <form action="{{ route('admin.users.unblock', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-info">Odblokuj</button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
