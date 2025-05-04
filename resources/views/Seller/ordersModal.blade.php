  <!-- Process Order Modal --> <!-- note: dapat nasa laog kang loop para kuwa na so id-->
                        <div class="modal fade" id="ordersmodal{{$order->id}}" tabindex="-1" aria-labelledby="ordersmodal{{$order->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title w-full" id="ordersmodal{{$order->id}}">Manage Order</h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body px-4 py-2">
                                        <h6 class="mb-3 font-semibold">Order details:</h6>

                                        <div>
                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><span>order id:</span></div>
                                                <div class="text-right"><span>{{ $order->id }}</span></div>
                                            </div>
                                                
                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><span>Artwork title:</span></div>
                                                <div class="text-right">
                                                    <span>
                                                        @foreach($order->items as $item)
                                                            {{ $item->artwork->artwork_title ?? 'Untitled' }}<br>
                                                        @endforeach
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><span>Total amount:</span></div>
                                                <div class="text-right"><span>₱{{ $order->total_amount }}</span></div>
                                            </div>

                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><span>Delivery method:</span></div>
                                                <div class="text-right"><span>{{ $order->delivery_method }}</span></div>
                                            </div>
                                            
                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><span>Payment method:</span></div>
                                                <div class="text-right"><span>{{ $order->payment->payment_method }}</span></div>
                                            </div>
                                                  @if($order->status_id === 1 || $order->status_id === 2 || $order->status_id === 3)
                                                    <div class="flex justify-between items-center"><div class="text-left"><p>Status:</p></div><div class="text-right text-gray-800"><p>{{ $order->status->status_name }}</p></div></div>
                                                  @elseif($order->status_id === 4)
                                                    <div class="flex justify-between items-center"><div class="text-left"><p>Status:</p></div><div class="text-right text-green-800"><p>{{ $order->status->status_name }}</p></div></div>
                                                    <div class="flex justify-between items-center"><div class="text-left"><p>Prof of Payment:</p></div><div class="text-right"><p>{{ $order->payment->reference_no ?? 'N/A' }}</p></div></div>
                                                  @else
                                                    <div class="flex justify-between items-center"><div class="text-left"><p>Status:</p></div><div class="text-right text-red-800"><p>{{ $order->status->status_name }}</p></div></div>
                                                  @endif
                                                  <div class="flex justify-between items-center"><div class="text-left"><p>Order date:</p></div><div class="text-right"><p>{{ $order->ordered_at }}</p></div></div>         
                                              </div>
                                          </div>

                                    <div class="modal-footer justify-center">
                                        @if($order->status_id === 1)
                                            <form method="POST" action="{{route('order.update', $order->id)}}"> {{-- change status 1 to 2 or 3 depends if the delivery method is self pickup or request delivery --}}
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status_id" value="{{$order->delivery_method === 'self pickup' ? 2 : 3 }}">
                                                <button type="submit" class="btn btn-success px-4">Confirm Order</button>
                                            </form>

                                            <form method="POST" action="{{route('order.update', $order->id)}}"> {{-- Cancel order--}}
                                                @csrf
                                                @method('PATCH')
                                                  <input type="hidden" name="status_id" value="5"> 
                                                  <button type="sumbit" class="btn btn-secondary px-4" >Cancel Order</button>
                                            </form>

                                        @elseif($order->status_id === 2 || $order->status_id === 3)
                                            <form method="POST" action="{{route('order.update', $order->id)}}"> {{-- change status 2 or 3 to 4 (completed)--}}
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status_id" value="4"> 
                                                <button  class="btn btn-success px-4">Complete Order</button>
                                            </form>

                                            <form method="POST" >
                                                @csrf
                                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>