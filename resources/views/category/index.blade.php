@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <br>
            <div class="card">
                    <div class="card-header">
                        <h2>Data Category</h2>
                    </div>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <div class="row">
                            <div class="col" style="text-align: right;margin-bottom: 10px;">
                                <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Create At</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($_GET['page'])){
                                        $no = (($_GET['page'] * 5) + 1) - 5;
                                    }else{
                                        $no = 1;
                                    }
                                ?>
                                @foreach ($category as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->name}}</td>
                                    <td>{{ $value->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('category.destroy', $value->id) }}" method="POST">
                                            <a href="{{ route('category.edit', $value->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $category->links() }}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
