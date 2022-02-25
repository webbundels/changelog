<?php

namespace Webbundels\Changelog\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Routing\Controller;
use Webbundels\Changelog\Models\ChangelogChapter;
use Webbundels\Changelog\Http\Requests\EditChangelogRequest;
use Webbundels\Changelog\Http\Requests\ViewChangelogRequest;
use Webbundels\Changelog\Http\Requests\StoreChangelogRequest;
use Webbundels\Changelog\Http\Requests\CreateChangelogRequest;
use Webbundels\Changelog\Http\Requests\DeleteChangelogRequest;
use Webbundels\Changelog\Http\Requests\UpdateChangelogRequest;

class ChangelogController extends Controller
{
    public function index(ViewChangelogRequest $request)
    {
        $changelogChapters = ChangelogChapter::orderByDesc('created_at')->get();

        return view('ChangelogPackage::index', compact('changelogChapters'));
    }

    public function create(CreateChangelogRequest $request)
    {
        $titles = ChangelogChapter::pluck('title');
        $changelogChapter = new ChangelogChapter;

        return view('ChangelogPackage::edit', compact('changelogChapter', 'titles'));
    }

    public function store(StoreChangelogRequest $request)
    {
        $changelogChapter = new ChangelogChapter();
        $changelogChapter->fill($request->all());
        $changelogChapter->save();

        return redirect()
            ->route('changelog.index');
    }

    public function edit(EditChangelogRequest $request, $id)
    {
        $changelogChapter = ChangelogChapter::find($id);
        $titles = ChangelogChapter::pluck('title');

        return view('ChangelogPackage::edit', compact('changelogChapter', 'titles'));
    }

    public function update(UpdateChangelogRequest $request, $id)
    {
        ChangelogChapter::where('id', $id)->update(Arr::except($request->all(), ['_token']));

        return redirect()
            ->route('changelog.index');
    }

    public function delete(DeleteChangelogRequest $request, $id)
    {
        ChangelogChapter::destroy($id);

        return redirect()
            ->route('changelog.index');
    }
}
