@extends('templates.default')

@section('content')
	<span>{{ Friends()->myFriends() }}</span>
@stop