@extends('ChangelogPackage::layout')

@section('body_id', 'changelog_index')

@section('content')
    <div id="header_holder">
        <div class="header">
            <h1>
                {{ config('app.name') }}<br/>
                change log
            </h1>
        </div>
    </div>

    <div id="changelog_holder">
        @if (Auth::user()->changelog_editable)
            <div class="button-holder">
                <a id="new_chapter_button" class="styled-button" href="{{ route('changelog.create') }}">Nieuw hoofdstuk</a>

                <div class="styled-button cancel" data-cancel-button>Annuleren</div>
            </div>
        @endif
        
        <div data-changelog-container class="changelog-container"></div>
    </div>  
@stop

@section('scripts')
    <script>
        let chapters = {!! $changelogChapters->toJson() !!}
    </script>
@stop