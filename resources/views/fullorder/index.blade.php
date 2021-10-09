<x-layouts.app>
<table style="width:75%;margin:auto"class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">{{__('order number')}}</th>
        <th scope="col">{{__('order type')}}</th>
        <th scope="col">{{__('order status')}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($myorders as $myorder)
      <tr>
        <th scope="row">{{$myorder->id}}</th>
        <td>{{$myorder->type}}</td>
        <td>{{$myorder->status}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</x-layouts.app>
