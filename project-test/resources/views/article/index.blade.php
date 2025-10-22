
@vite('resources/scss/app.scss')

@foreach($articles as $item)
    <div class="items">
        <h2>{{$item->title}}</h2>
        <p>{{$item->content}}</p>
        <a href="{{route('article.delete', $item->id)}}">Supprimé ?</a>
    </div>
@endforeach
