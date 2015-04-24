@extends('admin::admin')

@section('content')
    <section class="content-header">
        <h1>
            Add item
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
        <form name="addForm" action="{{(isset($parentId)) ? route('admin.module.parent.add', array('module' => $module, 'id' => $parentId)) : route('admin.module.add', array('module' => $module))}}">
            <!-- Default box -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-toggle="tooltip" title="Add an item"><i class="fa fa-plus-circle"></i> </button>
                        <button class="btn btn-box-tool" data-toggle="tooltip" title="Delete selected"><i class="fa fa-trash-o"></i></button>
                    </div>
                </div>
                <div class="box-body">

                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default"><i class="fa fa-save"></i> Save</button>
                        <a href="{{ (isset($parentId)) ? route('admin.module.parent', array('module' => $module, 'id' => $parentId)) : route('admin.module', array('module' => $module))}}" class="btn btn-default"><i class="fa fa-plus-circle"></i> Exit</a>
                    </div>
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </form>
    </section><!-- /.content -->

@endsection