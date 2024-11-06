@extends('front.fixe')
@section('titre',"Contactez-nous")
@section('body')
    <div class="page-title page-title-style-02 bkg-img09">
        <div class="pt-mask-light"></div>

        <!-- .container start -->
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <!-- .pt-heading start -->
                    <div class="pt-heading">
                        <h1>Contactez-nous</h1>
                    </div><!-- .pt-heading end -->
                </div><!-- .col-md-6 end -->

                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <!-- breadcrumbs start -->
                    <div class="breadcrumb-container clearfix">
                        <ul class="breadcrumb">
                            <li>Vous êtes ici : </li>

                            <li>
                                <a href="{{ route('home') }}">Accueil</a>
                            </li>

                            <li>
                                <span class="active">Contactez-nous</span>
                            </li>
                        </ul><!-- .breadcrumb end -->
                    </div><!-- .breadcrumb-container end -->
                </div><!-- .col-md-6 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-title-style-01 end -->

    <!-- .page-conent start -->
    <div class="page-content">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">

                <!-- .col-md-4 start -->
                <div class="col-md-4 col-sm-4">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Headquarters</h3>
                    </div><!-- .custom-heading-03 end -->

                    <ul class="fa-ul default">
                        <li>
                            <i class="lynny-home"></i>
                            <p>
                                Consulting Press <br />
                                7791 Woodland Avenue <br />
                                10 000 Zagreb, Croatia
                            </p>
                        </li>
                    </ul><!-- .fa-ul.default end -->
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4 col-sm-4">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Contact Details</h3>
                    </div><!-- .custom-heading-03 end -->

                    <ul class="fa-ul default">
                        <li>
                            <i class="lynny-phone-1"></i>
                            <p>
                                +00 385 01 258 7856
                            </p>
                        </li>

                        <li>
                            <i class="lynny-mail-duplicate"></i>
                            <p>
                                <a href="mailto:info@consultingpress.com">info@consultingpress.com</a>
                            </p>
                        </li>
                    </ul><!-- .fa-ul.default end -->
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4 col-sm-4">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Working Hours</h3>
                    </div><!-- .custom-heading-03 end -->

                    <ul class="fa-ul default">
                        <li>
                            <i class="fa fa-clock-o"></i>
                            <p>
                                Mon - Fri: 08am - 04pm
                            </p>
                        </li>

                        <li>
                            <i class="fa fa-clock-o"></i>
                            <p>
                                SAT - SUN Closed
                            </p>
                        </li>
                    </ul><!-- .fa-ul.default end -->
                </div><!-- .col-md-4 end -->
            </div><!-- .row end -->

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-8 start -->
                <div class="col-md-8">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Contact us</h3>
                    </div><!-- .custom-heading-03 end -->

                    <form class="wpcf7 wpcf7-contact-us clearfix">
                        <input type="text" class="wpcf7-text" id="contact-name" placeholder="Name (required)">
                        <input type="email" class="wpcf7-email" id="contact-email" placeholder="Email (required)">
                        <input type="text" class="wpcf7-text" id="contact-phone" placeholder="Phone ">
                        <input type="text" class="wpcf7-text" id="contact-subject" placeholder="Subject (required)">
                        <textarea rows="8" class="wpcf7-textarea" id="contact-message" placeholder="Message (required)"></textarea>
                        <div class="g-recaptcha" data-sitekey="6Ld4VykTAAAAAM_qltIuTg7I0hpcdHjX7j68qpRz"></div>
                        <input type="submit" value="submit" class="wpcf7-submit">
                    </form><!-- .wpcf7.clearfix end -->
                </div><!-- .col-md-8 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Key Contacts</h3>
                    </div><!-- .custom-heading-03 end -->

                    <div class="key-contacts">
                        <ul class="clearfix">
                            <li>
                                <img src="/front/img/pics/team01.jpg"
                                    alt="ConsultingPress Management Consulting HTML Template Key Contacts">

                                <div class="text-container">
                                    <div class="contacts-title">
                                        <h4>Joshua Turner</h4>
                                        <span class="position">Management Consultant</span>
                                    </div>

                                    <ul class="fa-ul default clearfix">
                                        <li>
                                            <i class="lynny-phone-1"></i>
                                            <p>
                                                +00 385 01 258 7856
                                            </p>
                                        </li>

                                        <li>
                                            <i class="lynny-mail-duplicate"></i>
                                            <p>
                                                <a href="mailto:joshua@consulting.com">joshua@consulting.com</a>
                                            </p>
                                        </li>
                                    </ul>
                                </div><!-- .text-container end -->
                            </li>

                            <li>
                                <img src="/front/img/pics/team03.jpg"
                                    alt="ConsultingPress Management Consulting HTML Template Key Contacts">

                                <div class="text-container">
                                    <div class="contacts-title">
                                        <h4>Ashley Valdez</h4>
                                        <span class="position">Tax Consultant</span>
                                    </div>

                                    <ul class="fa-ul default clearfix">
                                        <li>
                                            <i class="lynny-phone-1"></i>
                                            <p>
                                                +00 385 01 258 7856
                                            </p>
                                        </li>

                                        <li>
                                            <i class="lynny-mail-duplicate"></i>
                                            <p>
                                                <a href="mailto:ashley@consulting.com">ashley@consulting.com</a>
                                            </p>
                                        </li>
                                    </ul>
                                </div><!-- .text-container end -->
                            </li>
                        </ul>
                    </div><!-- .key-contact end -->
                </div><!-- .col-md-4 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

    <!-- .page-conent start -->
    <div class="page-content">

        <!-- .container start -->
        <div class="container-fluid">

            <!-- .row start -->
            <div class="row mb-0">
                <!-- .col-md-12 start -->
                <div class="col-md-12">
                    <div id="map" class="map-height-lg"></div>
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
@endsection
