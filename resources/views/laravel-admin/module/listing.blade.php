@extends('admin::admin')

@section('content')
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-toggle="tooltip" title="Add an item"><i class="fa fa-plus"></i> </button>
                    <button class="btn btn-box-tool" data-toggle="tooltip" title="Delete selected"><i class="fa fa-trash-o"></i></button>
                </div>
            </div>
            <div class="box-body">
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
                            <td class="text-center"><input type="checkbox" class="icheck"/></td>
                            @foreach($listingColumns as $column)
                                <td>{{ $item->{$column} }}</td>
                            @endforeach
                            <td width="100" class="text-center">
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="" class="btn btn-default btn-xs" data-toggle="tooltip" title="Edit item"><i class="fa fa-pencil"></i></a>
                                    <a href="" class="btn btn-default btn-xs" data-toggle="tooltip" title="Delete item"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group" role="group" aria-label="...">
                    <a href="" class="btn btn-default"><i class="fa fa-plus-circle"></i> Add</a>
                    <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete Selected</button>
                </div>

            </div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->

@endsection
