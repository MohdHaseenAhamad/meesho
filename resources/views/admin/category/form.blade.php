@include('admin.common.header')
@include('admin.common.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6>Category </h6>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <?php
            $redirect = isset($results) ? 'update/'.$results->id: 'save';
            ?>
            <form id="autoclave_form" name="autoclave_form" method="POST" action="{{url('admin/autoclave-report/'.$redirect)}}">
                @csrf
                <!-- /.card -->

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <h5 style="">Category Name</h5>
                                    <input type="text" class="form-control" name="material_receipt" value="" placeholder="Auto Time">
                                </div>

                                <div class="form-group">
                                    <h5 style="">Slug</h5>
                                    <input type="text" class="form-control" name="material_receipt" value="" placeholder="Auto Time">
                                </div>
                                <div class="form-group">
                                    <h5 style="">Slug</h5>
                                    <input type="text" class="form-control" name="material_receipt" value="" placeholder="Auto Time">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->


                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;
                        <a href="{{url('/admin/autoclave-report')}}" class="btn btn-warning">Back</a>
                    </div>

                </div>
            </form>

        </div>
    </section>

    <!-- /.row -->
</div>
@include('admin.common.footer')

