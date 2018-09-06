@extends(env('THEME').'.layouts.site')

@section('main-menu')
    {!! $navigation !!}
@endsection

@section('articles_content')
    {!! $articles_content !!}
@endsection

@section('sidebar')
    {!! $rightBar !!}
@endsection