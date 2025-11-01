@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.Matches Results'))

@section('body')
    @include('website.layouts.breadcrump', ['currentPage' => __('messages.Matches Results'),'image' => '/upload/general/point-table.jpg'])




    <div class="rs-result sec-spacer">
        <div class="container">
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

                            @foreach ($champion->results()->latest()->get() as $result)
                                <tr class="single-result">
                                    <td class="team-name team1 text-center"><img class="result-img" src="{{$result->clubMatch->club1->image}}"> <span>{{$result->clubMatch->club1->current_translation->title}} </span></td>
                                    <td class="text-center match-result"><span class="match-score">{{$result->club1_result}} : {{$result->club2_result}}</span></td>
                                    <td class="team-name team2 text-center"><span>{{$result->clubMatch->club2->current_translation->title}}</span><img class="result-img" src="{{$result->clubMatch->club2->image}}"></td>
                                    <td class="match-venu text-center"><span class="match-date">{{$result->clubMatch->match_date->format('Y-m-d H:i')}}</span></td>
                                    <td class="match-venu text-center"><span class="match-date">{{$result->clubMatch->current_translation->title}}</span></td>
                                    {{-- <td class="view-statictics text-center"><a href="result-single.html">View Statictics >></a> </td> --}}
                                </tr>
                            @endforeach


                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('website.components.brand',['brands' => $brands])


@endsection
