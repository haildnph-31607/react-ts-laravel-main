@extends('admin.layout')
@section('main')
<div class="row">
    <div class="col-xl-6 col-lg-6  col-12">
        <div class="card widget-chart-two">
            <div class="float-left">
                <div id="sparkline9" class="text-left"></div>
            </div>
            <div class="float-right widget-text">
                <p class="text-muted mb-0 mt-2">Total Revenue</p>
                <h3 class="">$555,735</h3>
            </div>

        </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-12">
        <div class="card widget-chart-two">
            <div class="float-left">
                <div id="sparkline7" class="text-left"></div>
            </div>
            <div class="float-right widget-text">
                <p class="text-muted mb-0 mt-2">Sales Analytics</p>
                <h3 class="">$97,511</h3>
            </div>

        </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-12">
        <div class="card widget-chart-two">
            <div class="float-left">
                <div id="sparkline10" class="text-left"></div>
            </div>
            <div class="float-right widget-text">
                <p class="text-muted mb-0 mt-2">Stores</p>
                <h3 class="">$345</h3>
            </div>

        </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-12">
        <div class="card widget-chart-two">
            <div class="float-left">
                <div id="sparkline1"></div>
            </div>
            <div class="float-right widget-text">
                <p class="text-muted mb-0 mt-2">costumers</p>
                <h3 class="">$55,670</h3>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <h4 class="header-title m-b-0">Extra Area Chart</h4>
            <ul class="list-inline text-center gap-items-4 mb-30">
                <li class="list-inline-item">
                    <span class="badge badge-lg badge-dot mr-1 p-0"
                        style="background-color: #b1bccb;"></span>
                    <span>Advertising</span>
                </li>
                <li class="list-inline-item">
                    <span class="badge badge-lg badge-dot mr-1 p-0"
                        style="background-color: #7377e8"></span>
                    <span>Hosting</span>
                </li>
            </ul>
            <div id="morris-area-with-dotted" style="height: 350px;" class="mt-4"></div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <h4 class="header-title m-b-0">Total Revenue</h4>
            <ul class="list-inline mb-0">
                <li class="d-flex justify-content-between mb-1">
                    <div>
                        <span class="badge badge-dot badge-lg mr-1"
                            style="background-color: #efb3e6"></span>
                        <span>Ethereum</span>
                    </div>
                    <div>953</div>
                </li>

                <li class="d-flex justify-content-between mb-1">
                    <div>
                        <span class="badge badge-dot badge-lg mr-1"
                            style="background-color: #ffdf7c"></span>
                        <span>cardano</span>
                    </div>
                    <div>813</div>
                </li>

                <li class="d-flex justify-content-between">
                    <div>
                        <span class="badge badge-dot badge-lg mr-1"
                            style="background-color: #b2def7"></span>
                        <span>Ripple</span>
                    </div>
                    <div>369</div>
                </li>
            </ul>
            <div id="morris-donut-example" style="height: 300px;" class="mt-4"></div>

        </div>
    </div>

</div>



<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <h4 class="header-title m-b-0">Wallet Balances</h4>
            <div id="morris-bar-example" style="height: 300px;" class="mt-4"></div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card">
            <h4 class="header-title m-b-0">Extra Area Chart</h4>

            <div class="table-responsive m-t-20">
                <table class="table table-hover table-centered m-0">
                    <thead>
                        <tr class="titles ">
                            <th class="f-s-17"></th>
                            <th class="f-s-17">Costumer Name</th>
                            <th class="f-s-17">Company</th>
                            <th class="f-s-17">Status</th>
                            <th class="f-s-17">Invoice</th>
                            <th class="f-s-17">Start date</th>
                            <th class="f-s-17">Amount</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td class="c-table__cell">
                                <img src="{{asset('logo/image.png')}}" alt="user"
                                    class="rounded-circle thumb-sm">
                            </td>
                            <td class="c-table__cell">
                                <h5 class="m-0 font-weight-normal">Tiger Nixon</h5>
                                <p class="mb-0 text-muted"><small>Web Designer</small></p>
                            </td>
                            <td class="c-table__cell">Accountant</td>
                            <td class="c-table__cell"><span
                                    class="badge badge-success">Paid</span></td>
                            <td class="c-table__cell">63</td>
                            <td class="c-table__cell">2011/07/25</td>
                            <td class="c-table__cell">$170,750</td>
                        </tr>

                        <tr>
                            <td class="c-table__cell">
                                <img src="{{asset('logo/image.png')}}" alt="user"
                                    class="rounded-circle thumb-sm">
                            </td>
                            <td class="c-table__cell">
                                <h5 class="m-0 font-weight-normal">Tiger Nixon</h5>
                                <p class="mb-0 text-muted"><small>Web Designer</small></p>
                            </td>
                            <td class="c-table__cell">Accountant</td>
                            <td class="c-table__cell"><span
                                    class="badge badge-success">Paid</span></td>
                            <td class="c-table__cell">63</td>
                            <td class="c-table__cell">2011/07/25</td>
                            <td class="c-table__cell">$170,750</td>
                        </tr>
                        <tr>
                            <td class="c-table__cell">
                                <img src="{{asset('logo/image.png')}}" alt="user"
                                    class="rounded-circle thumb-sm">
                            </td>
                            <td class="c-table__cell">
                                <h5 class="m-0 font-weight-normal">Tiger Nixon</h5>
                                <p class="mb-0 text-muted"><small>Web Designer</small></p>
                            </td>
                            <td class="c-table__cell">Accountant</td>
                            <td class="c-table__cell"><span
                                    class="badge badge-success">Paid</span></td>
                            <td class="c-table__cell">63</td>
                            <td class="c-table__cell">2011/07/25</td>
                            <td class="c-table__cell">$170,750</td>
                        </tr>
                        <tr>
                            <td class="c-table__cell">
                                <img src="{{asset('logo/image.png')}}" alt="user"
                                    class="rounded-circle thumb-sm">
                            </td>
                            <td class="c-table__cell">
                                <h5 class="m-0 font-weight-normal">Tiger Nixon</h5>
                                <p class="mb-0 text-muted"><small>Web Designer</small></p>
                            </td>
                            <td class="c-table__cell">Accountant</td>
                            <td class="c-table__cell"><span
                                    class="badge badge-success">Paid</span></td>
                            <td class="c-table__cell">63</td>
                            <td class="c-table__cell">2011/07/25</td>
                            <td class="c-table__cell">$170,750</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>


