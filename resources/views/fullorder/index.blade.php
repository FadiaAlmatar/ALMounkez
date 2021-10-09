<x-layouts.app>
<table style="width:75%;margin:auto"class="table table-bordered">
    <thead>
      <tr>
        <th style="width:10%"scope="col">{{__('no. order')}}</th>
        <th style="text-align:center"scope="col">{{__('order type')}}</th>
        <th style="text-align:center"scope="col">{{__('order status')}}</th>
        <th style="width:20%;text-align:center"scope="col">{{__('order date')}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($myorders as $myorder)
      <tr>
        <th style="width:10%"scope="row"><a href="{{route('fullorders.show',$myorder)}}">{{$myorder->id}}</a></th>
        <td style="text-align:center"><a href="{{route('fullorders.show',$myorder)}}">{{$myorder->type}}</a></td>
        <td style="text-align:center">{{$myorder->status}}</td>
        <td style="width:20%;text-align:center">{{$myorder->created_at}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</x-layouts.app>