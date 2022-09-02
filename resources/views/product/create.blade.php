@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

<style>
    .progress { position:relative; width:100%; }
    .bar { background-color: #b5076f; width:0%; height:20px; }
    .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <br>
            <div class="card">
                <div class="card-header">
                    <h2>Add Product</h2>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-error" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                

                        <div class="form-group">
                            <label for="name_product">Name Product</label>
                            <input type="text" class="form-control @error('name_product') is-invalid @enderror"
                                name="name_product" value="{{ old('name_product') }}" required>

                            <!-- error message untuk name -->
                            @error('name_product')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <br>
                     
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" rows="40" cols="40" class="form-control tinymce-editor"></textarea>
                        </div>  
                          <!-- error message untuk description -->
                          @error('description')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        <br>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                            <!-- error message untuk price -->
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Category Product</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option value=""></option>
                                @foreach ($categories as $value)
                                    <option value={{$value->id}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                               <!-- error message untuk price -->
                               @error('category_id')
                               <div class="invalid-feedback">
                                   {{ $message }}
                               </div>
                               @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br/>
                            <div class="progress">
                                <div class="bar"></div >
                                <div class="percent">0%</div >
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <a href="{{ route('category.index') }}" class="btn btn-md btn-secondary">back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 250,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>
<script>
    $(document).ready(function () {
        $("#category_id").select2({
            placeholder: "Please Select"
        });
    });
</script>
<script type="text/javascript">
 
    var SITEURL = "{{URL('/')}}";
 
    $(function() {
         $(document).ready(function()
         {
            var bar = $('.bar');
            var percent = $('.percent');
 
      $('form').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            if(xhr.success){
                alert('Upload Product Has Success');
                window.location.href = SITEURL +"/"+"home";
            }else{
                alert('Ops Something Wrong'); 
            }
        }
      });
   }); 
 });
</script>
@endsection

