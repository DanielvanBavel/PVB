@extends('templates.default')

@section('content')
	<span>{{ Auth::Friends()->myFriends() }}</span>
@stop