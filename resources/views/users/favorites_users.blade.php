@if (count($favorites) > 0)
    <ul class="list-unstyled">
        @foreach ($favorites as $favorite)
            <li class="media">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($favorite->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show',   $favorite->user->name  , ['user' => $favorite->user->id]) !!}</p>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                        
                            @if (Auth::id() == $user->id)
                                @if (Auth::user()->is_favorite($favorite->id))
                                    {{-- アンフォローボタンのフォーム --}}
                                    {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Unfavorite', ['class' => "btn btn-secondary btn-sm"]) !!}
                                    {!! Form::close() !!}
                                @else
                                    {{-- フォローボタンのフォーム --}}
                                    {!! Form::open(['route' => ['favorites.favorite', $favorite->id]]) !!}
                                        {!! Form::submit('Favorite', ['class' => "btn btn-success btn-sm"]) !!}
                                    {!! Form::close() !!}
                                @endif
                            @endif   
                    </div>
                    <div>
                        @if (Auth::id() == $favorite->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['microposts.destroy', $favorite->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>

        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $favorites->links() }}
@endif
