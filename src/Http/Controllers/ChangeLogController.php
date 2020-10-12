<?php

namespace webbundels\changelog\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Routing\Controller;
use webbundels\changelog\Models\ChangelogChapter;
use webbundels\changelog\Http\Requests\EditChangelogRequest;
use webbundels\changelog\Http\Requests\ViewChangelogRequest;
use webbundels\changelog\Http\Requests\StoreChangelogRequest;
use webbundels\changelog\Http\Requests\CreateChangelogRequest;
use webbundels\changelog\Http\Requests\DeleteChangelogRequest;
use webbundels\changelog\Http\Requests\UpdateChangelogRequest;

class ChangelogController extends Controller
{
    public function index(ViewChangelogRequest $request)
    {
        $changelogChapters = ChangelogChapter::all();

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
