@include('admin.common.header')
@include('admin.common.sidebar')
<style>
    .btn-size {

    }
</style>
<div class="content-wrapper" style="min-height: 498px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6>Category List</h6>
                </div>
                <!--<div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Advanced Form</li>
                  </ol>
                </div>-->
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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{url('/admin/autoclave-report/add')}}" class="btn btn-block btn-success">Add
                                    Category</a>
                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">

                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Modify Date</th>
                                    <th>Created Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="category_table_data">
                                </tbody>
                            </table>

                        </div>
                        <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                            {{--<div class="text-bold pt-2">Loading...</div>--}}
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex justify-content-start">
                                <b></b>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="d-flex justify-content-end">

                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

@include('admin.common.footer')

<script>
    $(document).ready(function () {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/category',
            method: 'GET',
            before: function () {
                $(".overlay").show();
            },
            success: function (res) {
                var html = '';
                var i = 1;
                $.each(res.data.data, function (key, val) {
                    html += '<tr><td>' + i + '</td>\n' +
                        '                                   <td>' + val.cat_name + '</td>\n' +
                        '                                   <td>' + val.cat_slug + '</td>\n' +
                        '                                   <td>' + val.cat_status + '</td>\n' +
                        '                                   <td>' + val.updated_at + '</td>\n' +
                        '                                   <td>' + val.created_at + '</td>\n' +
                        '                                   <td class="project-actions text-center"> ' +
                        '<a class="btn btn-primary btn-sm" href="{{url("category/view")}}"> ' +
                        '<i class="fas fa-folder"> ' +
                        '</i> View ' +
                        '</a>&nbsp ' +
                        '<a class="btn btn-info btn-sm" href="{{url("category/edit")}}/' + val.id + '"> ' +
                        '<i class="fas fa-pencil-alt">' +
                        '</i> Edit </a>&nbsp ' +
                        '<a class="btn btn-danger btn-sm" href="#">' +
                        '<i class="fas fa-trash"></i> Delete </a>' +
                        '</td></tr>';
                    i++;
                });

                $("#category_table_data").append(html);

            },
            error: function () {
                alert("something went wrong")
            }

        }).done(function () {
            $(".overlay").hide();
        });
    });
</script>
