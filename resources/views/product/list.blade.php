<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Message  --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- ./Message  --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- table  --}}
                    <span style="margin-left: 9px;">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">Create</button>
                    </span>
                    <div class="table w-full p-2">
                        <table class="w-full border">
                            <thead>
                                <tr class="bg-gray-50 border-b">
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            ID
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Image
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Title
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Description
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Price
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                    
                                    <td class="p-2 border-r">{{ $item->id }}</td>
                                    <td class="p-2 border-r"><img src="/image/{{ $item->image }}" width="44px"></td>
                                    <td class="p-2 border-r">{{ $item->title }}</td>
                                    <td class="p-2 border-r">{{ $item->description }}</td>
                                    <td class="p-2 border-r">{{ $item->price }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#show-{{ $item->id }}">Show</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $item->id }}">Delete</button>
                                    </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   {{-- table  --}}
                   {{ $products }}
                </div>
            </div>
        </div>
    </div>

    {{-- Create  --}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description</label>
                        <textarea type="text" class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Image</label>
                        <input type="file" name="image">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    {{-- ./Create  --}}

    {{-- edit  --}}
    @foreach ($products as $item)
    <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productupdate', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $item->title }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description</label>
                        <textarea type="text" class="form-control" name="description">{{ $item->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $item->price }}">
                    </div>
                    <div class="form-group">
                        <img src="/image/{{ $item->image }}" width="82px">
                        <label for="formGroupExampleInput">Image</label>
                        <input type="file" name="image">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- ./edit  --}}

    {{-- show  --}}
    @foreach ($products as $item)
    <div class="modal fade" id="show-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $item->title }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description</label>
                        <textarea type="text" class="form-control" name="description" readonly>{{ $item->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $item->price }}" readonly>
                    </div>
                    <div class="form-group">
                        <img src="/image/{{ $item->image }}" width="82px">
                    </div>
                
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- ./show  --}}

    {{-- delete  --}}
    @foreach ($products as $item)
    <div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productDelete', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <p>Are you sure? You want to delete this product?</p>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- ./delete  --}}

</x-app-layout>