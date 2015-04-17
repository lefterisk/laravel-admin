@extends('app')

@section('content')

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="25" class="text-center">#</th>
            @foreach($listingColumns as $column)
                <th>{{ $column }}</th>
            @endforeach
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td class="text-center"><input type="checkbox"/></td>
            @foreach($listingColumns as $column)
                <td>{{ $item->{$column} }}</td>
            @endforeach
            <td width="100" class="text-center">
                &nbsp;
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
@endsection