<div class="row">
    <div class="col-lg-4">
        <div class="card bg-success text-white">

            <div class="testimonial-widget-one p-17">
                <div class="testimonial-widget-one owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-content">
                            <img class="testimonial-author-img"
                                src="{{asset('logo/image.png')}}" alt="" />
                            <div class="testimonial-author">John</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                            </div>

                            <div class="testimonial-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation .

                            </div>
                            <div class="quote">

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <img class="testimonial-author-img"
                                src="{{asset('logo/image.png')}}" alt="" />
                            <div class="testimonial-author">Abraham</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                            </div>

                            <div class="testimonial-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation .
                            </div>
                            <div class="quote">

                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial-content">
                            <img class="testimonial-author-img"
                                src="{{asset('logo/image.png')}}" alt="" />
                            <div class="testimonial-author">TYRION LANNISTER</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                            </div>

                            <div class="testimonial-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation .
                            </div>
                            <div class="quote">

                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <h4 class="header-title m-b-0">Last Update</h4>
            <ul class="timeline-line-list">
                <li>
                    <h5>User confirmation</h5>
                    <p class="mb-0">Donec rutrum congue leo eget malesuada.</p>
                    <p class="text-muted">

                        7 months ago.
                    </p>
                </li>
                <li>
                    <h5>Continuous evaluation</h5>
                    <p class="mb-0">Vivamus suscipit tortor eget felis porttitor volutpat.</p>
                    <p class="text-muted">

                        7 months ago.
                    </p>
                </li>
                <li>
                    <h5>Promotion</h5>
                    <p class="mb-0">Curabitur non nulla sit amet nisl tempus convallis quis ac
                        lectus.</p>
                    <p class="text-muted">

                        7 months ago.
                    </p>
                </li>
            </ul>

        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <h4 class="header-title m-b-0">Recent Buyers</h4>
            <div class="recent-buyers-list">
                <div class="media media-single py-1">
                    <div class="avatar avatar-md avatar-online pr-2">
                        <img class="rounded-circle thumb-sm"
                            src="{{asset('logo/image.png')}}">
                    </div>
                    <div class="media-body">
                        <h5 class="m-0 font-weight-normal">Tiger Nixon</h5>
                        <p class="mb-0 text-muted">
                            <span class="badge badge-primary">Bitcoin</span>
                        </p>
                    </div>
                    <div class="media-right pt-1">
                        <span class="font-medium-4">$170,750</span>
                    </div>
                </div>
                <div class="media media-single py-1">
                    <div class="avatar avatar-md avatar-online pr-2">
                        <img class="rounded-circle thumb-sm"
                            src="{{asset('logo/image.png')}}">
                    </div>
                    <div class="media-body">
                        <h5 class="m-0 font-weight-normal">Tiger Nixon</h5>
                        <p class="mb-0 text-muted">
                            <span class="badge badge-danger">Bitcoin</span>
                        </p>
                    </div>
                    <div class="media-right pt-1">
                        <span class="font-medium-4">$170,750</span>
                    </div>
                </div>
                <div class="media media-single py-1">
                    <div class="avatar avatar-md avatar-online pr-2">
                        <img class="rounded-circle thumb-sm"
                            src="{{asset('logo/image.png')}}">
                    </div>
                    <div class="media-body">
                        <h5 class="m-0 font-weight-normal">Tiger Nixon</h5>
                        <p class="mb-0 text-muted">
                            <span class="badge badge-custom">Bitcoin</span>
                        </p>
                    </div>
                    <div class="media-right pt-1">
                        <span class="font-medium-4">$170,750</span>
                    </div>
                </div>
                <div class="media media-single py-1">
                    <div class="avatar avatar-md avatar-online pr-2">
                        <img class="rounded-circle thumb-sm"
                            src="{{asset('logo/image.png')}}">
                    </div>
                    <div class="media-body">
                        <h5 class="m-0 font-weight-normal">Tiger Nixon</h5>
                        <p class="mb-0 text-muted">
                            <span class="badge badge-success">Bitcoin</span>
                        </p>
                    </div>
                    <div class="media-right pt-1">
                        <span class="font-medium-4">$170,750</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
