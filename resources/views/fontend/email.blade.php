
	<link rel="stylesheet" href="css/email.css">

					<div id="wrap-inner">
						<div id="khach-hang">
							<h3>Thông tin khách hàng</h3>
							<p>
								<span class="info">Khách hàng: </span>
                                {{$info['ho_ten']}}
							</p>
							<p>
								<span class="info">Email: </span>
                                {{$info['email']}}
							</p>
							<p>
								<span class="info">Điện thoại: </span>
                                {{$info['phone']}}
							</p>
							<p>
								<span class="info">Địa chỉ: </span>
                                {{$info['address']}}
							</p>
						</div>
						<div id="hoa-don">
							<h3>Hóa đơn mua hàng</h3>
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable"  >
                                <thead>
                                <tr role="row">
                                    <th>
                                        Tên sản phẩm
                                    </th>
                                    <th>
                                        Giá
                                    </th>
                                    <th>
                                        Số lượng
                                    </th>
                                    <th>
                                        Thành tiền
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td class="price">{{number_format($item->price,0,',','.')}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td class="price">{{$item->qty*$item->price}} VNĐ</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">Tổng tiền:</td>
                                        <td class="total-price">{{$total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Tổng tiền:</td>
                                        <td class="total-price">{{$total}}</td>
                                    </tr>

                                </tbody>
                            </table>
						</div>
						<div id="xac-nhan">
							<br>
							<p align="justify">
								<b>Quý khách đã đặt hàng thành công!</b><br />
								• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
								• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
								<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
							</p>
						</div>
					</div>
    @endforeach
