@extends('app')
@section('meta')
    <meta name="keywords" content="{{$article->tagsForKeywords()}}">
    <meta name="description" content="{!! $article->intro !!}">
    <meta property="og:title" content="{{$article->title}}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{url('noticia/'.$article->slug)}}" />
    <meta property="og:image" content="{{route('media',['id' => $article->image, 'width' => 300])}}" />
    <meta property="og:description" content="{!! $article->intro !!}" />
    <meta property="og:locale" content="es_ES" />
@endsection
@section('content')
    <div class="container">
        <div class="col-md-8">
            <h1>{{ucfirst($article->title)}}</h1>
            <hr />
            <img src="{{url('image-manager/view/'.$article->image.'')}}" class="img-responsive" alt="{{ucfirst($article->title)}}">
            <hr/>
            {!! $article->intro !!}
            <br /><br />
            {!! $article->body !!}
            <hr />
            <div class="addthis_sharing_toolbox"></div>
            <div class="well" style="margin-top: 10px;">
                <div class="row">
                    <div class="col-md-2">
                        <img src="//{{'www.gravatar.com/avatar/'.md5($author->email)}}" class="img-circle" alt="{{$author->name}}">
                    </div>
                    <div class="col-md-10">
                        <span style="margin-top: 35px; display: block">Publicado {{$article->created_at->diffForHumans()}} por <strong>{{$author->name}}</strong></span>
                    </div>
                </div>
            </div>
            <hr />
            <div id="disqus_thread"></div>
            <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES * * */
                var disqus_shortname = 'hechoenlaravel';

                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
        </div>
        <div class="col-md-4">
            <h2 style="margin-top: 28px;">Más Noticias</h2>
            <hr />
            @if($articles->count() === 0)
                <div class="alert alert-info">
                    <p>No hay contenido para mostrar en esta sección</p>
                </div>
            @endif
            @foreach($articles as $related)
                <div class="thumbnail project">
                    <img src="{{url('image-manager/view/'.$related->image.'/600/300/canvas')}}" class="img-responsive" alt="{{ucfirst($related->title)}}">
                    <div class="caption">
                        <h3>{{ucfirst($related->title)}}</h3>
                        <p>{{$related->intro}}</p>
                        <p><a href="{{url('noticias/'.$related->slug)}}" class="btn btn-primary btn-block" role="button">Ver noticia</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
