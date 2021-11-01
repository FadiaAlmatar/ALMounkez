<x-layouts.app>
<x-slot name="styles">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  </x-slot>
  <x-slot name="scripts">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
           $('.ordersTable').DataTable();
       });
    </script>
  </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
               <table style="width:75%;margin:auto"class="table table-bordered ordersTable">
                <thead>
                <tr>
                    <th style="width:10%"scope="col">{{__('no. order')}}</th>
                    <th style="text-align:center"scope="col">{{__('order type')}}</th>
                    <th style="text-align:center"scope="col">{{__('order status')}}</th>
                    <th style="width:20%;text-align:center"scope="col">{{__('order date')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(Auth::User()->role == "user")
                @foreach ($myorders as $myorder)
                <tr>
                    <th style="width:10%"scope="row"><a href="{{route('fullorders.show',$myorder)}}">{{$myorder->id}}</a></th>
                    <td style="text-align:center"><a href="{{route('fullorders.show',$myorder)}}">{{$myorder->type}}</a></td>
                    @if(app()->getLocale() == 'en')
                        @if($myorder->status == "Need to complete papers")
                        <td style="text-align:center;color:red;">{{$myorder->status}} <a href="{{route('fullorders.edit',$myorder)}}"><i class="fa fa-edit"></i></a></td>
                        @else
                        <td style="text-align:center">{{$myorder->status}}</td>
                        @endif
                    @else
                        @if($myorder->status == "بحاجة لاستكمال الأوراق")
                        <td style="text-align:center;color:red;">{{$myorder->status_ar}} <a href="{{route('fullorders.edit',$myorder)}}"><i class="fa fa-edit"></i></a></td>
                        @else
                        <td style="text-align:center">{{$myorder->status_ar}}</td>
                        @endif
                    @endif
                    <td style="width:20%;text-align:center">{{ date("Y-m-d h:i A", strtotime($myorder->created_at))}}</td>
                </tr>
                @endforeach
                @else
                @foreach ($orders as $order)
                <tr>
                    <th style="width:10%"scope="row"><a href="{{route('fullorders.show',$order)}}">{{$order->id}}</a></th>
                    <td style="text-align:center"><a href="{{route('fullorders.show',$order)}}">{{$order->type}}</a></td>
                    @if(app()->getLocale() == 'en')
                    <td style="text-align:center">{{$order->status}}</td>
                    @else
                    <td style="text-align:center">{{$order->status_ar}}</td>
                    @endif
                    <td style="width:20%;text-align:center">{{ date("Y-m-d h:i A", strtotime($order->created_at))}}</td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
