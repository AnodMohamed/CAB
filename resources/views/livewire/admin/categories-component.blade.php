<main id="main" class="main-site" style="padding: 100px 0px;">

    <div class="container">
       <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Manage Categories </span></li>
  
           </ul>
        </div>
    </div>
    <div class="container">
        <div class="panel-body">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th class="">Category Name</th>
                        <th class="">Slug</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td >{{$category->id}}</td>
                            <td >{{$category->name}}</td>
                            <td >{{$category->slug}}</td>
                            <td >
                                <a class="btn btn-success" href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}">
                                    Edit
                                </a>

                                <a herf="" class="btn btn-danger" onclick="confirm('Are you sure, You want to delete {{$category->name}} category') || event.stopImmediatePropagation()"  wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left:10px "> 
                                   Delete
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links()}}

            <div class="col-md-12">
                <a href="{{route('admin.addcategory')}}" class="btn  pull-right"  style="background-color: #7463b3 ; color:#fff">Add category</a>
            </div>
  
        </div>
    </div>
  </main>
  