@extends('admin.layouts.master-soyuz')
@section('title',__('Edit About Page for Startup | '))
@section('body')
@component('admin.component.breadcumb',['thirdactive' => 'active'])

@slot('heading')
{{ __('Edit About Page For Startup') }}
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
                    <h5 class="box-title">{{ __('Edit About Page') }}</h5>
                </div>
                <div class="card-body ml-2">
                    <!-- main content start -->
                    <form action="{{ URL::to('/admin/about/save/'.$vendorstory[0]->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">
                                        Product Store : <span class="text-danger">*</span>
                                    </label>
                                    <select data-placeholder="{{ __("Please select store") }}" 
                                        name="store_id" class="form-control select2">

                                        <option value="">{{ __("Please select store") }}</option>

                                        @foreach($stores as $store)
                                        <optgroup label="Store Owner • {{ $store->user->name }}">
                                            <option {{ $vendorstory[0]->store_id == $store->id ? "selected" : "" }}
                                                value="{{ $store->id }}">
                                                {{ $store->name }}</option>
                                        </optgroup>
                                        @endforeach


                                    </select>
                                </div>
                            </div>

                            
                                <div class="form-group">
                                     <label class="text-dark">{{ __("Quote : ") }}<span
                                        class="text-danger">*</span></label>
                                <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="quote"
                                    id="quote" cols="30" rows="10">{{$vendorstory[0]->quote}}</textarea>

                                   
                                </div>

                                <div class="form-group">
                                    <label class="text-dark">{{ __("word 1 : ") }}<span
                                        class="text-danger">*</span></label>
                               <input type="text" name="word1" id="word1" value="{{$vendorstory[0]->w1}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __("word 2 : ") }}<span
                                        class="text-danger">*</span></label>
                               <input type="text" name="word2" id="word2" value="{{$vendorstory[0]->w2}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __("word 3 : ") }}<span
                                        class="text-danger">*</span></label>
                               <input type="text" name="word3" id="word3" value="{{$vendorstory[0]->w3}}" class="form-control">
                                </div>
                            
                            <div class="form-group">
                                <label class="text-dark">{{ __("Content1 : ") }}<span
                                        class="text-danger">*</span></label>
                                <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="content1"
                                    id="editor1" cols="30" rows="10">{{$vendorstory[0]->content1}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">{{ __("Image1 : ") }}<span class="text-danger"></span></label>
                                <input type="file" class="form-control-file" id="image1" name="image1">
                            </div>
                           
                          


                        </div>


                        <div class="form-group">
                            <label class="text-dark">{{ __("Content2 : ") }}<span class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="content2" cols="30"
                                rows="10">{{$vendorstory[0]->content2}}</textarea>
                        </div>
                         <div class="form-group">
                                <label class="text-dark">{{ __("Image2 : ") }}<span class="text-danger"></span></label>
                                <input type="file" class="form-control-file" id="image2" name="image2">
                            </div>
                        

                        <div class="form-group">
                            <label class="text-dark">{{ __("content 3 : ") }}<span class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="content3" cols="30"
                                rows="10">{{$vendorstory[0]->content3}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Meeting : ") }}<span
                                    class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="meeting"
                                cols="30" rows="10">{{$vendorstory[0]->meeting}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Executive : ") }}<span class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="executive" cols="30"
                                rows="10">{{$vendorstory[0]->execute}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Delivery : ") }}<span class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="delivery" cols="30"
                                rows="10">{{$vendorstory[0]->delivery}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("About Team : ") }}<span class="text-danger">*</span></label>
                            <textarea placeholder="{{ __("Enter Content") }}" class="editor" name="meet" cols="30"
                                rows="10">{{$vendorstory[0]->meet}}</textarea>
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