<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if(!empty($cart))
        
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="3">Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($cart as $item)
                              
                                <tr>
                                    <td>{{$item['product_id']}}</td>
                                    <td>image</td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['quantity']}}</td>
                                    <td>{{$item['price'] * $item['quantity']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            @else
                <h5>Cart is empty</h5>
            @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue shopping</button>
          <a  class="btn btn-primary" href="/chout">Chekout</a>
        </div>
      </div>
    </div>
  </div>
