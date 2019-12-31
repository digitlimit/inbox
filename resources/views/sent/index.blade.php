@inject('helper', 'Digitlimit\Inbox\Helpers\Helper')
@extends('inbox::layouts.app')
@section('title', 'Messages')
@section('content')
	<div class="list-group">
		@forelse($threads as $thread)
			@include('inbox::loop.thread')
		@empty
			<div class="list-group-item p-5">
				<h3 class="text-center font-weight-bold">There is no sent messages</h3>
			</div>
		@endforelse
	</div>
@endsection

@section('pagination')
	@if($threads->hasPages())
		{!! $threads->render() !!}
	@endif
@endsection
