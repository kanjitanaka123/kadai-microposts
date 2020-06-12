@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favorite($micropost->id))
        {{-- アンフォローボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-secondary btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {{-- フォローボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
@endif
@if (Auth::id() == $user->id)
    @if (Auth::user()->is_favorite($micropost->id))
        {{-- アンフォローボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-secondary btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {{-- フォローボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
@endif