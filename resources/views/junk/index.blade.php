@extends(env('THEME').'.layouts.site')

@section('main-menu')
    {!! $navigation !!}
@endsection
@section('slider')
    {!! $slider !!}
@endsection

@section('portfolio_content')
    {!! $portfolio_content !!}
@endsection

@section('sidebar')
    {!! $rightBar !!}
@endsection