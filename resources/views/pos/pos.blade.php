@extends('layout.app')
@section('page_title')
    Point Of Sales
@endsection

@section('page_content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-9">
                    @include('pos.search')
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="customer" class="form-control py-1"
                            placeholder="Enter customer name or phone number">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-3  all_content ">
                <div class="card-body p-3 ">
                    <form>
                        <div class="d-flex justify-content-between " style="font-weight: 600">
                            <div class="w-5">
                                <span>item #</span>
                            </div>
                            <div class="w-lg-50 w-sm-30 text-start">
                                <span>Item Name</span>
                            </div>
                            <div class="w-5 text-end">
                                <span>Avail Qty</span>
                            </div>
                            <div class="w-5 d-flex  " style="width: 150px">
                                <span class="me-5" >Qty</span>
                                <span>Price</span>
                            </div>
                            <div class="w-5 ">
                                <span class="text-start" >Ext Price</span>
                            </div>
                            <div class="w-5">

                            </div>
                        </div>

                        <div>
                            <div class="cart_list">

                            </div>

                        </div>

                        {{-- <div class=" d-flex justify-content-end">
                            <div class="me-2">
                                <label for="">Advance</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₦</span>
                                    </div>
                                    <input type="number" class="form-control " id="advance" style="width: 150px;">
                                </div>
                            </div>
                            <div class="me-2">
                                <label for="">Balance</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₦</span>
                                    </div>
                                    <input type="number" class="form-control " id="balance" readonly
                                        style="width: 150px;">
                                </div>
                            </div>
                            <div>
                                <label for="">Bill To:</label>
                                <select name="" id="user_id" class="form-control" style="width: 200px;">
                                    <option value="1">Customer</option>
                                </select>

                            </div>
                        </div> --}}
                        <div class="d-flex mt-2 justify-content-end ">
                            <div class=" ">
                                <button class="btn checkout btn-primary py-1">Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {
            function trno() {
                return Math.floor(Math.random() * 10000000000000000);
            }

            const money_format = (num) => {
                var numb = new Intl.NumberFormat();
                return '₦ ' + numb.format(num);
            }

            trno = `<?= $_GET['trno'] ?>`;

            function getItems() {
                items = (localStorage.getItem(trno) == null) ? [] : JSON.parse(localStorage.getItem(trno));
                return items;
            }

            function setItem(trno, items) {
                localStorage.setItem(trno, JSON.stringify(items));
            }

            function displayCart() {
                items = getItems();
                card = $('.cart_list');
                card.html(``);

                if (items == null || items.length == 0) {
                    $('.all_content').hide();
                    return;
                }
                $('.all_content').show();

                cart_total = 0;

                items.map((item, index) => {
                    console.log(item);

                    total = parseInt(item.qty) * parseInt(item.price);
                    cart_total += parseInt(total)

                    card.append(`
                        <div class="d-flex justify-content-between py-2">
                            <div class="w-5">
                                <span># ${item.uuid} </span>
                            </div>
                            <div class="w-lg-50 w-md-30 text-start">
                                <span class="fw-bold" >${item.name}</span>
                            </div>
                            <div class="w-5 text-end">
                                    <span>0</span>
                            </div>
                            <div class="w-5 d-flex  " style="width: 150px">
                                <input type="number" class="cart_qty form-control px-2 me-2 p-0" min="1" value="${item.qty}" data-index=${item.uuid} style="width:50%">
                                <input type="number" class="cart_price form-control px-2 p-0" min="1" value="${item.price}" data-index=${item.uuid} style="width:50%">
                            </div>
                            <div class="w-10">
                                    <div class="d-flex justify-content-end" >
                                    <span>${money_format(total)}</span>    
                                </div>
                            </div>
                            <div class="w-5">
                                <a href="javascript:;" class="remove_item mt-1 fw-bold text-danger" data-uuid=${item.uuid} >
                                    <i class="fe fe-minus-circle"></i>
                                </a> 
                            </div>
                        </div>
                    `)
                })

                card.append(`
                    <div class="text-end me-5" >
                        <span> Sub total</span> 
                            <h5 class="fw-bold fs-3 cart_total mb-0" data-cart-total='${cart_total}' >${money_format(cart_total)}</h5>
                    </div>
                `)

            }


            displayCart();

            $('body').on('click', '.remove_item', function() {
                uuid = $(this).data('uuid');
                items = getItems();
                const index = items.findIndex(object => {
                    return object.uuid == uuid;
                });
                items.splice(index, 1);
                setItem(trno, items);
                displayCart()
            })


            var timeout = null;

            $('body').on('change', '.cart_qty', function() {
                clearTimeout(timeout);
                val = parseInt($(this).val());
                if (val == "" || isNaN(val)) {
                    console.log('In valid number');
                    return;
                }
                uuid = $(this).data('index')
                items = getItems();
                const index = items.findIndex(object => {
                    return object.uuid == uuid;
                });
                items[index].qty = val
                console.log(uuid, index);
                setItem(trno, items);
                displayCart()
            })

            $('body').on('change', '.cart_price', function() {
                val = $(this).val();
                uuid = $(this).data('index')
                items = getItems();
                const index = items.findIndex(object => {
                    return object.uuid == uuid;
                });
                items[index].price = val
                console.log(uuid, index);
                setItem(trno, items);
                displayCart()
            })

            $('#advance').on('keyup', function() {
                tot = $('.cart_total').data('cart-total')
                adv = $(this).val()
                $('#balance').val(tot - parseInt(adv))
            })

            $('.checkout').on('click', function(e) {
                e.preventDefault();
                console.log(trno);
                user = $('#customer').val();
                advance = $('#advance').val();

                if(!user) {
                    user = 09000000000
                }

                btn = $(this);

                $.ajax({
                    method: 'post',
                    url: '/make_slaes',
                    data: {
                        '_token': `{{ csrf_token() }}`,
                        items: getItems(),
                        customer_phone: user,
                        sales_id: trno,
                        advance: advance
                    },
                    beforeSend: () => {
                        btn.html(`
                         <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Checking Out...  
                    `)
                    }
                }).done(function(res) {
                    localStorage.removeItem(trno)

                    Toastify({
                        text: `${res.message}`,
                        className: "info",
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        }
                    }).showToast();

                    btn.html(`Checkout`);
                    $('.all_content').hide();
                    $('#customer').val('');

                    // var strWindowFeatures =
                    //     "location=yes,height=570,width=520,scrollbars=yes,status=yes";
                    // loc = location.href
                    // loc = loc.replace('/pos/index', `/pos/receipt.php?sales=${res.sales_id}`);
                    // var URL = loc;
                    // var win = window.open(URL, "_blank", strWindowFeatures);
                    // window.open(URL, '_blank').focus();
                    // printPage(URL)

                    // setTimeout(() => {
                    //     location.reload();
                    // }, 3000);

                }).fail(function(res) {
                    console.log(res);
                    btn.html(`Checkout`)

                })

            })


            $(document).on('click', '.search_item', function() {
                console.log(this);
                item = $(this).data('data');
                cart = (localStorage.getItem(trno) == null) ? [] : JSON.parse(localStorage.getItem(trno));
                arr = {
                    uuid: Math.floor(Math.random() * 1000),
                    id: item.id,
                    name: item.name,
                    price: item.price,
                    qty: 1
                }
                cart.push(arr);
                $('.sbox').hide();
                $('#search').val(``);
                localStorage.setItem(trno, JSON.stringify(cart));
                displayCart();
            });

        })
    </script>
@endpush
