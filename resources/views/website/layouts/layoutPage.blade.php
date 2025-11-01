<!doctype html>
<html class="no-js" lang="{{app()->getLocale()}}">
	@include('website.layouts.headStyle')
	<body class="home-two {{app()->getLocale() == 'ar' ? 'rtl' : ''}}" id="app">
        @php
            $joinUs = \App\Models\JoinUs::first();
        @endphp
        @include('website.layouts.header',['joinUs' => $joinUs])


        @yield('body')



        @include('website.layouts.footer',['joinUs' => $joinUs])

	</body>
</html>


