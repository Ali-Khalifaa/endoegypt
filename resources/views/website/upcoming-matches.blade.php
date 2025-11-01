@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.Upcoming Matches'))

@section('body')
    @include('website.layouts.breadcrump', ['currentPage' => __('messages.Upcoming Matches'),'image' => '/upload/general/point-table.jpg'])





    <div class="match-fixtures-page sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 rs-result sec-spacer pt-0">
                    <ul class="nav nav-tabs point-menu text-center">
                        @foreach ($championShips as $key => $champion)
                        <li class="nav-item"><a class="nav-link {{$key == 0 ? 'active' : ''}}" id="tab-{{$key}}" data-toggle="tab" href="#tab{{$key}}" data-toggle="tab" role="tab" aria-controls="tab{{$key}}" aria-selected="true">
                            <img src="{{$champion->image}}" style="height:40px" class="mx-1" alt="{{$champion->current_translation->title}}"> {{$champion->current_translation->title}}</a></li>
                        @endforeach
                    </ul>

                    <div class="tab-content team-result" style="background-image: url(/upload/general/download3.jpg);background-size:cover!important">
                        <div class="overly-bg"></div>
                        @foreach ($championShips as $key => $champion)
                          <div id="tab{{$key}}" class="tab-pane fade {{$key == 0 ? 'show active' : ''}}" role="tabpanel" aria-labelledby="tab-{{$key}}">
                            <table>

                                @foreach ($champion->matches()->where('match_date','>',now())->get() as $match)
                                     <tr class="single-result">
                                        <td class="team-name team1 text-center"><img class="result-img" src="{{$match->club1->image}}"> <span>{{$match->club1->current_translation->title}} </span></td>
                                        <td class="text-center match-result"><span class="match-score">@lang('messages.VS')</span></td>
                                        <td class="team-name team2 text-center"><span>{{$match->club2->current_translation->title}}</span><img class="result-img" src="{{$match->club2->image}}"></td>
                                        <td class="match-venu text-center"><span class="match-date">{{$match->match_date->format('Y-m-d H:i')}}</span> </td>
                                        <td class="match-venu text-center"><span class="match-date">{{$match->current_translation->title}}</span></td>
                                        {{-- <td class="view-statictics text-center"><a href="result-single.html">View Statictics >></a> </td> --}}
                                    </tr>
                                @endforeach


                            </table>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="sidebar-area">

                        <div class="recent-post-area">
                            <span class="title"> @lang('messages.Latest News')</span>
                            <ul class="news-post">
                                @foreach ($latestNews as $news)
                                <li>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                            <div class="item-post">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 paddimg-right-none">
                                                        <img src="{{$news->image}}" alt="News image" style="width: 130px" title="News image">
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                        <h4><a href="/news-details/{{$news->id}}-{{$news->slug}}">{{$news->current_translation->title}}</a></h4>
                                                        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {{$news->created_at->format('F d, Y')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('website.components.brand',['brands' => $brands])


@endsection
