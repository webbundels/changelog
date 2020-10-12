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
                <input class="styled-button save" data-save-button type="submit" value="Opslaan">
            </div>
        @endif

        <div id="table_of_contents">

        </div>
    </div>  
@stop

@section('scripts')
    <script>
        let chapters = {!! $changelogChapters->toJson() !!}
    </script>
@stop