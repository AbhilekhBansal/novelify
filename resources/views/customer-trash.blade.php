<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .aln button{
            float: right;
            color: white;
            background: blue;
            border: none;
        }
        .btnD{
            background: #f72424;
            color:black;
            color: snow;
            padding: 5px;
            padding-left: 8px;
            padding-right: 8px;
            border: none;
        }
        .btnE{
            background: #47cd47;
            color:black;
            color: snow;
            padding: 5px;
            padding-right: 8px;
            padding-left: 8px;
            border: none;
        }
        .nav{
            padding: 20px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="row nav">
            
                <div class="col"><h2>HOME</h2></div>
                <div class="col aln"><a href="{{url('/customer-view')}}"><button class="btn btn-success">Customer View</button></a></div>
            
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td><img src="images/{{$customer->image}}" width="80px"></td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->address}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="{{route('customer.forcedelete',['id'=>$customer->id])}}"><button class="btnD">Delete </button></a>
                            </div>
                            <div class="col">
                                <a href="{{route('customer.restore',['id'=>$customer->id])}}"><button class="btnE">Restore </button></a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>