@extends('default.layout')
@section('content')
    @include('default.subheader', ['pageName' => $page])
    <div class="contact-page-sec sp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="form-area">
                        @include('default.form.contact_form')
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="heading1">
                        @if(!empty($fields->subtitle_contact))
                            <span class="span">
            <img src="{{ asset('images/icons/span2.png') }}" alt="">
            {{$fields->subtitle_contact}}
        </span>
                        @endif

                        @if(!empty($fields->header_contact))
                            <h2>{{$fields->header_contact}}</h2>
                        @endif

                        <div class="space16"></div>

                        @if(!empty($fields->description_contact))
                            <div class="desc">
                                {!! $fields->description_contact !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-page-box">
                        <div class="icon">
                            <img style="width: 40px;height: 40px;" src="{{ asset('images/icons/header2-top-icon2.png') }}" alt="">
                        </div>
                        <div class="heading">
                            <h5>Lokalizacja</h5>
                            @if(getConstField('company_address') && getConstField('company_post_code') && getConstField('company_city'))
                                <a href="{{getConstField('google_map')}}">
                                    {{ getConstField('company_address') }} <br>
                                    {{ getConstField('company_post_code') }} {{ getConstField('company_city') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    @if(getConstField('phone'))
                        <div class="contact-page-box">
                            <div class="icon">
                                <img src="{{ asset('images/icons/contact-page-icon2.svg') }}" alt="">
                            </div>
                            <div class="heading">
                                <h5>Telefony</h5>
                                <a href="tel:{{ str_replace(' ', '', getConstField('phone')) }}">
                                    {{ getConstField('phone') }}
                                </a></br>
                                <a href="tel:{{ str_replace(' ', '', getConstField('phone2')) }}">
                                    {{ getConstField('phone2') }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4 col-md-6">
                    @if(getConstField('email'))
                        <div class="contact-page-box">
                            <div class="icon">
                                <img src="{{ asset('images/icons/contact-page-icon3.svg') }}" alt="">
                            </div>
                            <div class="heading">
                                <h5>E-mail</h5>
                                <a href="mailto:{{ getConstField('email') }}">
                                    {{ getConstField('email') }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(getConstField('google_map_iframe'))
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-map-page">
                        <iframe src="{{ getConstField('google_map_iframe') }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
