@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif
<a class="btn btn-primary my-2" href="{{ route('visitortypes.create') }}">Add</a>
<div class="card">
    <div class="card-header bg-primary text-white">Visitor Type</div>
    <div class="card-body">
        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($visitortypes as $visitortype)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $visitortype->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $visitortypes->links() !!}
@endsection
