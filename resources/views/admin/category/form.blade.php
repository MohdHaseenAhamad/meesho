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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 >Door Closing</h5>
                                    <input type="text" class="form-control" name="door_closing" value="<?=isset($results) ? $results->door_closing:''?>" placeholder="AUTO TiME">
                                </div>

                                <div class="form-group">
                                    <h5>Vacuum Time </h5>
                                    <input type="text" class="form-control" name="vacuum_time" value="<?=isset($results) ? $results->vacuum_time:''?>" placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <h5>Rising Time </h5>
                                    <input type="text" class="form-control" name="rising_time" value="<?=isset($results) ? $results->rising_time:''?>" placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <h5>Pressure (Kg/Cm2)</h5>
                                    <input type="text" class="form-control" name="pressure" value="<?=isset($results) ? $results->pressure:''?>" placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <h5>Temp(*c)</h5>
                                    <input type="text" class="form-control" name="temp" value="<?=isset($results) ? $results->temp:''?>" placeholder="Enter ...">
                                </div>

                                <div class="form-group">
                                    <h5>Door Opening</h5>
                                    <input type="text" name="door_opening" class="form-control" value="<?=isset($results) ? $results->door_opening:''?>" placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <h5 style="text-align: center;">Stream Transfer</h5>
                                    <select class="form-control select2" name="stream_transfer" style="width: 100%;">
                                        <option value="">Select</option>
                                        <?php foreach (STREET_TRANSFER as $key=>$value)
                                        {
                                        ?>
                                        <option value="<?=$key?>" <?=isset($results) ? ($results->stream_transfer ==$key ? 'selected="selected"':''):''?>><?=$value?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <h5 style="text-align: center;">Transfer To</h5>
                                    <select class="form-control select2" name="transfer_to" style="width: 100%;">
                                        <option value="">Select</option>
                                        <?php foreach (TRANSFER_TO as $key=>$value)
                                        {
                                        ?>
                                        <option value="<?=$key?>" <?=isset($results) ? ($key==$results->transfer_to ? 'selected="selected"':''):'' ?>><?=$value?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h5>Time Stream Transfer</h5>
                                    <input type="text" class="form-control" name="time_stream_transfer" value="<?=isset($results) ? $results->time_stream_transfer:''?>" placeholder="Enter ...">
                                </div>
                            </div>

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

