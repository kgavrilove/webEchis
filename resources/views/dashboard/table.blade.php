@include('main.header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/table.js') }}"></script>
<table id="example" class="display" style="width:100%">
    <thead>

    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Author</th>
        <th>Updated</th>
        <th>Created</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Update</th>
        <th>Info</th>
    </tr>

    </thead>
    <tbody>
    @foreach ($data as $row)
    <tr>
        <td> {{$row['asset']['id']}}</td>

        <td>
            <a href="{{route('asset', ['assetId' => $row['asset']['id']])}}">
               <img style="width: 100px; height: 100px; object-fit: cover; " src="{{url('storage/'.$row['image'][0]['path'])}}"  alt="{{$row['asset']['name']}}">
            </a>
        </td>

        <td>{{$row['asset']['name']}}</td>
        <td>{{$row['asset']['author']}}</td>
        <td>{{$row['asset']['created_at']}}</td>
        <td>{{$row['asset']['updated_at']}}</td>
        <td><a href="{{route('edit', ['assetId' => $row['asset']['id']])}}"><button type="button" class="btn btn-dark">Edit</button></a></td>
        <td><a href="{{route('delete', ['assetId' => $row['asset']['id']])}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
        <td><a href=" "><button type="button" class="btn btn-warning">Update</button></a></td>
        <td><a href="{{route('colors', ['assetId' => $row['asset']['id']])}}"><button type="button" class="btn btn-dark">Get Colors</button></a></td>

    </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Author</th>
        <th>Updated</th>
        <th>Created</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>
    </tfoot>
</table>

@include('main.footer')
