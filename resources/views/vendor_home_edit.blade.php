@extends('admin.layouts.master-soyuz')
@section('title',__('Edit Home Page For Startup | '))
@section('body')
@component('admin.component.breadcumb',['thirdactive' => 'active'])

@slot('heading')
{{ __('Edit Home Page For Startup') }}
@endslot

@slot('button')
<div class="col-md-6">
    <div class="widgetbar">
        <a href="{{ route('simple-products.index') }}" class="btn btn-primary-rgba"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back")}}</a>
    </div>
</div>
@endslot
​
@endcomponent
<div class="contentbar">
    <div class="row">

        <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                <p>
                    {{ $error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </p>
                @endforeach
            </div>
            @endif
            
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="box-title">{{ __('Edit Startup Homepage') }}</h5>
                </div>
                <div class="card-body ml-2">
                    <!-- main content start -->
                    
                    <form action="{{ URL::to('/admin/homepage/save/'.$vendorhome[0]->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">
                                        Product Store : <span class="text-danger">*</span>
                                    </label>
                                    <select readonly data-placeholder="{{ __("Please select store") }}" 
                                        name="store_id" class="form-control select2">

                                        <option value="">{{ __("Please select store") }}</option>

                                        @foreach($stores as $store)
                                        <optgroup label="Store Owner • {{ $store->user->name }}">
                                            <option {{ $vendorhome[0]->store_id == $store->id ? "selected" : "" }}
                                                value="{{ $store->id }}">
                                                {{ $store->name }}</option>
                                        </optgroup>
                                        @endforeach


                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark">{{ __("Banner Images : ") }}<span
                                            class="text-danger">*</span></label>

                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input multiple type="file" class="custom-file-input" name="images[]"
                                                id="upload_gallery" >
                                            <label class="custom-file-label" for="upload_gallery">
                                                {{__("Multiple images can be selected")}}
                                            </label>
                                        </div>
                                    </div>

                                    <small class="text-muted">
                                        <i class="fa fa-question-circle"></i> {{__("Multiple images can be choosen")}}
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">{{ __("Content1 : ") }}<span
                                        class="text-danger">*</span></label>
                                <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="content1"
                                    id="editor1" cols="30" rows="10" >
                                    {{$vendorhome[0]->content1}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">{{ __("Image1 : ") }}<span class="text-danger">*</span></label>
                                <input type="file" class="form-control-file" id="image1" name="image1">
                            </div>
                            <div class="form-group">
                                <label class="text-dark">{{ __("Image2 : ") }}<span class="text-danger">*</span></label>
                                <input type="file" class="form-control-file" id="image2" name="image2">
                            </div>
                            <div class="form-group">
                                <label class="text-dark">{{ __("Image3 : ") }}<span class="text-danger">*</span></label>
                                <input type="file" class="form-control-file" id="image3" name="image3">
                            </div>


                        </div>


                        <div class="form-group">
                            <label class="text-dark">{{ __("Content2 : ") }}<span class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="content2" cols="30"
                                rows="10">{{$vendorhome[0]->content2}}</textarea>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Content2 Images : ") }}<span
                                        class="text-danger">*</span></label>

                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input multiple type="file" class="custom-file-input" name="content2images[]"
                                            id="upload_gallery" >
                                        <label class="custom-file-label" for="upload_gallery">
                                            {{__("Upload 4 images for content")}}
                                        </label>
                                    </div>
                                </div>

                                <small class="text-muted">
                                    <i class="fa fa-question-circle"></i> {{__("Multiple images can be choosen")}}
                                </small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">{{ __("Tagline : ") }}<span class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="tag" cols="30"
                                rows="10">{{$vendorhome[0]->tag}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Number 1 : ") }}<span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{ __('Enter Number 1') }}" value="{{$vendorhome[0]->num1}}" name="num1" />

                            <label class="text-dark">{{ __("Sign 1 : ") }}<span class="text-danger"></span></label>
                            <input type="text" placeholder="{{ __('Enter Sign for Number 1') }}" value="{{$vendorhome[0]->sign1}}" name="sign1"/>

                            <label class="text-dark">{{ __("Name 1 : ") }}<span class="text-danger"></span></label>
                            <input type="text" placeholder="{{ __('Enter Name for Number 1') }}" value="{{$vendorhome[0]->name1}}" name="name1"/>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">{{ __("Number 2 : ") }}<span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{ __('Enter Number 2') }}" name="num2" value="{{$vendorhome[0]->num2}}"  />

                            <label class="text-dark">{{ __("Sign 2 : ") }}<span class="text-danger"></span></label>
                            <input type="text" placeholder="{{ __('Enter Sign for Number 2') }}" value="{{$vendorhome[0]->sign2}}" name="sign2"/>

                            <label class="text-dark">{{ __("Name 2 : ") }}<span class="text-danger"></span></label>
                            <input type="text" placeholder="{{ __('Enter Name for Number 2') }}" value="{{$vendorhome[0]->name2}}" name="name2"/>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">{{ __("Number 3 : ") }}<span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{ __('Enter Number 3') }}" name="num3" value="{{$vendorhome[0]->num3}}" />

                            <label class="text-dark">{{ __("Sign 3 : ") }}<span class="text-danger"></span></label>
                            <input type="text" placeholder="{{ __('Enter Sign for Number 3') }}" value="{{$vendorhome[0]->sign3}}" name="sign3"/>

                            <label class="text-dark">{{ __("Name 3 : ") }}<span class="text-danger"></span></label>
                            <input type="text" placeholder="{{ __('Enter Name for Number 3') }}" value="{{$vendorhome[0]->name3}}" name="name3"/>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">{{ __("Number 4 : ") }}<span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{ __('Enter Number 4') }}" name="num4" value="{{$vendorhome[0]->num4}}" />

                            <label class="text-dark">{{ __("Sign 4 : ") }}<span class="text-danger"></span></label>
                            <input type="text" placeholder="{{ __('Enter Sign for Number 4') }}"  value="{{$vendorhome[0]->sign4}}" name="sign4"/>

                            <label class="text-dark">{{ __("Name 4 : ") }}<span class="text-danger"></span></label>
                            <input type="text" placeholder="{{ __('Enter Name for Number 4') }}" value="{{$vendorhome[0]->name4}}" name="name4"/>
                        </div>
                        
                        <div class="form-group">
                            <label class="text-dark">{{ __("Footer 1 : ") }}<span
                                    class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="our_mission"
                                cols="30" rows="10">{{$vendorhome[0]->our_mission}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Footer 2 : ") }}<span class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="our_vision" cols="30"
                                rows="10">{{$vendorhome[0]->our_vision}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Footer 3 : ") }}<span class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="why_us" cols="30"
                                rows="10">{{$vendorhome[0]->why_us}}</textarea>
                        </div>
                </div>

                <div class="col-md-offset-1 col-md-10 form-group">
                    <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> {{ __("Reset")}}</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                        {{ __("Update")}}</button>
                </div>


                </form>
                <!-- main content end -->
            </div>
        </div>
    </div>
</div>



</div>
@endsection
@section('custom-script')
<script>
$('.product_type').on('change', function() {

    var type = $(this).val();

    if (type == 'd_product') {

        $('.ex_pro_link').addClass('display-none');
        $('.product_file').removeClass('display-none');
        $("input[product_file]").attr('required', 'required');
        $("input[external_product_link]").removeAttr('required', 'required');


    } else if (type == 'ex_product') {

        $('.ex_pro_link').removeClass('display-none');
        $('.product_file').addClass('display-none');
        $("input[product_file]").removeAttr('required', 'required');
        $("input[external_product_link]").attr('required', 'required');

    } else {

        $('.ex_pro_link').addClass('display-none');
        $('.product_file').addClass('display-none');
        $("input[product_file]").removeAttr('required', 'required');
        $("input[external_product_link]").removeAttr('required', 'required');
    }

});

$(".midia-toggle").midia({
    base_url: '{{url('
    ')}}',
    directory_name: 'simple_products',
    dropzone: {
        acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
    }
});

$(".file-toggle").midia({
    base_url: '{{url('
    ')}}',
    directory_name: 'product_files',
    dropzone: {
        acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
    }
});
</script>
@endsection