@extends('layouts.app')

@section('content')

@if (session('message'))
<h4 id="message">{{ session('message') }}</h4>
@endif

<a href="{{ url('positions/create') }}">Add Position</a>
{!! $dataTable->table() !!}
@endsection

@push('scripts')
<script>
$(function() {
    $('.table').DataTable({
        serverSide: true,
        processing: true,
        ajax: '',
        columns: [
        	{data: 'name'},
        	{data: 'edit'},
        	{data: 'delete'}
        	]
    });
});
</script>
@endpush
