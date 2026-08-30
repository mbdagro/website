@extends('layouts.BackEndApps')
@section('content')
    @include('admin.header')
    @include('admin.sidebar-left')
    <div class="wrapper-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-16 col-md-16">
                    <div class="card">
                        <div class="card-footer align-items-center justify-content-between d-flex">
                            <button class="btn btn-outline-success pull-right">Project/Offer List</button>
                            <button class="btn btn-primary ServiceAddButton"><i class="fa fa-plus"></i> Project/Offer
                                Add</button>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive" id="tab">
                                <table id="service_table" class="table table-striped table-bordered table-hover"
                                    style="border: solid 1px rgba(255, 193, 193, 0.1);">
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
    <!--Start Model-->
    <div class="modal dark_bg fade" id="ServiceAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="service_insert_update" action="{{ route('productservice.update') }}" accept-charset="utf-8"
                enctype="multipart/form-data" method="post" class="form-horizontal validatable">
                <input type="hidden" name="id" id="hidden-id" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Project/Offer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-12 col-form-label">Code</label>
                                    <div class="col-16">
                                        <input name="code" type="text" class="form-control" value=""
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-16 col-form-label">Category</label>
                                    <div class="col-16">
                                        {{-- <select name="category" class="form-control">
                                        <option value="">Select One Option</option>
                                        <option value="Apartments">Apartments</option>
                                        <option value="Lands">Land</option>
                                        <option value="Duplex">Duplex</option>
                                        <option value="Hotels">Hotels</option>
                                    </select> --}}
                                        <select name="category_id" class="form-control">
                                            <option value="">Select One Option</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-16 col-form-label">Progress</label>
                                    <div class="col-16">
                                        <select name="progress" class="form-control">
                                            <option value="">Select One Option</option>
                                            <option value="ongoing">ongoing</option>
                                            <option value="upcoming">upcoming</option>
                                            <option value="completed">completed</option>
                                            <option value="consultancy">consultancy</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-16 col-form-label">Type</label>
                                    <div class="col-16">
                                        <select name="type" class="form-control">
                                            <option value="">Select One Option</option>
                                            <option value="offer">Offer</option>
                                            <option value="project">Project</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-12 col-form-label">Name</label>
                                    <div class="col-16">
                                        <input name="name" type="text" class="form-control" value=""
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-12 col-form-label">Price Start At</label>
                                    <div class="col-16">
                                        <input name="price" type="text" class="form-control" value=""
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-16  text-white">
                                <div class="form-group">
                                    <label for="short_description" class="col-12 col-form-label">Short_description</label>
                                    <div class="col-16">
                                        <textarea class="form-control" name="short_description" id="short_description"
                                            placeholder="Enter Short_description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-16 text-black">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-12 col-form-label"> Description</label>
                                    <div class="col-16">
                                        <textarea name="description" cols="50" rows="10" id="description" placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-16  text-white">
                                <div class="form-group">
                                    <label for="example-search-input" class="col-8 col-form-label">Image (2080*2080
                                        jpg)</label>
                                    <div class="col-16">
                                        <input type="file" class="form-control" placeholder="" name="image"
                                            value="">
                                        <input type="file" class="form-control" placeholder="" name="image1"
                                            value="">
                                        <input type="file" class="form-control" placeholder="" name="image2"
                                            value="">
                                        <input type="file" class="form-control" placeholder="" name="image3"
                                            value="">
                                        <input type="file" class="form-control" placeholder="" name="image4"
                                            value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">Per Share</label>
                                    <div class="col-16">
                                        <input name="per_share" type="number" step="0.01" class="form-control"
                                            placeholder="Enter Per Share Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">RIO (%)</label>
                                    <div class="col-16">
                                        <input name="rio" type="number" step="0.01" class="form-control"
                                            placeholder="Enter Percentage">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">Duration</label>
                                    <div class="col-16">
                                        <input name="duration" type="number" class="form-control"
                                            placeholder="Example: 25 Days">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">Return Type</label>
                                    <div class="col-16">
                                        <select name="return_type" class="form-control">
                                            <option value="">Select Return Type</option>
                                            <option value="lifetime">Life Time</option>
                                            <option value="repeated">Repeated</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">Start Date</label>
                                    <div class="col-16">
                                        <input name="start_date" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">End Date</label>
                                    <div class="col-16">
                                        <input name="end_date" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">Max Unit</label>
                                    <div class="col-16">
                                        <input name="max_unit" type="number" class="form-control"
                                            placeholder="Enter Max Unit">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-16 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">Location (Map Link)</label>
                                    <div class="col-16">
                                        <input name="location" type="text" class="form-control"
                                            placeholder="Paste Google Map Link">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-16 text-white">
                                <div class="form-group">
                                    <label class="col-12 col-form-label">Comments</label>
                                    <div class="col-16">
                                        <textarea name="comments" class="form-control" placeholder="Write comments"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8  text-white">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input" class="col-12 col-form-label">Author
                                        Name</label>
                                    <div class="col-16">
                                        <input class="form-control" type="text" name="meta_author" id="meta_author"
                                            placeholder="Enter Author Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8  text-white">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input" class="col-12 col-form-label">Meta
                                        Title</label>
                                    <div class="col-16">
                                        <input class="form-control" type="text" name="meta_title" id="meta_title"
                                            placeholder="Enter Meta Title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8  text-white">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input" class="col-12 col-form-label">Meta
                                        Description</label>
                                    <div class="col-16">
                                        <textarea class="form-control" id="meta_description" rows="3" name="meta_description"
                                            placeholder="Write Descriptions..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8  text-white">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input" class="col-12 col-form-label">Meta
                                        Keywords</label>
                                    <div class="col-16">
                                        <textarea class="form-control" id="meta_keywords" rows="3" name="meta_keywords"
                                            placeholder="Write Keywords. Example: sarina,sarinaalam,construction"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8  text-white">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input" class="col-12 col-form-label">OG Title</label>
                                    <div class="col-16">
                                        <input class="form-control" type="text" name="og_title" id="og_title"
                                            placeholder="Enter OG Title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8  text-white">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input" class="col-12 col-form-label">OG Site
                                        Name</label>
                                    <div class="col-16">
                                        <input class="form-control" type="text" name="og_sitename" id="og_sitename"
                                            placeholder="Enter OG Site Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8  text-white">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input" class="col-12 col-form-label">OG
                                        Description</label>
                                    <div class="col-16">
                                        <textarea class="form-control" id="og_description" rows="3" name="og_description"
                                            placeholder="Write Descriptions..."></textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary formSubmit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--EndModel-->
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            var generator = new IDGenerator(7);
            var ProductServiceID = "PS" + generator.generate();
            $('input[name^="code"]').val(ProductServiceID);

            CKEDITOR.replace(document.querySelector('#description'));

            $('#service_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('productservice.data') }}",
                    type: 'GET',
                    cache: false
                },
                columns: [{
                        title: 'SL',
                        data: 'id',
                        name: 'id'
                    },
                    {
                        title: 'Category',
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        title: 'Progress',
                        data: 'progress',
                        name: 'progress'
                    },
                    {
                        title: 'Code',
                        data: 'code',
                        name: 'code'
                    },
                    {
                        title: 'Name',
                        data: 'name',
                        name: 'name'
                    },
                    // {
                    //     title: 'Description',
                    //     data: 'description',
                    //     name: 'description'
                    // },
                    {
                        title: 'Image',
                        data: 'image',
                        name: 'image'
                    },
                    {
                        title: 'Price Start At',
                        data: 'price',
                        name: 'price'
                    },
                    {
                        title: 'Add By',
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        title: 'Action',
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            $(document).on('click', '.formSubmit', function() {
                for (instance in CKEDITOR.instances)
                    CKEDITOR.instances[instance].updateElement();
            });

            $('#service_insert_update').ajaxForm({
                beforeSend: formBeforeSend,
                beforeSubmit: formBeforeSubmit,
                error: formError,
                success: function(responseText, statusText, xhr, $form) {
                    formSuccess(responseText, statusText, xhr, $form);
                    $('#service_table').DataTable().draw(true);
                    $("#ServiceAdd").modal('hide');
                    $('#hidden-id').attr("disabled", "true");
                },
                clearForm: true,
                resetForm: true
            });

            $(document).on('click', '.ServiceAddButton', function() {
                $('#hidden-id').attr("disabled", "true");
                $("#ServiceAdd").modal('show');
                var ProductServiceID = "PS" + generator.generate();
                $('input[name^="code"]').val(ProductServiceID);
            });
            $(document).on('click', '.tableDelete', function() {
                let Id = $(this).data('id');
                $(this).ajaxSubmit({
                    error: formError,
                    data: {
                        "delete": Id
                    },
                    method: 'POST',
                    dataType: 'json',
                    url: "{{ route('productservice.update') }}",
                    success: function(responseText) {
                        swal("Success!", responseText.message, "success");
                        $('#service_table').DataTable().draw(true);
                    }
                });
            });

            $(document).on('click', '.tableEdit', function() {
                let Id = $(this).data('id');
                $('#hidden-id').removeAttr("disabled");
                $('#hidden-id').val(Id);
                $(this).ajaxSubmit({
                    error: formError,
                    data: {
                        "id": Id
                    },
                    dataType: 'json',
                    method: 'GET',
                    url: "{{ route('productservice.edit') }}",
                    success: function(responseText) {
                        // $('select[name^="category"]').val(responseText.data.category);
                        $('select[name="category_id"]').val(responseText.data.category_id);
                        $('select[name^="progress"]').val(responseText.data.progress);
                        $('select[name^="type"]').val(responseText.data.type);
                        $('input[name^="code"]').val(responseText.data.code);
                        $('input[name^="name"]').val(responseText.data.name);
                        $('input[name^="floor"]').val(responseText.data.floor);
                        $('input[name^="price"]').val(responseText.data.price);
                        $('input[name^="video_link"]').val(responseText.data.video_link);
                        $('input[name^="address"]').val(responseText.data.address);
                        $('textarea[name^="short_description"]').val(responseText.data
                            .short_description);

                        $('input[name^="meta_author"]').val(responseText.data.meta_author);
                        $('input[name^="built_year"]').val(responseText.data.built_year);
                        $('input[name^="available_from"]').val(responseText.data
                            .available_from);

                        $('input[name^="property_contact"]').val(responseText.data
                            .property_contact);
                        $('input[name^="property_email"]').val(responseText.data
                            .property_email);
                        $('input[name^="room_qty"]').val(responseText.data.room_qty);
                        $('input[name^="bathroom_qty"]').val(responseText.data.bathroom_qty);
                        $('input[name^="garadge_qty"]').val(responseText.data.garadge_qty);
                        $('input[name^="baranda_qty"]').val(responseText.data.baranda_qty);
                        $('input[name^="size"]').val(responseText.data.size);
                        $('input[name^="per_share"]').val(responseText.data.per_share);
                        $('input[name^="rio"]').val(responseText.data.rio);
                        $('input[name^="duration"]').val(responseText.data.duration);
                        $('input[name^="start_date"]').val(responseText.data.start_date);
                        $('input[name^="end_date"]').val(responseText.data.end_date);
                        $('input[name^="max_unit"]').val(responseText.data.max_unit);
                        $('input[name^="location"]').val(responseText.data.location);
                        $('textarea[name^="comments"]').val(responseText.data.comments);

                        $('input[name^="meta_title"]').val(responseText.data.meta_title);
                        $('input[name^="og_title"]').val(responseText.data.og_title);
                        $('input[name^="og_sitename"]').val(responseText.data.og_sitename);
                        $("textarea#meta_description").val(responseText.data.meta_description);
                        $("textarea#meta_keywords").val(responseText.data.meta_keywords);
                        $("textarea#og_description").val(responseText.data.og_description);
                        $("#ServiceAdd").modal('show');
                        CKEDITOR.instances['description'].setData(responseText.data
                            .description);
                    }
                });
            });

            function IDGenerator(value = 10) {

                this.length = value;
                this.timestamp = +new Date;

                var _getRandomInt = function(min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                }

                this.generate = function() {
                    var ts = this.timestamp.toString();
                    var parts = ts.split("").reverse();
                    var id = "";

                    for (var i = 0; i < this.length; ++i) {
                        var index = _getRandomInt(0, parts.length - 1);
                        id += parts[index];
                    }

                    return id;
                }
            }
        });
    </script>
@endsection
