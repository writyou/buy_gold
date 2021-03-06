@extends('czf.base',['header'=>'帮助中心',
'css' => [
        'css/weui.min.css',
        'css/jquery-weui.css',
        'css/demos.css'
    ],
'js' => [
        'js/jquery-weui.js',
        'js/fastclick.js',
    ],
])
@section('content')
    <style>
        .weui-cell__bd{
            font-size: 14px;
        }
    </style>
    <body>
    <!--头部-->
    <div class="weui-flex" id="header_top">
        <a href="{{route('member_index')}}"><img src="{{route('home')}}/img/fh.png" alt=""></a>
        <div class="weui-flex__item">帮助中心</div>
    </div>

    <div class="weui-flex" style="padding: 0 15px">
        <div class="weui-flex__item" style="line-height: 45px">帮助中心</div>
    </div>
    <div class="weui-cells" style="margin-top: 0;">
        @foreach($newslist as $value)
        <a class="weui-cell weui-cell_access" href="{{route('article_content',$value['id'])}}">
            <div class="weui-cell__bd">
                <p>{{$value['title']}}</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
        @endforeach
    </div>

    </body>

@endsection
