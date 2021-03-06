@extends('layouts.app')

@section('content')

    <div id="contentrew" style="background-image:url('../public/assets/frontend/images/bg/image-3.jpg');">
        <div class="container-fluid dashboard-content" >
            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Your Current Balance:</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ __('#') }} {{ auth()->user()->balance }}</h1>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Your direct downliners:</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ $user->referal(auth()->user()) }}/2</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if($user->referal(auth()->user()) === 0)
                        <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                            <div class='alert alert-warning' role='alert'>{{ __('You have no downliners. Withdrawal link will be available when you have a total of 4 downliners') }}</div>
                        </div>
                    @else
                        <section id='price' class='section-padding'>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-12 text-center'>
                                        <div class='section-title'>
                                            <h4><b>{{ __('Your Referrals:') }}</b></h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- ====end section title===================== -->
                                <div class='row mb-10'>
                                    @foreach($downliner as $downliners)
                                        <div class='col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12'>
                                            <div class='card campaign-card text-center'>
                                                <div class='card-body'>
                                                    <div class='campaign-info'>
                                                        <h3 class='mb-1'>{{ $downliners->username }}</h3>
                                                        <p class='mb-1'>{{ __('Referrals:') }}<span class='text-dark font-medium ml-2'>{{ $user->indownliner($downliners->id) }}</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach($indownliner as $indownliners)
                                            <div class='row'>
                                                <div class='col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12'>
                                                    <div class='card campaign-card text-center'>
                                                        <div class='card-body'>
                                                            <div class='campaign-info'>
                                                                <h3 class='mb-1'>{{ $indownliners->username }}</h3>
                                                                <p class='mb-1'>{{ __('Referrals:') }}<span class='text-dark font-medium ml-2'>{{ $user->indownliner($indownliners->id) }}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p> &nbsp; </p>
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="justify-content-center align-items-center text-center">
                                @if( $user->referal(auth()->user()) < 2)
                                    <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center'>
                                        <div class='alert alert-danger' role='alert'>
                                            <h5>{{ __('You have not reached the minimum requirements of total referrals needed for withdrawal. ') }}<br> {{ __('Withdrawal link will be available when each of your downliner has at least 1 referral.') }} </h5>
                                            <p>{{ __('Downliner referrals: ') }} {{ $user->referal(auth()->user()) }}</p>
                                            <p>{{ __('Total Indirect Downliner referrals: ') }} {{ $user->indirectref(auth()->user()) }}</p>
                                            <p>{{ __('Eligible Indirect Downliner referrals: ') }} {{ $user->indirectref(auth()->user()) }}</p>
                                            <p>{{ __('Total Downliner referrals: ') }} {{ $user->referal(auth()->user()) }}</p>
                                            <h5>{{ __('A total of 2 indirect downliner is required.') }}</h5>
                                            <p> &nbsp; </p>
                                        </div>
                                    </div>
                                @else
                                    <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                        <div class='alert alert-success' role='alert'>
                                            <a href='#'>{{ __('Click here') }}</a>{{ __(' to request withdrawal') }}
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                        </section>
                    @endif
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="section-title">
                                <h5><b>{{ __('Disclaimer:') }} </b> {{ __('Networking involves risk. Only risk capital you are prepared to loose. However with the knowledge you will acquire is worth more than your sign up capital.') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
