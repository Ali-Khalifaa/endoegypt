<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('website.layouts.headStyle')

<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}" >
    <div class="main-page-wrapper">

       @php
            $joinUs = \App\Models\JoinUs::first();
        @endphp

         @include('website.layouts.header', ['joinUs' => $joinUs])

        @yield('body')

        @include('website.layouts.footer', ['joinUs' => $joinUs])

    </div>


    <!-- Scroll Top Button -->
    <button class="scroll-top tran7s p-color-bg">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </button>

    <!-- pre loader  -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>


</body>

</html>
