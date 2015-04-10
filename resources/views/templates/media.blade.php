@extends('layouts.master')

@section('extend_styles')
    <link href="/packages/colorbox/colorbox.css" rel="stylesheet">
    <link href="/packages/barryvdh/elfinder/css/elfinder.min.css" rel="stylesheet">
    <link href="/packages/barryvdh/elfinder/css/theme.css" rel="stylesheet">
@endsection

@section('extend_scripts')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/packages/colorbox/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="/packages/barryvdh/elfinder/js/elfinder.min.js"></script>
    <script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>
@endsection

@section('content')
    <label for="feature_image">Feature Image</label>
    <input type="text" id="feature_image" name="feature_image" value=""/>
    <a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>
@endsection